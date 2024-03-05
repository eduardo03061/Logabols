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

            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">person</i>
                        <p class="d-lg-none d-md-block">
                            Account
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <div class="dropdown-divider"></div>
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
        <div class="p-4" style="background:#f5f5f5;  margin-bottom:1em; padding-top:1em; padding-bottom:1em;">
            <h3>Cliente</h3>
            <div class="row col-12">
                <div class="col-12">
                    <div class="mx-auto">
                        <div class="mb-3">
                            Clave: {{$cliente->clave}}
                        </div>
                        <div class="mb-3">
                            Nombres: {{$cliente->nombres}}
                        </div>
                        <div class="mb-3">
                            Apellidos: {{$cliente->apellidos}}
                        </div>
                        <div class="mb-3">
                            Telefono: {{$cliente->telefono}}
                        </div>
                        <div class="mb-3">
                            Email: {{$cliente->email}}
                        </div>
                        <div class="mb-3">
                            Direccion: {{$cliente->direccion}}
                        </div>
                    </div>
                </div>

                <a href="{{ url()->previous() }}" class="btn btn-success mx-auto">Atras</a>
                <a href="{{ route('clientes.historial') }}" class="btn btn-info mx-auto">Ver detalles</a>

            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/vue.js') }}"></script>

@endsection