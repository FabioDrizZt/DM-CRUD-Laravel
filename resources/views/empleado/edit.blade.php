@extends('layouts.app')

@section('content')
<div class="container">
<h1>Edición de empleado</h1>
<form action="{{ url('empleado').'/'.$empleado->id }}" method="POST" enctype="multipart/form-data">
    @method('PATCH')
    @include('empleado.form',['accion' => 'Editar'])
</form>
</div>
@endsection
