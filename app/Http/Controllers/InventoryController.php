<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Inventory;
use App\Models\User;
class InventoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $inventory = Inventory::all()->toArray();
        $cantidad = 0;

        //dd(gettype($solicitudes));

        $results = array_map(function ($element) {
            //dd($element['id']);
            $registros = Inventory::where('id_pedido', '=', $element['id'])->get();
            $total = 0;
            for ($i = 0; $i < sizeof($registros); $i++) {
                $total += $registros[$i]->cantidad;
            }

            $nomina = new \stdClass();
            $nomina->id = $element['id'];
            $nomina->fecha = $element['fecha'];
            $nomina->total = $total;
            return $nomina;
        }, $inventory);


        $solicitudes = $results;
        return view('Inventory.list', compact('solicitudes', 'cantidad'));
    }

    public function create()
    {
        return view('Inventory.create');
    }
    public function show($id)
    {
        $nomina = RegistrosPedidos::where('id_pedido', '=', $id)->get();

        return view('Pedidos.details', compact('nomina'));
    }

    public function storage(Request $request)
    {
        try {
            if ($request->user()) {
                $arrayNombre = $request->get('Nombre');
                $arrayNBultos = $request->get('NBultos');
                $arrayKG = $request->get('KG');
                $arrayTipo = $request->get('Tipo');
                $arrayUnidades = $request->get('Unidades');

                $user = User::findOrFail($request->get('user_id'));
                for ($id = 0; $id < sizeof($arrayTipo); $id++) {

                    $registros = new Inventory();

                    $registros->name = $arrayNombre[$id];
                    $registros->bulks = $arrayNBultos[$id];
                    $registros->kg = $arrayKG[$id];
                    $registros->type = $arrayTipo[$id];
                    $registros->unidades = $arrayUnidades[$id];
                    $registros->id_user = $user->id;

                    $registros->save();
                }
                $mensaje = "Correctamente creado";
                return back()->with('mensaje', $mensaje);
            } else {
                return view('welcome');
            }


        } catch (\Exception $e) {
            dd($e);
            $mensaje = "error al crear solicitud";
            return back()->with('mensaje', $mensaje);
        }
    }
}
