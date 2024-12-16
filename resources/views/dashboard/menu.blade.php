<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard ADATI</title>
    <!-- Agrega el CSS de Bootstrap o Tailwind -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/back.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"> <!-- Bootstrap Icons -->
</head>

<body>

@if (session('success'))
    <div class="container mt-3">
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    </div>
@endif

<div class="container text-center py-5">
    <div class="row">
        <div class="col-12 text-start mb-3">
            <a href="{{ route('login') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Regresar al login
            </a>
        </div>
        <div class="col-12">
            <div class="card mx-auto bg-dark text-white" style="max-width: 600px;">
                <div class="card-header bg-success">
                    <h2>¡BIENVENIDO AL SOFTWARE ADATI!</h2>
                    <h5>ADMINISTRADOR DEL ÁREA TI</h5>
                </div><br>
                
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item bg-light">
                            <a href="{{ route('switch.index') }}" class="text-dark text-decoration-none">1. - Gestión de direcciones IP</a> 
                        </li>
                        <br>
                        <li class="list-group-item bg-light">
                            <a href="{{ route('marcas.index') }}" class="text-dark text-decoration-none">2. - Inventario</a> 
                        </li>
                        <br>
                        <li class="list-group-item bg-light">
                            <a href="#" class="text-dark text-decoration-none disabled">3. - Creación de reportes</a> 
                        </li>
                        <br>
                        <li class="list-group-item bg-light">
                            <a href="#" class="text-dark text-decoration-none disabled">4. - Visualización de reportes</a> 
                        </li>
                        <br>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>