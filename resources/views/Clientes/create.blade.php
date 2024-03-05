@extends('layouts.admin')

@section('content')
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Cliente</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">

            <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">person</i>
                    <p class="d-lg-none d-md-block">
                        Account
                    </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">          
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Cerrar
                        Sesión</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            </ul>
        </div>
    </div>
</nav>
<div class="content">
    <div class="container-fluid">
        @if ( session('mensaje') )
        @if (session('mensaje')=='Correctamente creado')
        <div class="alert alert-success">{{ session('mensaje') }}</div>
        @else
        <div class="alert alert-danger">{{ session('mensaje') }}</div>
        @endif
        @endif
        <form action="{{ route('clientes.storage') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="clave" class="form-label">Clave</label>
                <input type="text" class="form-control" name="clave" id="clave" required>
            </div>
            <div class="mb-3">
                <label for="nombres" class="form-label">Nombres</label>
                <input type="text" class="form-control" name="nombres" id="nombres" required>               
            </div>
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" id="apellidos" required>               
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Telefono</label>
                <input type="text" class="form-control" name="telefono" id="telefono" required>               
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email">               
            </div>
            <div class="mb-3">
                <label for="direccion" class="form-label">Direccion</label>
                <input type="text" class="form-control" name="direccion" id="direccion">               
            </div>          
            <button type="submit" class="btn btn-success">Crear</button>
        </form>

    </div>
</div>
<script src="{{ asset('js/vue.js') }}"></script>
<script>
    function reload() {
        window.location.href = "{{ route('clientes.list') }}";
    }

    @if(session('mensaje'))
    @if(session('mensaje') == 'Correctamente creado')
    setInterval('reload()', 2000);
    @endif

    @endif
</script>
@endsection