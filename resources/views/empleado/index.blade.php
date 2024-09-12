@extends('layouts.app')

@section('content')
<div class="container">
<a href="{{url('empleado/create')}}" class="btn btn-success"> Crear nuevo empleado </a>
<br>
<h2>Datos de empleados</h2>
@if (Session::has('mensaje'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <p>{{ Session::get('mensaje') }}</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>
@endif

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Foto</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($empleados as $empleado)
        <tr>
            <td>{{$empleado->id}}</td>
            <td>{{$empleado->Nombre}}</td>
            <td>{{$empleado->Apellido}}</td>
            <td>{{$empleado->Correo}}</td>
            <td><img class="img-thumbnail" width="80px" src="{{ asset('storage').'/'.$empleado->Foto}}" alt="Foto de {{$empleado->Nombre}}"></td>
            <td>
                <a class="btn btn-warning" href="{{url('empleado').'/'.$empleado->id.'/edit'}}">Editar</a>
                <form class='d-inline' action="{{url('empleado').'/'.$empleado->id}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button  class="btn btn-danger" type="submit" onclick="return confirm('Quieres borrar el empleado?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $empleados->links() !!}
</div>
@endsection
