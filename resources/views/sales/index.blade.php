<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SALES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> <!-- PARA QUE FUNCIONE BOOTSTRAP-->
</head>
<body>
    <!-- BARRA DE NAVEGACIÓN -->
    <nav class="navbar navbar-expand-lg" style="background-color:rgb(114, 120, 124);">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('welcome') }}" style="color: white;">INICIO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" style="color: white;" href="{{ route('movies.index') }}">Películas</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" style="color: white;" href="{{ route('rooms.index') }}">Salas</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" style="color: white;" href="{{ route('sales.index') }}">Ventas</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" style="color: white;" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                
            </ul>
            </div>
        </div>
    </nav>
    <div class="container text-center">
        <form action="{{route('sales.store')}}" method="post"> <!--con el método post ya sabe que el botón está asociado a guardar-->
            @csrf
            <br>
            <br>

            <label for="movie_id">Seleccione la película</label>
            <br>
            <select id="movie_id" name="movie_id" class="form-select" style="width: auto; display: inline-block;">
                @foreach($movies as $movie)
                    <option value="{{ $movie->id }}">{{ $movie->title }}</option>
                @endforeach
            </select>
            <br>
            <br>
            
            <label for="room_id">Seleccione la sala</label>
            <br>
            <select id="room_id" name="room_id" class="form-select" style="width: auto; display: inline-block;">
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}">{{ $room->room_name }}</option>
                @endforeach
            </select>
            <br>
            <br>

            <label for="number_of_tickets">Ingrese cuántas boletas desea comprar</label>
            <br>
            <input type="number" id="number_of_tickets" name="number_of_tickets" placeholder="Número de boletas" class="form-control" style="width: auto; display: inline-block;">
            <br>
            <br>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>    

        <br>
        <br>
        <br>

        <!-- TABLA -->
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Valor</th>
                    <th>Fecha</th>
                    <th>Película</th>
                    <th>Sala</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sale)
                    <tr>
                        <td>{{ $sale->id }}</td>
                        <td>{{ $sale->movie->price }}</td>
                        <td>{{ $sale->created_at }}</td>  <!--MUESTRA LA FECHA Y HORA EXACTA DEL REGISTRO-->
                        <td>{{ $sale->movie->title }}, {{ $sale->movie->age_restriction }}, {{ $sale->movie->duration_minutes }} mins, ${{ $sale->movie->price }}</td> <!-- MUESTRA LOS ATRIBUTOS CONCATENADOS DE LA PELÍCULA -->
                        <td>{{ $sale->room->room_name }}</td>
                        <td>
                            <form action="{{ route('sales.destroy', $sale->id) }}" method="post">
                                @csrf <!--Token para evitar un ataque-->
                                @method('DELETE') <!--Para el navegador es petición post, pero para Laravel es delete-->
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                <a class="btn btn-warning" href="{{ route('sales.edit',$sale->id)}}">Editar</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>  <!-- PARA QUE FUNCIONE BOOTSTRAP-->
</body>
<footer>
    <p>Angélica Ramírez Murillo, 1054398460</p>
</footer>
</html>