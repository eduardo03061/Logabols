@extends('layouts.admin')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <a class="navbar-brand" href="javascript:;">Articulo</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end">

                <ul class="navbar-nav">                   
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">person</i>
                            <p class="d-lg-none d-md-block">
                                Account
                            </p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                            <a class="dropdown-item" href="#">Profile</a>
                            <a class="dropdown-item" href="#">Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">Cerrar
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
            <form action="{{ route('inventory.storage') }}" method="POST">
                @csrf
                <div class="p-4" style="background:#f5f5f5;  margin-bottom:1em; padding-top:1em; padding-bottom:1em;">
                    <h3>Articulo</h3>
                    <div class="row col-12">
                        <table class="table mx-auto">
                            <thead class="thead-dark">
                            <tr>
                                <th>
                                    Nombre
                                </th>
                                <th>
                                    N-Bultos
                                </th>
                                <th>
                                    KG
                                </th>
                                <th>
                                    Tipo
                                </th>
                                <th>
                                    Unidades
                                </th>
                                <th>
                                    Acciones
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <a href="{{ route('inventory.showdetails', $item->id)  }}">{{$item->name}}</a>
                                </td>
                                <td>
                                    {{$item->bulks}}
                                </td>
                                <td class="text-secondary">
                                    {{$item->kg}}
                                </td>
                                <td class="text-secondary">
                                    {{$item->type}}
                                </td>
                                <td class="text-secondary">
                                    {{$item->unidades}}
                                </td>
                                <td>
                                    <button id="btnGroupDrop1" type="button" class="btn btn-success"
                                            data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        <img src="{{ asset('assets/images/engranaje.svg')}}" alt=""
                                             width="20px">
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item"
                                           href="{{route('inventory.edit',$item->id)}}">Editar Articulo</a>
                                        <form action="{{route('inventory.delete',$item)}}" method="POST">
                                            @csrf
                                            <input class="dropdown-item" type="submit" value="Eliminar">
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <a href="{{ url()->previous() }}" class="btn btn-success mx-auto">Atras</a>
                        <input type="button" onclick="window.print();" class="btn btn-primary mx-auto" value="Imprimir">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/vue.js') }}"></script>

@endsection
