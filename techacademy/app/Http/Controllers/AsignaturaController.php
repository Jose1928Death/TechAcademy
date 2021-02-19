<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asignaturas=Asignatura::orderBy('nombre')->paginate(6);
        return view('asignaturas.asigindex', compact('asignaturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asignaturas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required'],
            'horas' => 'required|integer|between:1,10'
        ]);
        $asignatura = new Asignatura();
        $asignatura->nombre = ucwords($request->nombre);
        $asignatura->horas = ucwords($request->horas);

        $asignatura->save();
        return redirect()->route('asignaturas.index')->with('mensaje', "Asignatura guardada.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function show(Asignatura $asignatura)
    {
        return view('asignaturas.show', compact('asignatura'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function edit(Asignatura $asignatura)
    {
        return view('asignaturas.edit', compact('asignatura'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asignatura $asignatura)
    {
        $request->validate([
            'nombre' => ['required'],
            'horas' => 'required|integer|between:1,10'
        ]);
        $asignatura->update([
            'nombre' => ucwords($request->nombre),
            'horas' => ucwords($request->horas)
        ]);

        return redirect()->route('asignaturas.index')->with('mensaje', "Asignatura actualizado.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asignatura $asignatura)
    {
        $asignatura->delete();
        return redirect()->route('asignaturas.index')->with("mensaje", "Asignatura Borrada correctamente.");
    }
    public function alumnosAsignatura(Asignatura $asignatura){
        $alumnos=$asignatura->alumnos()->orderBy('apellidos')->paginate(5);
        return view('matriculas.alumnosxmodulo', compact('alumnos', 'asignatura'));
    }

    public function createMatricula(Asignatura $asignatura){
        $alumnos = $asignatura->alumnosOut()->paginate(8);
        $total=$alumnos->count();
        return view('matriculas.create2', compact('alumnos', 'total', 'asignatura'));
    }

    public function storeMatricula(Request $request){
        $asignatura = Asignatura::find($request->asignatura_id);
        if(is_array($request->misAlumnos)){
            foreach($request->misAlumnos as $alumno_id){
                $asignatura->alumnos()->attach($alumno_id);
            }
        }
        return redirect()->route('matriculas.alumnosasignatura', $asignatura)->with("mensaje", "Alumno/s matriculado/s correctamente");
    }
}
