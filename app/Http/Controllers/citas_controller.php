<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\cita;
use App\periodo_cita;
use App\User;
use App\especialidad;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;

class citas_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citas = cita::orderBy('fecha', 'ASC')->paginate(5);

        foreach ($citas as $cita) {
            // Periodo
            $periodoo = periodo_cita::find($cita->id_periodo);
            $cita->id_aux = $periodoo->id;
            $cita->periodo = $periodoo->periodo;
            $cita->ano = $periodoo->ano;

            $especialidad = especialidad::find($cita->id_especialidad);
            $cita->especialidad = $especialidad->nombre;

            // Medico
            $medico = User::find($cita->cedula_medico);
            $cita->cedula_m = $medico->id;
            $cita->nombre_m = $medico->nombre;
            $cita->apellido_m = $medico->apellido;
            $cita->imagen_m = $medico->imagen;
            $cita->email_m = $medico->email;
            $cita->telefono_m = $medico->telefono;

            // Paciente
            $paciente = User::find($cita->cedula_paciente);
            $cita->cedula_p = $paciente->id;
            $cita->nombre_p = $paciente->nombre;
            $cita->apellido_p = $paciente->apellido;
            $cita->imagen_p = $paciente->imagen;
            $cita->email_p = $paciente->email;
            $cita->telefono_p = $paciente->telefono;
        }
        //$periodo = periodo_turno::find($id);

        //dd($citas);    
        return view('pagina.funcionalidad.admin.citas.citas')->with('citas', $citas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $medicos = User::where('tipo', '=', 'medico')->orderBy('id', 'ASC')->get();

        $medicos->each(function($medicos){
            $medicos->especialidad;
        });

        $pacientes = User::where('tipo', '!=', 'medico')->orderBy('id', 'ASC')->get();
        //$pacientes = User::where('tipo', '!=', 'medico')->orderBy('id', 'ASC')->lists('nombre', 'id');

        $array_pacientes = array();

        foreach ($pacientes as $paciente) {
            $array_pacientes[$paciente->id] = $paciente->nombre . ' ' .  $paciente->apellido;
        }

        $especialidades = especialidad::orderBy('id', 'ASC')->lists('nombre', 'id');

        $array_especialidad = array();

        foreach ($medicos as $medico){
            foreach ($medico->especialidad as $especialidad){
                $array_especialidad[$especialidad->id] = $especialidad->nombre;
            }
        }

        $periodo_cita = periodo_cita::orderBy('periodo', 'ASC')->get();
        $array_periodo_cita = array();

        foreach ($periodo_cita as $periodo) {
            $array_periodo_cita[$periodo->id] = $periodo->periodo . ' - ' .  $periodo->ano;
        }

        //sort($array_periodo_cita, 0);
        asort($array_especialidad);
        //asort($array_periodo_cita);
        //var_export($array_especialidad);
        //$array = array_unique($array);
        //dd($array_periodo_cita);
        return view('pagina.funcionalidad.admin.citas.create')->with('medicos', $medicos)
        /**/                                                  ->with('especialidades', $array_especialidad)
        /**/                                                  ->with('aux_pacientes', $array_pacientes)
        /**/                                                  ->with('aux_periodo', $array_periodo_cita);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $paciente = User::find($request->cedula);

        $cita = new cita();
        
        $cita->id_periodo = $request->periodo;
        $cita->cedula_paciente = $request->cedula;
        $cita->cedula_medico = $request->medico;
        $cita->fecha = $request->fecha;
        $cita->hora = $request->hora;
        $cita->estado = 'Asignada';
        $cita->id_especialidad = $request->especialidad;

        $cita->save();
        //dd($cita);

        Flash::success("Se ha Asignado Cita Al El Paciente  " . $paciente->nombre . ' ' . $paciente->apellido);
        return redirect()->route('admin.citas.index');
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

    public function atender($id)
    {
        $cita = cita::find($id);

        $especialidad = especialidad::find($cita->id_especialidad);
        $cita->especialidad = $especialidad->nombre;
        
        // Medico
        $medico = User::find($cita->cedula_medico);
        $cita->cedula_m = $medico->id;
        $cita->nombre_m = $medico->nombre;
        $cita->apellido_m = $medico->apellido;
        $cita->direccion_m = $medico->direccion;
        $cita->imagen_m = $medico->imagen;
        $cita->email_m = $medico->email;
        $cita->telefono_m = $medico->telefono;

        // Paciente
        $paciente = User::find($cita->cedula_paciente);
        $cita->cedula_p = $paciente->id;
        $cita->nombre_p = $paciente->nombre;
        $cita->apellido_p = $paciente->apellido;
        $cita->direccion_p = $paciente->direccion;
        $cita->imagen_p = $paciente->imagen;
        $cita->email_p = $paciente->email;
        $cita->telefono_p = $paciente->telefono;

        //dd($cita);
        return view('pagina.funcionalidad.admin.citas.atender')->with('cita', $cita);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cita = cita::find($id);

        $especialidad = especialidad::find($cita->id_especialidad);
        $cita->especialidad = $especialidad->nombre;
        
        // Medico
        $medico = User::find($cita->cedula_medico);
        $cita->cedula_m = $medico->id;
        $cita->nombre_m = $medico->nombre;
        $cita->apellido_m = $medico->apellido;
        $cita->imagen_m = $medico->imagen;
        $cita->email_m = $medico->email;
        $cita->telefono_m = $medico->telefono;

        // Paciente
        $paciente = User::find($cita->cedula_paciente);
        $cita->cedula_p = $paciente->id;
        $cita->nombre_p = $paciente->nombre;
        $cita->apellido_p = $paciente->apellido;
        $cita->imagen_p = $paciente->imagen;
        $cita->email_p = $paciente->email;
        $cita->telefono_p = $paciente->telefono;

        $medicos = User::where('tipo', '=', 'medico')->orderBy('id', 'ASC')->get();

        $medicos->each(function($medicos){
            $medicos->especialidad;
        });

        $pacientes = User::where('tipo', '!=', 'medico')->orderBy('id', 'ASC')->get();
        //$pacientes = User::where('tipo', '!=', 'medico')->orderBy('id', 'ASC')->lists('nombre', 'id');

        $array_pacientes = array();

        foreach ($pacientes as $paciente) {
            $array_pacientes[$paciente->id] = $paciente->nombre . ' ' .  $paciente->apellido;
        }

        $especialidades = especialidad::orderBy('id', 'ASC')->lists('nombre', 'id');

        $array_especialidad = array();

        foreach ($medicos as $medico){
            foreach ($medico->especialidad as $especialidad){
                $array_especialidad[$especialidad->id] = $especialidad->nombre;
            }
        }

        $periodo_cita = periodo_cita::orderBy('periodo', 'ASC')->get();
        $array_periodo_cita = array();

        foreach ($periodo_cita as $periodo) {
            $array_periodo_cita[$periodo->id] = $periodo->periodo . ' - ' .  $periodo->ano;
        }
        $cita->fecha = str_replace('-', '/', $cita->fecha);
        //sort($array_periodo_cita, 0);
        asort($array_especialidad);
        //dd($bodytag);
        return view('pagina.funcionalidad.admin.citas.edit')->with('cita', $cita)
        /**/                                                ->with('medicos', $medicos)
        /**/                                                ->with('especialidades', $array_especialidad)
        /**/                                                ->with('aux_pacientes', $array_pacientes)
        /**/                                                ->with('aux_periodo', $array_periodo_cita);
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
        //dd($request);

        $paciente = User::find($request->cedula);

        $cita = cita::find($id);
        
        $cita->id_periodo = $request->periodo;
        $cita->cedula_paciente = $request->cedula;
        $cita->cedula_medico = $request->medico;
        $cita->fecha = $request->fecha;
        $cita->hora = $request->hora;
        $cita->estado = $request->estado;
        $cita->id_especialidad = $request->especialidad;

        $cita->save();
        //dd($request);

        Flash::success("Se ha Modificado Cita Al El Paciente  " . $paciente->nombre . ' ' . $paciente->apellido);
        return redirect()->route('admin.citas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cita = cita::find($id);
        $cita->delete();

        $user = User::find($cita->cedula_paciente);
        
        //dd($user);
        
        Flash::error("Se ha Eliminado La Cita De  " . $user->nombre . ' ' . $user->apellido);
        return redirect()->route('admin.citas.index');
    }
}
