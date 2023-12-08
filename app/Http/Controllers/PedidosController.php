<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Nomina;
use App\Models\RegistrosNomina;

class PedidosController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    
    public function index()
    {
        
        $solicitudes =  Nomina::all()->toArray();
        $cantidad = 0;
       
        //dd(gettype($solicitudes)); 

        $results = array_map(function($element)
        {
            //dd($element['id']);
            $registros = RegistrosNomina::where('id_nomina','=',$element['id'])->get();
            $total = 0;
            for($i = 0; $i < sizeof($registros); $i++){
                $total += $registros[$i]->total;
            }
    
            $nomina = new \stdClass();
            $nomina -> id = $element['id'];
            $nomina -> fecha = $element['fecha'];
            $nomina -> total = $total;
            return $nomina;
        }, $solicitudes);
       
        
        $solicitudes = $results;
        return view('Pedidos.list', compact('solicitudes','cantidad')); 
    }

    public function create(){
        return view('Pedidos.create');
    }
    public function show($id){
        $nomina = RegistrosNomina::where('id_nomina','=',$id)->get();
  
        return view('Nomina.details', compact('nomina'));
    }
    public function storage(Request $request){ 
        try {
            $dt= Carbon::now()->toDateTimeString();
            $nomina = new Nomina();
            $nomina->fecha= $dt;
            $nomina->save();
            
            $arrayTipo=$request->get('Tipo');
            $arrayMedida=$request->get('Medida');
            $arrayCantidad=$request->get('Cantidad');
            $arrayNota=$request->get('Nota'); 

            for($id = 0; $id < sizeof($arrayTipo); $id++)
            {

                $registros = new RegistrosNomina();
                $registros->name=$arrayTipo[$id];
                $registros->basura=$arrayMedida[$id]; 
                $registros->camiseta=$arrayCantidad[$id];
                $registros->jumbo=$arrayNota[$id]; 

                  
                $registros->save();  
            }
            $mensaje="Correctamente creado";
            return back()->with('mensaje', $mensaje);
            
        } catch (\Exception $e) {
            $mensaje="error al crear solicitud";
            return back()->with('mensaje', $mensaje);
        }
        
        
    }
}
