<h2>Formulario de Registro</h2>

<form action="{{ url('empleado') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="nombre">Nombre:</label><br>
    <input type="text" id="nombre" name="nombre" required><br><br>

    <label for="apellido">Apellido:</label><br>
    <input type="text" id="apellido" name="apellido" required><br><br>

    <label for="correo">Correo:</label><br>
    <input type="email" id="correo" name="correo" required><br><br>

    <label for="foto">Subir Foto:</label><br>
    <input type="file" id="foto" name="foto" accept="image/*" required><br><br>

    <input type="submit" value="Enviar">
</form>
