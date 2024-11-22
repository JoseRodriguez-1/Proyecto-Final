<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión o Crear Cuenta - Tienda de Videojuegos Retro</title>
    <link rel="stylesheet" href="estilo1.css">
    <style>
        /* Contenedor de inicio de sesión y creación de cuenta */
        .contenedor-login, .contenedor-registro {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background: #1f1f7a;
            border: 3px solid #ff0080;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.7);
            color: #f0f0c9;
            text-align: center;
        }

        .contenedor-login h2, .contenedor-registro h2 {
            margin-bottom: 20px;
            color: #ff8000;
        }

        .contenedor-login input[type="text"],
        .contenedor-login input[type="password"],
        .contenedor-registro input[type="text"],
        .contenedor-registro input[type="password"],
        .contenedor-registro input[type="date"],
        .contenedor-registro input[type="email"] {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            border: 2px solid #ff8000;
            border-radius: 5px;
        }

        .contenedor-login input[type="submit"], 
        .contenedor-registro input[type="submit"] {
            background: linear-gradient(45deg, #00ffcc, #ff0080);
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-weight: bold;
            border-radius: 5px;
            transition: background 0.3s, transform 0.3s;
        }

        .contenedor-login input[type="submit"]:hover,
        .contenedor-registro input[type="submit"]:hover {
            background: linear-gradient(45deg, #ff0080, #00ffcc);
            transform: translateY(-3px);
        }

        .contenedor-login a, .contenedor-registro a {
            display: block;
            margin-top: 15px;
            color: #00ffcc;
            text-decoration: none;
        }

        .contenedor-login a:hover, .contenedor-registro a:hover {
            text-decoration: underline;
        }

        /* Mostrar/ocultar contenedores */
        .oculto {
            display: none;
        }

        /* Contenedor del pie de página y redes sociales */
        .enlaces-pie {
            text-align: center;
            margin-top: 20px;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 15px;
        }

        .social-icons a img {
            width: 40px;
            height: 40px;
            transition: transform 0.3s;
        }

        .social-icons a img:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body>
<?php
// Iniciar la sesión para comprobar si ya hay un usuario logueado
session_start();
?>
    <header>
        <div class="header-container">
            <h1>Tienda de Videojuegos Retro</h1>
            <div class="header-icons">
                <?php
                if (isset($_SESSION['username'])) {
                    // Si el usuario está autenticado, mostrar el ícono con enlace a la página del perfil de usuario
                    echo '<a href="usuario.php"><img src="img/extra/contacto.png" alt="Perfil del Usuario" class="icon"></a>';
                    echo "<p>Bienvenido, " . ($_SESSION['username']) . "</p>";
                } else {
                    // Si el usuario no está autenticado, mostrar el ícono con enlace a la página de inicio de sesión
                    echo '<a href="inicio_sesion.php"><img src="img/extra/contacto.png" alt="Iniciar Sesión" class="icon"></a>';
                }
                ?>
                <a href="carrito_compra.html"><img src="img/extra/carrito-de-compras.png" alt="Carrito" class="icon"></a>
            </div>
        </div>
    </header>
    <nav>
        <div class="nav-container">
            <div class="nav-links-container">
                <a href="index.html" class="nav-link">
                    <img src="img/extra/fogata logo.jpeg" alt="Inicio" class="nav-icon"> Inicio
                </a>
                <a href="nintendo.html" class="nav-link">
                    <img src="img/extra/logo nintendo.jpeg" alt="Nintendo" class="nav-icon"> Nintendo
                </a>
                <a href="playstation.html" class="nav-link">
                    <img src="img/extra/playstation logo.jpeg" alt="PlayStation" class="nav-icon"> Playstation
                </a>
                <a href="xbox.html" class="nav-link">
                    <img src="img/extra/xbox logo.jpeg" alt="Xbox" class="nav-icon"> Xbox
                </a>
            </div>
        </div>
    </nav>
    
    <div class="contenedor-login" id="contenedor-login">
        <h2>Iniciar Sesión</h2>
        <form action="autenticar.php" method="post">
            <input type="text" name="username" placeholder="Usuario" required><br>
            <input type="password" name="password" placeholder="Contraseña" required><br>
            <input type="submit" value="Iniciar Sesión">
        </form>
        <a href="#" onclick="mostrarRegistro()">¿No tienes cuenta? Crear una cuenta</a>
    </div>

    <div class="contenedor-registro oculto" id="contenedor-registro"> 
        <h2>Crear Cuenta</h2>
        <form action="crearc.php" method="post">
            <div class="grupo-formulario">
                <label for="username">Nombre de Usuario:</label>
                <input type="text" id="username" name="username" placeholder="Ingresa tu usuario" required>
            </div>

            <div class="grupo-formulario">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" placeholder="nombre@ejemplo.com" required>
            </div>

            <div class="grupo-formulario">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" placeholder="Mínimo 8 caracteres" minlength="8" required>
            </div>

            <div class="grupo-formulario">
                <label for="bdate">Fecha de Nacimiento:</label>
                <input type="date" id="bdate" name="bdate" required>
            </div>

            <div class="grupo-formulario">
                <label for="card-number">Número de Tarjeta:</label>
                <input type="text" id="card-number" name="card-number" placeholder="1234 5678 9012 3456" maxlength="16" pattern="[0-9]{16}" required>
          
            </div>

            <div class="grupo-formulario">
                <label for="cp">Código Postal:</label>
                <input type="text" id="cp" name="cp" placeholder="Código Postal" maxlength="5" pattern="[0-9]{5}" required>
            </div>

            <input type="submit" value="Crear Cuenta" class="boton-registro">
        </form>
        <a href="#" onclick="mostrarLogin()" class="enlace-login">¿Ya tienes una cuenta? Iniciar Sesión</a>
    </div>

    <footer>
        <p>&copy; 2024 Tienda de Videojuegos Retro. Todos los derechos reservados.</p>
        <div class="enlaces-pie">
            <a href="#">Política de Privacidad</a> | 
            <a href="#">Términos y Condiciones</a> | 
            <a href="#">Contacto</a>
        </div>
        <div class="social-icons">
            <a href="#"><img src="img/extra/facebook.png" alt="Facebook"></a>
            <a href="#"><img src="img/extra/twitter.png" alt="Twitter"></a>
            <a href="#"><img src="img/extra/instagram.png" alt="Instagram"></a>
        </div>
    </footer>

    <script>
        // Funciones JavaScript para alternar entre iniciar sesión y registro
        function mostrarRegistro() {
            document.getElementById('contenedor-login').classList.add('oculto');
            document.getElementById('contenedor-registro').classList.remove('oculto');
        }

        function mostrarLogin() {
            document.getElementById('contenedor-registro').classList.add('oculto');
            document.getElementById('contenedor-login').classList.remove('oculto');
        }
    </script>
</body>
</html>
