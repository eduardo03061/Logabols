<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Clientes;
use App\Models\RegistrosCuentas;
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

        $user_id = Auth::user()->id;
        $company = CompanyUser::where('user_id', '=', $user_id)->first();

        $clientes = Clientes::where('company_id', '=', $company->id)->orderBy('id', 'DESC')->get();

 
        return view('Clientes.index', compact('clientes'));
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
        return view('Clientes.create');
    }


    public function historial($id)
    {
        $cliente = Clientes::where('id','=',$id)->first();
        $cuentas = RegistrosCuentas::where('id_cliente', '=', $id)->get();

        return view('Sales.print', compact('cliente','cuentas'));
    }

    public function show($id)
    {
        $cliente = Clientes::where('id', '=', $id)->first();

        return view('Clientes.details', compact('cliente'));
    }

    public function storage(Request $request)
    {
        try {
            if ($request->user()) {
                $user_id = Auth::user()->id;
                $company_id = CompanyUser::where('user_id', '=', $user_id)->first();

             
             
                $cliente = new Clientes();
                $cliente->clave = $request->get('clave');;
                $cliente->nombres = $request->get('nombres');
                $cliente->apellidos = $request->get('apellidos');
                $cliente->telefono = $request->get('telefono');
                $cliente->email = $request->get('email');
                $cliente->direccion = $request->get('direccion');
            

                $cliente->company_id = $company_id->id;
                $cliente->save();


               
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
