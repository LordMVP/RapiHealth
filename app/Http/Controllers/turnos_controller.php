<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\turno;
use App\periodo_turno;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;

class turnos_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $turnos = turno::orderBy('id', 'ASC')->paginate(5);

        foreach ($turnos as $turno) {
            $periodoo = periodo_turno::find($turno->id_periodo);
            $turno->id_aux = $periodoo->id;
            $turno->periodo = $periodoo->periodo;
            $turno->ano = $periodoo->ano;
        }
        //$periodo = periodo_turno::find($id);

        //dd($turnos);    
        return view('pagina.funcionalidad.admin.turnos.turnos')->with('turnos', $turnos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $periodo_turno = periodo_turno::orderBy('id', 'ASC')->get()->toArray();

        return view('pagina.funcionalidad.admin.turnos.create')->with('periodos', $periodo_turno);;
    }

    public function asignar($id)
    {   
        $periodo_turno = periodo_turno::find($id)->toArray();

        //dd($periodo_turno['id']);
        return view('pagina.funcionalidad.admin.turnos.asignar')->with('periodos', $periodo_turno);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $periodo = periodo_turno::find($request->id);
        $turnos = turno::find($request->id);
        
        //dd($turnos->ano);
        if($request->file('archivo'))
        {
            //Inicio Imagen
            $file = $request->file('archivo');
            $name = $periodo->id . '_' . $periodo->periodo . '_' . $periodo->ano . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '\plugin\turnos';
            $file->move($path, $name);
            //Fin Imagen 
            $turnos->ruta = '/plugin/turnos/' . $name; 
            $turnos->estado = 'Asignado';
        }else{
            $turnos->ruta = ""; 
            $turnos->estado = 'No Asignado';
        }

        //dd($turnos);
        $turnos->save();
        Flash::success("Se ha Asignado El Turno " . $periodo->periodo . ' - ' . $periodo->ano);
        return redirect()->route('admin.turnos.index');
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
        $periodo = periodo_turno::find($id);
        //dd($users);   
        return view('pagina.funcionalidad.admin.turnos.edit')->with('periodo', $periodo);
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
        return redirect()->route('admin.turnos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $turno = turno::find($id);
        $turno->delete();

        $periodo = periodo_turno::find($id);
        $periodo->delete();

        Flash::error("Se ha Eliminado El Turno " . $periodo->periodo . ' ' . $periodo->ano);
        return redirect()->route('admin.turnos.index');
    }
}
