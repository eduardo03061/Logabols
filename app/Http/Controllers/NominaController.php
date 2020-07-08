<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nomina;
use App\RegistrosNomina;
use Carbon\Carbon;
class NominaController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $solicitudes =  Nomina::all();
        $cantidad = 0;
        return view('Nomina.list', compact('solicitudes','cantidad')); 
    }
    public function create(){
        return view('Nomina.create');
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
            
            $arrayNombres=$request->get('Nombre');
            $arrayBasura=$request->get('Basura');
            $arrayCamiseta=$request->get('Camiseta');
            $arrayJumbo=$request->get('Jumbo');
            $arrayReempacado=$request->get('Reempacado');
            $arrayEmpacado=$request->get('Empacado');

            for($id = 0; $id < sizeof($arrayNombres); $id++)
            {

                $registros = new RegistrosNomina();
                $registros->name=$arrayNombres[$id];
                $registros->basura=$arrayBasura[$id]; 
                $registros->camiseta=$arrayCamiseta[$id];
                $registros->jumbo=$arrayJumbo[$id];
                $registros->empacado=$arrayEmpacado[$id];
                $registros->reempacado=$arrayReempacado[$id];
                $registros->id_nomina= $nomina->id;
                //Calcular totales
                $totalB=$arrayBasura[$id]*25*0.5;
                $totalC=$arrayCamiseta[$id]*25*0.3;
                $totalJumbo=$arrayJumbo[$id]*25*0.3;
                $totalEmpacado=$arrayEmpacado[$id];
                $totalRempacado=$arrayReempacado[$id]*25*0.15;

                $TotalN=$totalB+$totalC+$totalJumbo+$totalEmpacado+$totalRempacado;

                $registros->total= $TotalN;
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
