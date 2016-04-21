<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\especialidad;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;

class medicos_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicos = User::where('tipo', '=', 'medico')->orderBy('id', 'ASC')->paginate(5);

        //Flash::success("Hola");

        $medicos->each(function($medicos){
            $medicos->especialidad;
        });

        return view('pagina.funcionalidad.admin.medicos.medicos')->with('users', $medicos);
        //return view('pagina.funcionalidad.admin.usuarios.usuarios');
        //dd($medicos->all());
        //


        //dd($medicos);
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $especialidad = especialidad::orderBy('id', 'ASC')->lists('nombre', 'id');

        return view('pagina.funcionalidad.admin.medicos.create')->with('especialidad', $especialidad);
        
        //dd($especialidad);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = new User($request->all());

        if($request->file('imagen'))
        {
            //Inicio Imagen
            $file = $request->file('imagen');
            $name = $request->apellido . '_' . $request->nombre . '_' . $request->id . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '\plugin\imagenes';
            $file->move($path, $name);
            //Fin Imagen 
            $usuario->imagen = $name;  
        }else{
            if ($request->genero == 'masculino') {
                $usuario->imagen = 'masculino.jpg';
            }else{
                $usuario->imagen = 'femenino.jpg';
            }
        }
        $usuario->password = bcrypt($request->password);

        //dd($usuario);
        $usuario->save();

        $usuario->especialidad()->sync($request->especialidad);
        Flash::success("Se ha Creado El Medico " . $request->nombre . ' ' . $request->apellido);
        return redirect()->route('admin.medicos.index');
        //dd($request->especialidad);
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
        //$user = User::find($id);

        $array = explode("_", $id);
        $id = $array[0];
        if (!empty($array[1])) {
            $id2 = $array[1];
        }else{
            $id2 = 0;
        }

        $especialidad = especialidad::orderBy('id', 'ASC')->lists('nombre', 'id');


        $medicos = User::where('tipo', '=', 'medico')->where('id', '=', $id)->orderBy('id', 'ASC')->get();

        $medicos->each(function($medicos){
            $medicos->especialidad;
        });

        $user = User::find($id);
        $user->id2 = $id2;
        $user->especialidad = $medicos[0]->especialidad;
        //$user->especialidad = $medicos->especialidad;

        //dd($user);   
        return view('pagina.funcionalidad.admin.medicos.edit')->with('user', $user)->with('especialidad', $especialidad);;

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

        $usuario = User::find($id);

        $usuario->id = $request->id;
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->genero = $request->genero;
        $usuario->direccion = $request->direccion;
        $usuario->telefono = $request->telefono;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->tipo = $request->tipo;

        if($request->file('imagen'))
        {
            //Inicio Imagen
            $file = $request->file('imagen');
            $name = $request->apellido . '_' . $request->nombre . '_' . $request->id . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '\plugin\imagenes';
            //Storage::delete(public_path() . $usuario->imagen);
            $file->move($path, $name);
            //Fin Imagen 
            $usuario->imagen = $name;  
        }else{
            if ($request->genero == 'masculino') {
                $usuario->imagen = 'masculino.png';
            }else{
                $usuario->imagen = 'femenino.png';
            }
        }

        $usuario->save();

        Flash::warning("Se ha Editado El Medico " . $request->nombre . ' ' . $request->apellido);
        //return redirect()->route('admin.medicos.index');

        if($request->id2 == 1){
            return redirect()->route('admin.perfil.index');
        }else{
            return redirect()->route('admin.medicos.index');
        }
        //dd($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        Flash::error("Se ha Eliminado El Medico " . $user->nombre . ' ' . $user->apellido);
        return redirect()->route('admin.medicos.index');
    }
}
