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
            <form class="navbar-form">
                <div class="input-group no-border">
                    <input type="text" value="" class="form-control" placeholder="Search...">
                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                        <i class="material-icons">search</i>
                        <div class="ripple-container"></div>
                    </button>
                </div>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">person</i>
                        <p class="d-lg-none d-md-block">
                            Cuenta
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
                <a href="{{ route('sales.create') }}" class="btn btn-success float-right">Agregar</a><br><br>
                <div class="card">
                    <div class="card-header card-header-success">
                        <h4 class="card-title ">Ventas</h4>
                        <p class="card-category"> Lista de Ventas</p>
                    </div>
                    @if ( session('message') )
                    <br>
                    <div class="alert alert-warning">{{ session('message') }}</div>
                    <br>
                    @endif
                    <div class="card-body" id="vueSales">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        Num
                                    </th>
                                    <th>
                                        Fecha
                                    </th>
                                    <th>
                                        Cantidad
                                    </th>
                                    @if (Auth::user()->hasAnyRoleWithId([1]))
                                    <th>
                                        Acciones
                                    </th>
                                    @endif
                                </thead>
                                <tbody>
                                    <tr v-for="sale in filteredSales" :key="sale.id">
                                        <td><a :href="`Details/${sale.id}`">@{{ sale.id }}</a></td>
                                        <td>@{{ sale.created_at }}</td>
                                        <td>@{{ sale.quantity }}</td>
                                        @if (Auth::user()->hasAnyRoleWithId([1]))
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
                                                    <form :action="`Cancell/${sale.id}`" method="POST">
                                                        @csrf
                                                        <button class="dropdown-item" type="submit">Cancelar venta</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                        @endif
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
        el: '#vueSales',
        data: {
            sales: @json($sales),
        },
        computed: {
            filteredSales() {
                return this.sales;
            }
        },
        methods: {}
    });
    function reload() {
            window.location.href = "{{ route('sales.list') }}";
    }

    @if(session('message'))
        setInterval('reload()', 2000);
    @endif
</script>
@endpush