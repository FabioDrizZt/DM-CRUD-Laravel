<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Metodo para manejar un GET
        $datos['empleados'] = Empleado::paginate(5);
        return view('empleado.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // recibimos todos los datos menos el _token
        $datosEmpleados = request()->except('_token');
        if($request->hasFile('foto')){
            $datosEmpleados['foto']=$request->file('foto')->store('uploads','public');
        }
        // Almacenar el  empleado en la base de datos
        Empleado::insert($datosEmpleados);
        // Redirigir a alguna vista.
        return redirect('empleado')->with('mensaje', 'Empleado creado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Método para manejar un GET a empleado/{id_empleado}/edit
        $empleado = Empleado::findOrFail($id);
        return view('empleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // recibimos todos los datos menos el _token
        $datosEmpleados = request()->except('_token','_method');
        if($request->hasFile('foto')){
            $empleado = Empleado::findOrFail($id);
            Storage::delete('public'.$empleado->foto);
            $datosEmpleados['foto']=$request->file('foto')->store('uploads','public');
        }
        // Actualizar al empleado en la BD
        Empleado::where('id','=',$id)->update($datosEmpleados);
        return redirect('empleado')->with('mensaje','Empleado editado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        Storage::delete('public'.$empleado->foto);
        // Borrar el empleado de la BD
        Empleado::destroy($id);
        // Redirige a la vista de empleados
        return redirect('empleado')->with('mensaje', 'Empleado borrado correctamente.');
    }
}