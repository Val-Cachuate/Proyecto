<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Usuario</title>
    <style>
        /* Estilos generales */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, rgba(102, 51, 153, 0.8), rgba(75, 0, 130, 0.8)); /* Fondo degradado morado */
            color: #fff; /* Texto en blanco */
        }

        .container {
            background: rgba(255, 255, 255, 0.9); /* Fondo blanco semi-transparente */
            width: 400px;
            padding: 24px;
            border-radius: 16px;
            border: solid 2px #663399; /* Borde morado */
            box-shadow: 0px 0px 30px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            margin-bottom: 16px;
            font-size: 24px;
            font-weight: 600;
            color: #663399; /* Título en morado */
        }

        p {
            margin-bottom: 16px;
            font-size: 16px;
            color: #333; /* Texto en gris oscuro */
        }

        .btn-logout {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background: #663399; /* Fondo morado */
            border: solid 2px #663399; /* Borde morado */
            border-radius: 99px;
            color: #fff; /* Texto en blanco */
            font-weight: 500;
            cursor: pointer;
            transition: 0.25s;
            text-align: center;
            text-decoration: none;
        }

        .btn-logout:hover {
            background: #4B0082; /* Fondo morado más oscuro al pasar el mouse */
            border: solid 2px #4B0082; /* Borde morado más oscuro al pasar el mouse */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenido, {{ $user['nombre'] }}</h1>
        <p>Correo: {{ $user['email'] }}</p>
        <p>Has iniciado sesión correctamente.</p>

        <!-- Botón de cerrar sesión -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn-logout">Cerrar sesión</button>
        </form>
    </div>
</body>
</html>