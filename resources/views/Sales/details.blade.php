@extends('layouts.admin')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <a class="navbar-brand" href="javascript:;">Pedidos</a>
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
                        <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">notifications</i>
                            <span class="notification">1</span>
                            <p class="d-lg-none d-md-block">
                                Some Actions
                            </p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">*</a>
                        </div>
                    </li>
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
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Cerrar Sesión</a>
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
            <form action="{{ route('sales.storage') }}" method="POST">
                @csrf
                <div class="p-4" style="background:#f5f5f5;  margin-bottom:1em; padding-top:1em; padding-bottom:1em;">
                    <h3>Pedido de:</h3>
                    <div class="row col-12">
                        <table class="table mx-auto">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">N-Bultos</th>
                                <th>KG</th>
                                <th scope="col">Unidades</th>
                                <th scope="col">Precio</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($sales as $item)
                                <tr v-for="cronico in cronicos">
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->bulks}}</td>
                                    <td>{{$item->kg}}</td>
                                    <td>{{$item->unidades}}</td>
                                    <td>${{$item->price}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <a href="{{ url()->previous() }}" class="btn btn-success mx-auto">Atras</a>
                        <a href="{{ route('sales.print', $id)  }}" class="btn btn-primary mx-auto">Imprimir</a>

                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/vue.js') }}"></script>

@endsection
