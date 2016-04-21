<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\especialidad;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;

class especialidad_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $especialidad = especialidad::orderBy('id', 'ASC')->paginate(5);
        
        return view('pagina.funcionalidad.admin.especialidad.especialidad')->with('especialidad', $especialidad);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pagina.funcionalidad.admin.especialidad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $especialidad = new especialidad($request->all());
        $especialidad->save();

        Flash::success("Se ha Creado La Especialidad " . $request->nombre);
        return redirect()->route('admin.especialidad.index');
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
        $especialidad = especialidad::find($id);
        //dd($users);   
        return view('pagina.funcionalidad.admin.especialidad.edit')->with('especialidad', $especialidad);
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
        $especialidad = especialidad::find($id);
        $especialidad->nombre = $request->nombre;
        $especialidad->save();

        Flash::warning("Se ha Editado La Especialidad " . $request->nombre);
        return redirect()->route('admin.especialidad.index');

        //dd($especialidad);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $especialidad = especialidad::find($id);
        $especialidad->delete();

        Flash::error("Se ha Eliminado La Especialidad " . $especialidad->nombre);
        return redirect()->route('admin.especialidad.index');
    }
}
