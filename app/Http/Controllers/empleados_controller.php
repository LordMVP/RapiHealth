<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\periodo_cita;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;

class empleados_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('tipo', '=', 'empleado')->orderBy('id', 'ASC')->paginate(5);
        
        //Flash::success("Hola");

        return view('pagina.funcionalidad.admin.empleados.empleados')->with('users', $users);
        //return view('pagina.funcionalidad.admin.usuarios.usuarios');
        //dd($users);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pagina.funcionalidad.admin.empleados.create');
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
        Flash::success("Se ha Creado El Empleado " . $request->nombre . ' ' . $request->apellido);
        return redirect()->route('admin.empleados.index');
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
        $user = User::find($id);
        //dd($users);   
        return view('pagina.funcionalidad.admin.empleados.edit')->with('user', $user);
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

        Flash::warning("Se ha Editado El Empleado " . $request->nombre . ' ' . $request->apellido);
        return redirect()->route('admin.empleados.index');
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

        Flash::error("Se ha Eliminado El Empleado " . $user->nombre . ' ' . $user->apellido);
        return redirect()->route('admin.empleados.index');
    }
}
