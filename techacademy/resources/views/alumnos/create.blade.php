@extends('plantillas.plantilla1')
@section('titulo')
nuevo alumno
@endsection
@section('cabecera')
Crear Alumno
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
<form name="fom" action="{{route('alumnos.store')}}" method="POST" enctype="multipart/form-data" class="mt-3">
@csrf
<div class="flex items-center w-full justify-center">
    <div class="max-w-xs">
        <div class="bg-white shadow-xl rounded-lg py-3">
            <div class="photo-wrapper p-2">
                <input type="file" name="foto" class="form-control-file" />
            </div>
                <table class="text-xs my-3">
                    <tbody>
                        <tr>
                            <td class="px-2 py-2 text-gray-500 font-semibold">Nombre</td>
                            <td class="px-2 py-2"><input type="text" name="nombre" class="form-control"></td>
                        </tr>
                        <tr>
                            <td class="px-2 py-2 text-gray-500 font-semibold">Apellidos</td>
                            <td class="px-2 py-2"><input type="text" name="apellidos" class="form-control"></td>
                        </tr>
                        <tr>
                            <td class="px-2 py-2 text-gray-500 font-semibold">Email</td>
                            <td class="px-2 py-2"><input type="text" name="email" class="form-control"></td>
                        </tr>
                    </tbody>
                </table>
        </div>
    </div>
</div>
<div class="container text-center mt-10">
    <button type="submit" class="bg-blue-600 hover:bg-green-800 rounded text-white font-bold py-2 px-4 shadow"><i
            class="fa fa-edit"></i> Crear Alumno</button>
    <a href="{{ route('alumnos.index') }}"
        class="bg-yellow-600 hover:bg-green-800 rounded text-white font-bold py-2 px-4 shadow">
        <i class="fa fa-home"></i> Inicio</a>
</div>
</form>
@endsection
