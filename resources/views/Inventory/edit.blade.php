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
            <form action="{{ route('inventory.update', $item->id) }}" method="POST">
                @csrf
                <div class="p-4" style="background:#f5f5f5;  margin-bottom:1em; padding-top:1em; padding-bottom:1em;">
                    <h3>Articulo</h3>
                    @if ( session('mensaje') )
                        @if (session('mensaje')=='Actualizado con éxito')
                            <div class="alert alert-success">{{ session('mensaje') }}</div>
                        @else
                            <div class="alert alert-danger">{{ session('mensaje') }}</div>
                        @endif
                    @endif
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

                                <th scope="col">Precio compra</th>
                                <th scope="col">Precio Venta</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" name="Nombre" id="Nombre"
                                           value="{{$item->name}}" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="NBultos" value="{{$item->bulks}}"
                                           required>
                                </td>
                                <td class="text-secondary">
                                    <input type="number" class="form-control" name="KG" value="{{$item->kg}}"
                                           step="0.01" required>
                                </td>
                                <td class="text-secondary">
                                    <input type="text" class="form-control" name="Tipo" value="{{$item->type}}"
                                           required>
                                </td>
                                <td class="text-secondary">
                                    <input type="number" class="form-control" name="Unidades"
                                           value="{{$item->unidades}}" required>
                                </td>

                                <td class="text-secondary">
                                    <input type="number" class="form-control" name="priceCompra"
                                           value="{{$item->priceCompra}}" step="0.01" required>
                                </td>

                                <td class="text-secondary">
                                    <input type="number" class="form-control" name="priceSale"
                                           value="{{$item->priceSale}}" step="0.01" required>
                                </td>

                            </tr>
                            </tbody>
                        </table>

                        <a href="{{ url()->previous() }}" class="btn btn-success mx-auto">Atras</a>
                        <button type="submit" class="btn btn-primary mx-auto">Actualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/vue.js') }}"></script>
    <script>
        function reload() {
            window.location.href = "{{ route('inventory.list') }}";
        }

        @if(session('mensaje'))
        @if(session('mensaje') == 'Actualizado con éxito')
        setInterval('reload()', 2000);
        @endif

        @endif
    </script>

@endsection
