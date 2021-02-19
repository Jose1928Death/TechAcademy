@extends('plantillas.plantilla1')
@section('titulo')
    editar asignatura
@endsection
@section('cabecera')
    Editar Asignatura
@endsection
@section('contenido')
<form name="fom" action="{{ route('asignaturas.update', $asignatura) }}" method="POST" enctype="multipart/form-data"
        class="mt-3">
        @csrf
        @method("PUT")
<div class="flex items-center w-full justify-center">
    <div class="max-w-xs">
        <div class="bg-white shadow-xl rounded-lg py-3">
                <table class="text-xs my-3">
                    <tbody>
                        <tr>
                            <td class="px-2 py-2 text-gray-500 font-semibold">Nombre</td>
                            <td class="px-2 py-2"><input type="text" name="nombre" required value="{{ $asignatura->nombre }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td class="px-2 py-2 text-gray-500 font-semibold">Horas</td>
                            <td class="px-2 py-2"><input type="text" name="horas" required value="{{ $asignatura->horas }}" class="form-control"></td>
                        </tr>
                    </tbody>
                </table>
        </div>
    </div>
</div>
    <div class="container text-center mt-10">
        <button type="submit" class="bg-blue-600 hover:bg-green-800 rounded text-white font-bold py-2 px-4 shadow"><i
                class="fa fa-edit"></i> Editar Alumno</button>
        <a href="{{ route('alumnos.index') }}"
            class="bg-yellow-600 hover:bg-green-800 rounded text-white font-bold py-2 px-4 shadow">
            <i class="fa fa-home"></i> Inicio</a>
    </div>
    </form>
@endsection
