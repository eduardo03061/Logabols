<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Sales;
use App\Models\RegistrosSales;
use App\Models\CompanyUser;
use App\Models\Inventory;
use App\Models\User;
use Auth;

class SalesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {


        return view('Sales.index');
    }

    public function list()
    {
        $user_id = Auth::user()->id;
        $company = CompanyUser::where('user_id','=',$user_id)->first();

        $sales = Sales::where('company_id','=',$company->id)->get();


        return view('Sales.list', compact('sales'));
    }

    public function create()
    {
        $items = Inventory::all();

        return view('Sales.create', compact('items'));
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
                $user_id = Auth::user()->id;
                $company_id = CompanyUser::where('user_id','=',$user_id)->first();

                $arrayUnidades = $request->get('Unidades');

                $unitsTotal = 0;
                for ($i = 0; $i < sizeof($arrayUnidades); $i++){
                    $unitsTotal += $arrayUnidades[$i];
                }


                $sales = new Sales();
                $sales->payment_method = 'efectivo';
                $sales->quantity = $unitsTotal;
                $sales->user_id = $user_id;
                $sales->company_id = $company_id->id;
                $sales->save();



                dd($request->get('Nombre'));
                $id_item = $request->get('Nombre')[1];
                $arrayNombre = $request->get('Nombre')[0];
                $arrayNBultos = $request->get('NBultos');
                $arrayKG = $request->get('KG');


                for ($id = 0; $id < sizeof($arrayKG); $id++) {
                    dd($id_item[$id]);
                    $item = Inventory::where('id','=',$id_item[$id])->first();

                    $registros = new RegistrosSales();

                    $registros->name = $arrayNombre[$id];
                    $registros->bulks = $arrayNBultos[$id];
                    $registros->kg = $arrayKG[$id];

                    $registros->unidades = $arrayUnidades[$id];
                    $registros->id_sales = $sales->id;
                    $registros->id_item = $id_item[$id];
                    $registros->price = $item->priceSale;
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
