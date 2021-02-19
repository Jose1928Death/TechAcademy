@extends('plantillas.plantilla1')
@section('titulo')
nueva asignatura
@endsection
@section('cabecera')
Crear Asignatura
@endsection
@section('contenido')
@if ($errors->any())
    <div class="alert alert-danger my-3 p-2">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form name="fom" action="{{route('asignaturas.store')}}" method="POST" enctype="multipart/form-data" class="mt-3">
@csrf
<div class="flex items-center w-full justify-center">
    <div class="max-w-xs">
        <div class="bg-white shadow-xl rounded-lg py-3">
                <table class="text-xs my-3">
                    <tbody>
                        <tr>
                            <td class="px-2 py-2 text-gray-500 font-semibold">Nombre</td>
                            <td class="px-2 py-2"><input type="text" name="nombre" class="form-control"></td>
                        </tr>
                        <tr>
                            <td class="px-2 py-2 text-gray-500 font-semibold">Horas</td>
                            <td class="px-2 py-2"><input type="text" name="horas" class="form-control"></td>
                        </tr>
                    </tbody>
                </table>
        </div>
    </div>
</div>
<div class="container text-center mt-10">
    <button type="submit" class="bg-blue-600 hover:bg-green-800 rounded text-white font-bold py-2 px-4 shadow"><i
            class="fa fa-edit"></i> Crear Asignatura</button>
    <a href="{{ route('asignaturas.index') }}"
        class="bg-yellow-600 hover:bg-green-800 rounded text-white font-bold py-2 px-4 shadow">
        <i class="fa fa-home"></i> Inicio</a>
</div>
</form>
@endsection
