@extends('layouts.admin')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <a class="navbar-brand" href="">Inventario</a>
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

    <div class="content" id="vueItemsList">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('inventory.export') }}" class="btn btn-success float-left">Exportar a excel</a>
                    <a href="{{ route('inventory.create') }}" class="btn btn-success float-right">Agregar</a>
                    <br><br>
                    <div class="input-group no-border mt-5">
                        <input type="text" id="search" class="form-control search-bar" placeholder="Buscar..."
                               onkeyup="searchFunction()"/>
                        <button type="submit" class="btn btn-white btn-round btn-just-icon">
                            <i class="material-icons">search</i>
                            <div class="ripple-container"></div>
                        </button>
                    </div>
                    <div class="card">
                        <div class="card-header card-header-success">
                            <h4 class="card-title ">Inventario</h4>
                            <p class="card-category">Lista de Articulos</p>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive overflow-x-auto">
                                <table class="table">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Bultos</th>
                                        <th>KG</th>
                                        <th>Tipo</th>
                                        <th>Unidades</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody id="idTR">
                                    <tr v-for="item in filteredItems" :key="item.id">
                                        <td><a :href="`Inventory/Details/${item.id}`">@{{ item.name }}</a></td>
                                        <td class="text-secondary">@{{ item.bulks }}</td>
                                        <td class="text-secondary">@{{ item.kg }}</td>
                                        <td class="text-secondary">@{{ item.type }}</td>
                                        <td class="text-secondary">@{{ item.unidades }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="secondary-btn dropdown-toggle" type="button"
                                                        id="dropdownMenuButton"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    <img src="{{ asset('assets/images/engranaje.svg')}}" alt=""
                                                         width="20px">
                                                </button>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                    <a :href="`Inventory/Edit/${item.id}`" class="dropdown-item">Editar
                                                        Articulo</a>

                                                    <form :action="`Inventory/Delete/${item.id}`" method="POST">
                                                        @csrf
                                                        <button class="dropdown-item" type="submit">Eliminar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
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

@push('scripts')
    <script src="{{ asset('js/vue.js') }}"></script>
    <script>
        new Vue({
            el: '#vueItemsList',
            data: {
                cards: true,
                list: false,
                items: @json($inventory),
                searchQuery: ''
            },
            computed: {
                filteredItems() {
                    console.log('entra')
                    console.log('items', this.items)
                    return this.items.filter(item => {
                        return item.name.toLowerCase().includes(this.searchQuery.toLowerCase());
                    });
                }
            },
            methods: {
                onSelectView(type) {
                    this.cards = type === 'cards';
                    this.list = type !== 'cards';
                }
            }
        });

        function searchFunction() {
            var app = document.getElementById('vueItemsList').__vue__;
            app.searchQuery = document.getElementById('search').value;
        }

        function reload() {
            window.location.href = "{{ route('inventory.list') }}";
        }

        @if(session('mensaje'))
        @if(session('mensaje') == 'Correctamente creado')
        setInterval('reload()', 2000);
        @endif
        @endif

        function openNav(navId) {
            document.getElementById(navId).style.width = "50vh";

            document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
        }

        function closeNav(navId) {
            document.getElementById(navId).style.width = "0";
        }
    </script>
@endpush
