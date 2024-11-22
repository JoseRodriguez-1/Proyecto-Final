<?php
// Iniciar sesión y verificar si el usuario está autenticado
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: inicio_sesion.php');
    exit();
}

// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tienda";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el nombre del usuario de la sesión
$nombre_usuario = $_SESSION['username'];

// Consultar información del usuario
$sql_usuario = "SELECT * FROM `usuarios` WHERE `nombre usuario` = ?";
$stmt_usuario = $conn->prepare($sql_usuario);
$stmt_usuario->bind_param("s", $nombre_usuario);
$stmt_usuario->execute();
$result_usuario = $stmt_usuario->get_result();
$usuario = $result_usuario->fetch_assoc();

// Consultar historial de compras del usuario
$sql_compras = "SELECT * FROM `historial de compras` WHERE `usuario` = ?";
$stmt_compras = $conn->prepare($sql_compras);
$stmt_compras->bind_param("s", $nombre_usuario);
$stmt_compras->execute();
$result_compras = $stmt_compras->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario - Tienda de Videojuegos Retro</title>
    <link rel="stylesheet" href="estilo1.css">
    <style>
        body {
            background-color: #0d0d40;
            font-family: Arial, sans-serif;
            color: #f0f0c9;
            line-height: 1.6;
        }

        .user-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #2c2c7c;
            border: 3px solid #ff0080;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.8);
        }

        .user-container h2 {
            margin-bottom: 20px;
            color: #ff8000;
        }

        .user-info, .user-history {
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 1rem;
        }

        table, th, td {
            border: 2px solid #ff8000;
        }

        th, td {
            padding: 15px;
            text-align: center;
        }

        th {
            background: #ff0080;
            color: #fff;
        }

        td {
            background: #1f1f7a;
            color: #f0f0c9;
        }

        .logout-button {
            background: linear-gradient(45deg, #ff0080, #00ffcc);
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-weight: bold;
            border-radius: 5px;
            transition: background 0.3s, transform 0.3s;
            text-decoration: none;
        }

        .logout-button:hover {
            background: linear-gradient(45deg, #00ffcc, #ff0080);
            transform: translateY(-3px);
        }

        .header-icons {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .header-icons img {
            width: 40px;
            height: auto;
            filter: drop-shadow(0 0 5px #ffcc00);
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #1f1f7a;
            padding: 10px 20px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.8);
            color: #f0f0c9;
        }

        footer {
            text-align: center;
            padding: 20px;
            background: #1f1f7a;
            color: #f0f0c9;
            border-top: 3px solid #ff0080;
        }

        .social-icons img {
            width: 30px;
            height: auto;
            margin: 0 10px;
            filter: drop-shadow(0 0 5px #00ffcc);
        }
    </style>
</head>
<body>
    <header>
        <div class="header-container">
            <h1>Tienda de Videojuegos Retro</h1>
            <div class="header-icons">
                <?php
                echo "<p>Bienvenido, " . ($nombre_usuario) . "</p>";
                ?>
                <a href="carrito_compra.html"><img src="img/extra/carrito-de-compras.png" alt="Carrito" class="icon"></a>
                <a href="cerrar.php" class="logout-button">Cerrar Sesión</a>
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

    <div class="user-container">
        <!-- Información del Usuario -->
        <div class="user-info">
            <h2>Información del Usuario</h2>
            <p><strong>Nombre de Usuario:</strong> <?php echo ($usuario['nombre usuario']); ?></p>
            <p><strong>Correo Electrónico:</strong> <?php echo ($usuario['correo']); ?></p>
            <p><strong>Fecha de Nacimiento:</strong> <?php echo ($usuario['fecha nacimiento']); ?></p>
            <p><strong>Código Postal:</strong> <?php echo ($usuario['cp']); ?></p>
        </div>

        <!-- Historial de Compras del Usuario -->
        <div class="user-history">
            <h2>Historial de Compras</h2>
            <?php if ($result_compras->num_rows > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID Compra</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Fecha de Compra</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($compra = $result_compras->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo ($compra['id_compra']); ?></td>
                                <td><?php echo ($compra['producto']); ?></td>
                                <td><?php echo ($compra['precio']); ?> USD</td>
                                <td><?php echo ($compra['fecha']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No has realizado ninguna compra aún.</p>
            <?php endif; ?>
        </div>
    </div>
                
    <footer>
        <p>&copy; 2024 Tienda de Videojuegos Retro. Todos los derechos reservados.</p>
        <div class="footer-links">
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
</body>
</html>

<?php
// Cerrar la declaración y la conexión
$stmt_usuario->close();
$stmt_compras->close();
$conn->close();
?>
