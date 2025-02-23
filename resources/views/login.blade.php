<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

        .form-group {
            width: 100%;
            margin-top: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 10px 16px;
            border-radius: 99px;
            border: solid 2px rgba(255, 255, 255, 0.1);
            background: rgba(255, 255, 255, 0.1);
            outline: none;
            caret-color: white;
            color: white;
            font-weight: 500;
            transition: 0.25s;
        }

        .form-group input:focus {
            border: solid 2px rgba(255, 255, 255, 0.3);
        }

        .form-group input::placeholder {
            color: rgba(255, 255, 255, 0.75);
        }

        button[type="submit"], .btn-primary, .btn-register {
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

        button[type="submit"]:hover, .btn-primary:hover, .btn-register:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .terms {
            font-size: 12px;
            margin-top: 16px;
            text-align: center;
            color: rgba(255, 255, 255, 0.75);
        }

        .terms a {
            color: white;
            text-decoration: none;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <!-- Sección izquierda (imagen) -->
    <div class="left-section">
        <h1>SMART RAIN HUB</h1>
    </div>

    <!-- Sección derecha (formulario) -->
    <div class="right-section">
        <div class="container">
            <h1>Inicio de Sesion</h1>
  

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('blocked'))
                <div class="alert alert-warning">
                    {{ session('blocked') }}
                </div>
                <script>
                    // Deshabilitar el formulario después de 3 intentos fallidos
                    document.addEventListener('DOMContentLoaded', function() {
                        const form = document.querySelector('form');
                        form.querySelectorAll('input, button').forEach(element => {
                            element.disabled = true;
                        });
                    });
                </script>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                  
                    <input type="email" name="email" id="email" class="form-control" placeholder="Correo Electronico" require>
                    
                </div>
                <div class="form-group">
                
                    <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required>
                </div>
                <button type="submit" class="btn-primary">Iniciar Sesion</button>
            </form>

            <div class="terms">
                No tienes cuenta?<a href="#"></a>
            </div>
<br>

            <p> <a href="{{ route('register') }}" class="btn-register">Regístrate aquí</a></p>
        </div>
    </div>
</body>
</html>