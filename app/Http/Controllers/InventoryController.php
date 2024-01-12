<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Inventory;
use App\Models\User;
use Auth;

class InventoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = Auth::user()->id;

        $inventory = Inventory::where('id_user', $user_id)->get();


        return view('Inventory.list', compact('inventory'));
    }

    public function create()
    {
        return view('Inventory.create');
    }

    public function show($id)
    {
        $item = Inventory::where('id', '=', $id)->first();

        return view('Inventory.details', compact('item'));
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
