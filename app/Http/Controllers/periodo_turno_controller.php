<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\periodo_turno;
use App\periodo_cita;
use App\turno;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;
use Laravel\Illuminate\Cookies\CookieServiceProvider;
use Laravel\Illuminate\Session\Middleware\StartSession;

class periodo_turno_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $p_turnos = periodo_turno::orderBy('id', 'ASC')->paginate(5);

        //Flash::success("Hola");

        return view('pagina.funcionalidad.admin.periodo_turno.periodo')->with('p_turnos', $p_turnos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*$p_turnos = periodo_turno::all()->toArray();
        $p_count = periodo_turno::count();

        $arreglo = Array();
        for ($i=0; $i < $p_count; $i++) { 
            $arreglo[$i] = $p_turnos[$i];
        }*/

        return view('pagina.funcionalidad.admin.periodo_turno.create');
        /*->with('arreglo', $arreglo);*/
        //->with('p_count', $p_count);
        
        /*$periodo_turno = periodo_turno::orderBy('id', 'ASC')
        ->where('ano', '2016')
        ->where('periodo', 'Enero')
        ->get();
        dd($periodo_turno);*/

    }

    public function ajax_periodo()
    {   
        /*$p_turnos = periodo_turno::all()->toArray();
        $p_count = periodo_turno::count();

        $arreglo = Array();
        for ($i=0; $i < $p_count; $i++) { 
            $arreglo[$i] = $p_turnos[$i];
        }*/

        /*return view('pagina.funcionalidad.admin.periodo_turno.create')
        ->with('arreglo', $arreglo);*/
        //->with('p_count', $p_count);
        
        /*$periodo_turno = periodo_turno::orderBy('id', 'ASC')
        ->where('ano', '2016')
        ->where('periodo', 'Enero')
        ->get();*/
        //dd($_GET['ano'] + ' - ' + $$_GET['periodo']);
        return 'Hola';

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $periodo = new periodo_turno($request->all());

        $periodo->save();

        $turnos = new turno();
        $turnos->id_periodo = $periodo->id;
        $turnos->estado = 'No Asignado';

        $turnos->save();

        //$aux_p = $periodo->periodo;
        //$aux_a = $periodo->ano;

        //$aux = periodo_turno::orderBy('id', 'ASC')->where('ano', $aux_a)->where('periodo', $aux_p);
        //$aux = periodo_turno::find($periodo->id);
        //$turnos->
        //

        Flash::success("Se ha Creado El Periodo " . $request->periodo . ' ' . $request->ano);
        return redirect()->route('admin.turnos.index');

        //dd($aux);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $periodo = periodo_turno::find($id);
        //dd($users);   
        return view('pagina.funcionalidad.admin.periodo_turno.edit')->with('periodo', $periodo);
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
        $periodo = periodo_turno::find($id);
        $periodo->ano = $request->ano;
        $periodo->periodo = $request->periodo;

        //dd($periodo);
        $periodo->save();

        Flash::warning("Se ha Editado El Periodo " . $request->periodo . ' ' . $request->ano);
        return redirect()->route('admin.periodo_turno.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $periodo = periodo_turno::find($id);
        $periodo->delete();

        Flash::error("Se ha Eliminado El Periodo " . $periodo->periodo . ' ' . $periodo->ano);
        return redirect()->route('admin.periodo_turno.index');
    }
}
