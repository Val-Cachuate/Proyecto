<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta Alumnos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
<br><br>
<br>
<h3>Registro de Admin</h3>
<hr>
<br>
<form action="{{ route('registrarAdmin') }}" method="POST">
    @csrf

    <div class="form-floating mb-3">
        <input type="input" class="form-control" name="nombre" value="{{  old('nombre') }}" id="floatingNombre"
        placeholder="ejemplo: Valeria" aria-describedby="NombreHelp">
        <label for="floatingNombre" >Nombre</label>
        @error('nombre')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-floating mb-3">
    <input type="input" class="form-control" name="appat" value="{{  old('appat') }}" id="floatingappat"
        placeholder="ejemplo: Valeria" aria-describedby="appatHelp">
        <label for="floatingappat" >Apellido Paterno</label>
        @error('appat')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-floating mb-3">
    <input type="input" class="form-control" name="apmat" value="{{  old('apmat') }}" id="floatingapmat"
        placeholder="ejemplo: Valeria" aria-describedby="apmatHelp">
        <label for="floatingapmat" >Apellido Materno</label>
        @error('apmat')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="input-group mb-3">
        <select class="form-select" id="genero" name="genero">
        <option selected>Selecciona una opcion...</option>
            <option value="Hombre">Hombre</option>
            <option value="Mujer">Mujer</option>
        </select>
        <label class="input-group-text" for="genero">Género</label>
        @error('genero')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-floating mb-3">
        <input type="date" class="form-control" name="fn" value="{{  old('fn') }}" id="floatingfn"
        placeholder="ejemplo: 20/02/2005" aria-describedby="fnHelp">
        <label for="floatingfn" >Fecha de Nacimiento</label>
        <div id="fnHelp" class="form-text">Coloque su fecha de nacimiento (<i>Formato</i>: día/mes/año)<div>
        @error('fn')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-floating mb-3">
        <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="floatingEmail"
        placeholder="ejemplo@correo.com" aria-describedby="emailHelp">
        <label for="floatingEmail">E-mail</label>            
        @error('email')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-floating mb-3">
        <input type="input" class="form-control" name="pass" value="{{  old('pass') }}" id="floatingNombre"
        placeholder="ejemplo: 1010" aria-describedby="NombreHelp">
        <label for="floatingNombre" >Contraseña</label>
        @error('pass')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-2">
        <label for="activo" class="form-label">Estatus</label>
        <select class="form-select" name="activo" id="activo">
            <option value="1" {{ old('activo') == 1 ? 'selected' : '' }}>Activo</option>
            <option value="0" {{ old('activo') == 0 ? 'selected' : '' }}>Inactivo</option>
        </select>
        <div id="NombreHelp" class="form-text">@if($errors->first('activo')) <i>El campo está vacío ó no es correcto.</i> @endif</div>
    </div>
    <hr><br>
    <button type="submit" class="btn btn-primary">Registrar</button>
    <a href="{{ route('admin') }}">
        <button type="button" class="btn btn-danger">Cancelar</button>
    </a>
</form>
</div>
</html>