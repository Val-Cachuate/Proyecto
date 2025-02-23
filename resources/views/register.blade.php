<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
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
        }

        /* Sección izquierda (imagen) */
        .left-section {
            flex: 1;
            background: url('https://www.bing.com/th/id/OGC.d44750cce4f05b747e545da96e187a5c?pid=1.7&rurl=http%3a%2f%2f3.bp.blogspot.com%2f-fcZxdItc8po%2fUeFr0lfDwzI%2fAAAAAAAABFE%2fExBtAVGtY2E%2fs1600%2fpaisajes-de-lluvia-6p.gif&ehk=X1SJagP%2b0oDjeSsVwDIf2JiW90KQ7nW%2fczWkQ%2f0azag%3d') no-repeat center center;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
        }

        .left-section h1 {
            font-size: 2.5rem;
            font-weight: 600;
            background: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
        }

        /* Sección derecha (formulario) */
        .right-section {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(0, 0, 0, 0.8);
        }

        .container {
            background: rgba(255, 255, 255, 0.1);
            width: 320px;
            padding: 24px;
            border-radius: 16px;
            border: solid 2px rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            box-shadow: 0px 0px 30px 20px rgba(0, 0, 0, 0.1);
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            margin-bottom: 16px;
            font-size: 24px;
            font-weight: 600;
        }

        form {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .input-box {
            display: flex;
            width: 100%;
            position: relative;
            margin-top: 20px;
        }

        .input-box input {
            width: 100%;
            padding: 10px 16px 10px 38px;
            border-radius: 99px;
            border: solid 2px rgba(255, 255, 255, 0.1);
            background: rgba(255, 255, 255, 0.1);
            outline: none;
            caret-color: white;
            color: white;
            font-weight: 500;
            transition: 0.25s;
        }

        .input-box input:focus {
            border: solid 2px rgba(255, 255, 255, 0.3);
        }

        .input-box input::placeholder {
            color: rgba(255, 255, 255, 0.75);
        }

        .input-box i {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 14px;
            color: rgba(255, 255, 255, 0.75);
            font-size: 18px;
            transition: 0.25s;
        }

        .input-box input:focus + i {
            color: white;
        }

        button[type="submit"], .btn-login {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background: rgba(255, 255, 255, 0.1);
            border: solid 2px rgba(255, 255, 255, 0.1);
            border-radius: 99px;
            color: white;
            font-weight: 500;
            cursor: pointer;
            transition: 0.25s;
            text-align: center;
            text-decoration: none;
        }

        button[type="submit"]:hover, .btn-login:hover {
            background: rgba(255, 255, 255, 0.2);
        }
    </style>
    <!-- Incluir Boxicons para los íconos -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <!-- Sección izquierda (imagen) -->
    <div class="left-section">
        <h1>SMART RAIN HUB</h1>
    </div>

    <!-- Sección derecha (formulario) -->
    <div class="right-section">
        <div class="container">
            <h1>Registro</h1>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="input-box">
                    <input type="text" name="nombre" placeholder="Nombre" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="email" name="email" placeholder="Correo electrónico" required>
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Contraseña" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <button type="submit">Registrarse</button>
            </form>
            <!-- Botón para iniciar sesión -->
            <a href="{{ route('login') }}" class="btn-login">Iniciar sesión</a>
        </div>
    </div>
</body>
</html>