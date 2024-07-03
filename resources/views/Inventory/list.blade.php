@extends('layouts.admin')

@section('content')
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Inventario</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
                <div class="input-group no-border">
                    <input type="text" class="form-control" id="search" onkeyup="searchFunction()">
                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                        <i class="material-icons">search</i>
                        <div class="ripple-container"></div>
                    </button>
                </div>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="javascript:;">
                        <i class="material-icons">dashboard</i>
                        <p class="d-lg-none d-md-block">
                            Stats
                        </p>
                    </a>
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
                <a href="{{ route('inventory.create') }}" class="btn btn-success float-right">Agregar</a><br><br>
                <div class="card">
                    <div class="card-header card-header-success">
                        <h4 class="card-title ">Inventario</h4>
                        <p class="card-category">Lista de Articulos</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-secondary">
                                    <th>
                                        Nombre
                                    </th>
                                    <th>
                                        Unidades
                                    </th>
                                    <th>
                                        Precio
                                    </th>
                                    <th>
                                        Acciones
                                    </th>
                                </thead>
                                <tbody id="idTR">
                                    @foreach($inventory as $item)
                                    <tr>
                                        <td>
                                            <a href="{{ route('inventory.showdetails', $item->id)  }}">{{$item->name}}</a>
                                        </td>
                                        <td class="text-secondary">
                                            {{$item->stocks}}
                                        </td>
                                        <td class="text-secondary">
                                            ${{$item->sellingPrice}}
                                        </td>
                                        <td>
                                            <button id="btnGroupDrop1" type="button" class="btn btn-success" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="{{ asset('assets/images/engranaje.svg')}}" alt="" width="20px">
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                <a class="dropdown-item" href="{{route('inventory.edit',$item->id)}}">Editar Articulo</a>
                                                <form action="{{route('inventory.delete',$item->id)}}" method="POST">
                                                    @csrf
                                                    <input class="dropdown-item" type="submit" value="Eliminar">
                                                </form>
                                            </div>
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

<script>
    let items = @json($inventory);


    function searhItem(pattern) {
        // Filtrar el array de alumnos usando una expresión regular en el nombre
        let resultados = items.filter(item => {
            // Crear una expresión regular con el patrón proporcionado
            let regex = new RegExp(pattern, 'i'); // 'i' para hacer la búsqueda case insensitive
            return regex.test(item.name);
        });

        return resultados; // Devuelve un array de alumnos que coinciden con el patrón
    }

    function searchFunction() {
        let item = items[0];

        let articuloEncontrado = searhItem(document.getElementById('search').value)

        let itemElements = ''

        articuloEncontrado.forEach(itemFind => {
            let newtr = `<tr>
                        <td>
                            <a href="Inventory/Details/${itemFind.id}">${itemFind.name}</a>
                        </td>
                        <td class="text-secondary">
                            ${itemFind.stocks}
                        </td>
                        <td class="text-secondary">
                            ${itemFind.sellingPrice}
                        </td>
                        <td>
                            
                        </td>
                    </tr>`;
            itemElements += newtr;
        })

        $("tbody#idTR").replaceWith(`<tbody id='idTR'>${itemElements}</tbody>`);
    }
</script>

@endsection