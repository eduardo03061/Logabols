<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Sales;
use App\Models\RegistrosSales;
use App\Models\CompanyUser;
use App\Models\Inventory;
use App\Models\User;
use Auth;

class ClientesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {


        return view('Clientes.index');
    }

    public function list()
    {
        $user_id = Auth::user()->id;
        $company = CompanyUser::where('user_id', '=', $user_id)->first();

        $sales = Sales::where('company_id', '=', $company->id)->orderBy('id', 'DESC')->get();


        return view('Sales.list', compact('sales'));
    }

    public function create()
    {
        $items = Inventory::all();

        return view('Sales.create', compact('items'));
    }


    public function print($id)
    {
        $sales = Sales::where('id','=',$id)->first();
        $items = RegistrosSales::where('id_sales', '=', $id)->get();

        return view('Sales.print', compact('items','sales'));
    }

    public function show($id)
    {
        $sales = RegistrosSales::where('id_sales', '=', $id)->get();

        return view('Sales.details', compact('sales','id'));
    }

    public function storage(Request $request)
    {
        try {
            if ($request->user()) {
                $user_id = Auth::user()->id;
                $company_id = CompanyUser::where('user_id', '=', $user_id)->first();

                $arrayUnidades = $request->get('Unidades');


                $sales = new Sales();
                $sales->payment_method = 'efectivo';
                $sales->quantity = 0.0;
                $sales->user_id = $user_id;
                $sales->company_id = $company_id->id;
                $sales->save();


                $id_item = $request->get('Nombre');

                $arrayNBultos = $request->get('NBultos');
                $arrayKG = $request->get('KG');

                $totalSales = 0;
                for ($id = 0; $id < sizeof($arrayKG); $id++) {

                    $item = Inventory::where('id', '=', $id_item[$id])->first();

                    $registros = new RegistrosSales();

                    $registros->name = $item->name;
                    $registros->bulks = $arrayNBultos[$id];
                    $registros->kg = $arrayKG[$id];

                    $registros->unidades = $arrayUnidades[$id];
                    $registros->id_sales = $sales->id;
                    $registros->id_item = $id_item[$id];
                    $registros->price = $item->priceSale;
                    $totalSales += $item->priceSale * $arrayKG[$id];
                    $registros->save();

                    //Restar el inventario de la venta
                    $updateInventory = Inventory::findOrFail($id_item[$id]);
                    $newBulks = $item->bulks - $arrayNBultos[$id];
                    $updateInventory->bulks = $newBulks;

                    $newKG = $item->kg - $arrayKG[$id];
                    $updateInventory->kg = $newKG;

                    $newUnidades = $item->unidades - $arrayUnidades[$id];
                    $updateInventory->unidades = $newUnidades;


                    $updateInventory->update();
                }

                $updateSales = Sales::findOrFail($sales->id);
                $updateSales->quantity = $totalSales;
                $updateSales->update();


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
