<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>
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
            <form action="{{route('rooms.store')}}" method="post"> <!--con el método post ya sabe que el botón está asociado a guardar-->
                @csrf
                <br>
                <br>

                <label for="room_name">Ingrese el nombre de la sala</label>
                <br>
                <input type="string" id="room_name" name="room_name" placeholder="Sala 1">
                <br>
                <br>
                
                <label for="capacity">Ingrese la capacidad de la sala</label>
                <br>
                
                <input type="integer"  id="capacity" name="capacity" placeholder="Capacidad">
                <br>
                <br>

                

                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>    

        <br>

            <!-- TABLA -->
        <table class="table">
            <thead>
              <tr>
                <th >Id</th>
                <th >Nombre</th>
                <th >Capacidad </th>
                <th >Acciones</th>

                
              </tr>
            </thead>
            <tbody>
            @foreach ($rooms as $room)
                    <tr>
                        <td>{{ $room->id }}</td>
                        <td>{{ $room->room_name }}</td>
                        <td>{{ $room->capacity }}</td>
                     
                        <td>
                            <form action="{{ route('rooms.destroy', $room->id) }}" method="post"> <!---->
                                @csrf <!--Token para evitar un ataque-->
                                @method('DELETE') <!--Para el navegador es petición post, pero para Laravel es delete-->
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                <a class="btn btn-warning" href="{{ route('rooms.edit',$room->id)}}">Editar</a>
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