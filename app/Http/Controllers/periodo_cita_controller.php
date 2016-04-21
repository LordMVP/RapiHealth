<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\cita;
use App\periodo_cita;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;

class periodo_cita_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $p_citas = periodo_cita::orderBy('id', 'ASC')->paginate(5);

        //Flash::success("Hola");

        return view('pagina.funcionalidad.admin.periodo_cita.periodo')->with('p_citas', $p_citas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        $periodo_cita = periodo_cita::orderBy('id', 'ASC')->get()->toArray();

        return view('pagina.funcionalidad.admin.periodo_cita.create')->with('periodos', $periodo_cita);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $meses = Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $aux_mes = 0;
        
        $periodo_citas = new periodo_cita();
        $periodo_citas->periodo = $request->periodo;
        $periodo_citas->ano = $request->ano;

        if ($request->extra == "Si")
        {
            $periodo_citas->fechas = $request->fecha1 . '*' . $request->fecha2 . '*' . $request->fecha3 . '*' . $request->fecha4 . '*' . $request->fecha5;
        }else{
            $periodo_citas->fechas = "";
        }

        foreach ($meses as $key => $value) {

            if ($value == $periodo_citas->periodo) {
                $aux_mes = $key;
            }
        }

        $aux_mes = $aux_mes + 1;
        $countdias = date("d",mktime(0,0,0,($aux_mes)+1,0,($periodo_citas->ano)));
        $periodo_citas->dias = $countdias;

        //dd($countdias);
        $periodo_citas->save();
        Flash::success("Se ha Creado El Periodo Para Citas " . $periodo_citas->periodo . ' - ' . $periodo_citas->ano);
        return redirect()->route('admin.periodo_cita.index');
    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $periodo = periodo_cita::find($id)->toArray();
        $periodo_aux = periodo_cita::find($id);

        $fechas = explode("*", $periodo['fechas']);
        $periodo_aux->est_fecha = 'No';

        if ($periodo['fechas'] != null) {
            $periodo['fechas'] = $fechas;
            $periodo_aux->est_fecha = 'Si';
        }else{
            for ($i=0; $i < 5; $i++) { 
                $fechas[$i] = "";
            }
            $periodo['fechas'] = $fechas;
            $periodo_aux->est_fecha = 'No';
        }
        //dd($periodo);
        //dd($periodo);
        return view('pagina.funcionalidad.admin.periodo_cita.edit')->with('periodo', $periodo)->with('periodo_aux', $periodo_aux);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $periodo_citas = periodo_cita::find($id);
        $periodo_citas->periodo = $request->periodo;
        $periodo_citas->ano = $request->ano;

        if ($request->extra == "Si")
        {
            $periodo_citas->fechas = $request->fecha1 . '*' . $request->fecha2 . '*' . $request->fecha3 . '*' . $request->fecha4 . '*' . $request->fecha5;
        }else{
            $periodo_citas->fechas = "";
        }
        //dd($periodo_citas);
        $periodo_citas->save();
        Flash::warning("Se ha Modificado El Periodo Para Citas " . $periodo_citas->periodo . ' - ' . $periodo_citas->ano);
        return redirect()->route('admin.periodo_cita.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $periodo_citas = periodo_cita::find($id);
        $periodo_citas->delete();

        Flash::error("Se ha Eliminado El Periodo De Cita " . $periodo_citas->periodo . ' ' . $periodo_citas->ano);
        return redirect()->route('admin.periodo_cita.index');
    }
}
