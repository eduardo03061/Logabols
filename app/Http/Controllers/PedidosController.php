<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Pedidos;
use App\Models\RegistrosPedidos;

class PedidosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $solicitudes =  Pedidos::all()->toArray();
        $cantidad = 0;

        //dd(gettype($solicitudes)); 

        $results = array_map(function ($element) {
            //dd($element['id']);
            $registros = RegistrosPedidos::where('id_pedido', '=', $element['id'])->get();
            $total = 0;
            for ($i = 0; $i < sizeof($registros); $i++) {
                $total += $registros[$i]->cantidad;
            }

            $nomina = new \stdClass();
            $nomina->id = $element['id'];
            $nomina->fecha = $element['fecha'];
            $nomina->total = $total;
            return $nomina;
        }, $solicitudes);


        $solicitudes = $results;
        return view('Pedidos.list', compact('solicitudes', 'cantidad'));
    }

    public function create()
    {
        return view('Pedidos.create');
    }

    public function show($id)
    {
        $nomina = RegistrosPedidos::where('id_pedido', '=', $id)->get();

        return view('Pedidos.details', compact('nomina'));
    }

    public function storage(Request $request)
    {
        try {
            $dt = Carbon::now()->toDateTimeString();
            $pedido = new Pedidos();
            $pedido->fecha = $dt;
            $pedido->save();

            $arrayTipo = $request->get('Tipo');
            $arrayMedida = $request->get('Medida');
            $arrayCantidad = $request->get('Cantidad');
            $arrayNota = $request->get('Nota');

            for ($id = 0; $id < sizeof($arrayTipo); $id++) {

                $registros = new RegistrosPedidos();
                $registros->tipo = $arrayTipo[$id];
                $registros->medida = $arrayMedida[$id];
                $registros->cantidad = $arrayCantidad[$id];
                $registros->nota = $arrayNota[$id];

                $registros->id_pedido = $pedido->id;


                $registros->save();
            }
            $mensaje = "Correctamente creado";
            return back()->with('mensaje', $mensaje);
        } catch (\Exception $e) {
            $mensaje = "error al crear solicitud";
            return back()->with('mensaje', $mensaje);
        }
    }
}
