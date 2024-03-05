@extends('layouts.admin')

@section('content')
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Clientes</a>
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
                            Cuenta
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Cerrar Sesión
                        </a>
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
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('clientes.create') }}" class="btn btn-success float-right">Agregar</a><br><br>
                <div class="card">
                    <div class="card-header card-header-success">
                        <h4 class="card-title ">Clientes</h4>
                        <p class="card-category"> Lista de Clientes</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        Clave
                                    </th>
                                    <th>
                                        Nombres
                                    </th>
                                    <th>
                                        Telefono
                                    </th>
                                    <th>
                                        Deuda
                                    </th>
                                </thead>
                                <tbody>

                                    @foreach($clientes as $cliente)
                                    <tr>
                                        <td>
                                            <a href="{{ route('clientes.showdetails', $cliente->id)  }}">{{$cliente->clave}}</a>
                                        </td>

                                        <td class="text-primary">
                                            {{$cliente->nombres}}
                                        </td>
                                        <td class="text-primary">
                                            {{$cliente->telefono}}
                                        </td>
                                        <td class="text-primary">
                                            $0
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection