@extends('layouts.print')

@section('content')
    <table>
        <thead>
        <tr>
            <th class="cantidad">CANT</th>
            <th class="producto">PRODUCTO</th>
            <th class="precio">$$</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <td class="cantidad">
                     {{$item->kg}} kg
                </td>
                <td class="producto">
                    {{$item->name}}
                </td>

                <td class="precio">
                    {{$item->price}}
                </td>
            </tr>
        @endforeach
        <tr>
            <td class="cantidad"></td>
            <td class="producto">TOTAL</td>
            <td class="precio">${{$sales->quantity}}</td>
        </tr>

        </tbody>
    </table>

    <script>

        function imprimir(){
            window.print();
        }

        imprimir()
    </script>
@endsection
