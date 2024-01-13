@extends('layouts.admin')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <a class="navbar-brand" href="javascript:;">Ventas</a>
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
                        <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
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
            @if ( session('mensaje') )
                @if (session('mensaje')=='Correctamente creado')
                    <div class="alert alert-success">{{ session('mensaje') }}</div>
                @else
                    <div class="alert alert-danger">{{ session('mensaje') }}</div>
                @endif
            @endif
            <form action="{{ route('sales.storage') }}" method="POST">
                @csrf
                <div class="p-4" style="background:#f5f5f5;  margin-bottom:1em; padding-top:1em; padding-bottom:1em;"
                     id="vuecronicos">
                    <div style="float:right;">
                        <button type="button" class="btn btn-success" style="margin-left:10px; margin-right:10px;"
                                v-on:click="cronicos += 1">+
                        </button>
                        <button type="button" class="btn btn-danger" v-on:click="if (cronicos != 0)cronicos -= 1">-
                        </button>
                    </div>
                    <h3>Registrar Venta</h3>
                    <div class="row col-12">
                        <div v-if="cronicos == 0" class="col-md-12">
                            <h3><small>Agrega un registro</small></h3>
                        </div>
                        <table v-if="cronicos > 0" class="table mx-auto">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">N-Bultos</th>
                                <th>KG</th>
                                <th scope="col">Unidades</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="cronico in cronicos">
                                <td><input class="form-control" name="Nombre[]" id="nombresInput"
                                           list="nombres" required></td>
                                <td><input type="text" class="form-control" name="NBultos[]" id="NBultos"
                                           placeholder="" required></td>
                                <td><input type="number" class="form-control" name="KG[]" id="KG"
                                           placeholder="" step="0.01" required></td>
                                <td><input type="text" class="form-control" name="Unidades[]" id="unidades"
                                           placeholder="" required></td>

                            </tr>
                            </tbody>
                        </table>


                        <datalist id="nombres">
                            @foreach($items as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </datalist>
                        <button type="submit" v-if="cronicos > 0" class="btn btn-success mx-auto">Guardar</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <script src="{{ asset('js/vue.js') }}"></script>
    <script>
        var app = new Vue({
            el: '#vuecronicos',
            data: {
                cronicos: 1
            }
        })

        function reload() {
            window.location.href = "{{ route('pedidos.list') }}";
        }

        @if(session('mensaje'))
        @if(session('mensaje') == 'Correctamente creado')
        setInterval('reload()', 2000);
        @endif

        @endif

    </script>
@endsection
