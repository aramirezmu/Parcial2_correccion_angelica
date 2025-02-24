<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Página principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
    <br>
    <br>

    <div class="container text-center">
    <h1>Aplicativo web para gestión de salas de cine</h1>
    <br>
    
    </div>
    <div class="container text-center">
    <a class="btn btn-warning" href="{{ route('movies.index') }}" role="button">Gestionar películas</a> 
    <a class="btn btn-warning" href="{{ route('rooms.index') }}"  role="button">Gestionar salas</a>
    <a class="btn btn-warning" href="{{ route('sales.index') }}"  role="button">Gestionar ventas</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
  <footer>
    <p>Angélica Ramírez Murillo, 1054398460</p>
</footer>
</html>