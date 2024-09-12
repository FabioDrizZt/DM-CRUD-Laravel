@extends('layouts.app')

@section('content')
<div class="container">
<h2>Formulario de Registro</h2>

<form action="{{ url('empleado') }}" method="POST" enctype="multipart/form-data">
    @include('empleado.form',['accion' => 'Crear'])
</form>
</div>
@endsection
