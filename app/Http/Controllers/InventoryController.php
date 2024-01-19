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
                $arrayPriceCompra = $request->get('priceCompra');
                $arrayPriceSale = $request->get('priceSale');
                $user = User::findOrFail($request->get('user_id'));
                for ($id = 0; $id < sizeof($arrayTipo); $id++) {

                    $registros = new Inventory();

                    $registros->name = $arrayNombre[$id];
                    $registros->bulks = $arrayNBultos[$id];
                    $registros->kg = $arrayKG[$id];
                    $registros->type = $arrayTipo[$id];
                    $registros->unidades = $arrayUnidades[$id];
                    $registros->id_user = $user->id;
                    $registros->priceCompra = $arrayPriceCompra[$id];
                    $registros->priceSale = $arrayPriceSale[$id];

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


    public function edit(Request $request, $id)
    {
        $item = Inventory::where('id', $id)->first();

        return view('Inventory.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $item = Inventory::findOrFail($id);
            $item->name = $request->get('Nombre');;
            $item->bulks = $request->get('NBultos');
            $item->kg = $request->get('KG');
            $item->type = $request->get('Tipo');
            $item->unidades = $request->get('Unidades');

            $item->priceCompra = $request->get('priceCompra');
            $item->priceSale = $request->get('priceSale');

            $item->update();
            $mensaje = "Actualizado con éxito";
            return back()->with('mensaje', $mensaje);

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput();
        }
    }
}
