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
            <form action="{{route('movies.store')}}" method="post"> <!--con el método post ya sabe que el botón está asociado a guardar-->
                @csrf
                <br>
                <br>

                <label for="title">Ingrese el título de la película</label>
                <br>
                
                <input type="text" id="title" name="title" placeholder="Título">
                <br>
                <br>
                
                <label for="age_restriction">Ingrese la restricción de edad</label>
                <br>
                
                <input type="text"  id="age_restriction" name="age_restriction" placeholder="Restricción de edad">
                <br>
                <br>

                <label for="duration_minutes" >Ingrese la duración de la película en minutos</label>
                <br>
                
                <input type="text" id="duration_minutes" name="duration_minutes" placeholder="Duración de la película">
                <br>
                <br>

                <label for="price" >Ingrese el valor de la película</label>
                <br>
                
                <input type="text" id="price" name="price" placeholder="Valor">
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
                <th >Título</th>
                <th >Restricción de edad</th>
                <th >Duración</th>
                <th >Valor</th>
                <th >Acciones</th>
                
              </tr>
            </thead>
            <tbody>
            @foreach ($movies as $movie)
                    <tr>
                        <td>{{ $movie->id }}</td>
                        <td>{{ $movie->title }}</td>
                        <td>{{ $movie->age_restriction }}</td>
                        <td>{{ $movie->duration_minutes }}</td>
                        <td>{{ $movie->price }}</td>
                        <td>
                            <form action="{{ route('movies.destroy', $movie->id) }}" method="post">
                                @csrf <!--Token para evitar un ataque-->
                                @method('DELETE') <!--Para el navegador es petición post, pero para Laravel es delete-->
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                <a class="btn btn-warning" href="{{ route('movies.edit',$movie->id)}}">Editar</a>
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