<?php

namespace App\Http\Controllers;

use App\Nota;
use Illuminate\Http\Request;
use App;    //para que nos deje usar nuestros modelos


class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $notas = App\Nota::paginate(5);               //para mostrar todas las notas guardadas en la BDD 
                                                //App\Nota es la ubicación del modelo
        return view('inicio', compact('notas'));       //Nos envía los datos a la pantalla
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()        //CREAR
    {
        //


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)         //GUARDAR
    {
        //
        $notaAgregar = new Nota;
        //validación
        $request->validate([
                'nombre' => 'required',
                'descripcion' => 'required',
        ]);
        $notaAgregar->nombre = $request->nombre;
        $notaAgregar->descripcion = $request->descripcion;
        $notaAgregar->save();                   //Guarda en nuestra base de datos
        return back()->with('agregar','La nota se ha agregado');        //el back vá a la página anterior
                                                                        //y el with crea un mensaje que luego se destruye.
                                                                        //el 'agragar' es una sesion que se destruye luego
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show(Nota $nota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)        //EDITAR   //recibimos la variable id
    {
        //
        $notaActualizar = App\Nota::findOrFail($id);        //find para encontrar todo en id    //OrFail para que nos 
                                                        //      mande a la página 404
        return view('editar', compact('notaActualizar'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $notaUpdate = App\Nota::findOrFail($id);
        $notaUpdate->nombre = $request->nombre;
        $notaUpdate->descripcion = $request->descripcion;
        $notaUpdate->save();
        return back()->with('update','La nota ha sido actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notaEliminar = App\Nota::findOrFail($id);
        $notaEliminar->delete();
        return back()->with('eliminar', 'La nota ha sido eliminada correctamente');   //with('eliminar') es una sesión
    }
}
