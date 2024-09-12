@csrf
<div class="form-group">
    <label class="form-label" for="nombre">Nombre:</label><br>
<input class="form-control" type="text" id="nombre" name="nombre" value="{{ isset($empleado->Nombre) ? $empleado->Nombre : '' }}" required><br><br>

</div>
<div class="form-group">
    <label class="form-label" for="apellido">Apellido:</label><br>
<input class="form-control" type="text" id="apellido" name="apellido" value="{{ isset($empleado->Apellido) ? $empleado->Apellido : '' }}" required><br><br>

</div>
<div class="form-group">
    <label class="form-label" for="correo">Correo:</label><br>
<input class="form-control" type="email" id="correo" name="correo" value="{{ isset($empleado->Correo) ? $empleado->Correo : '' }}" required><br><br>

</div>
<label class="form-label" for="foto">Foto:</label><br>
@if (isset($empleado->Foto))
    <img alt="" class="form-control mb-3" src="/storage/{{ $empleado->Foto }}" style="width: 80px" />
@endif

<br>
<div class="form-group">
    <input class="form-control"    type="file" id="foto" name="foto" accept="image/*"><br><br>
</div>







<a class="btn btn-primary" href="{{url('empleado')}}"> Regresar </a>
<input class="btn btn-success" type="submit" value="{{$accion}} empleado">
