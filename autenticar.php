<?php
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

// Obtener los datos del formulario
$usuario = $_POST['username'];
$contrasena = $_POST['password'];

// Buscar el usuario en la base de datos
$sql = "SELECT * FROM `usuarios` WHERE `nombre usuario` = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Error al preparar la consulta: " . $conn->error);
}

$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // El usuario existe, ahora verificar la contraseña
    $row = $result->fetch_assoc();
    $contraseña_guardada = $row['contraseña'];  // Contraseña almacenada sin encriptar en la base de datos

    // Verificar la contraseña ingresada contra la almacenada
    if ($contrasena === $contraseña_guardada) {
        // La contraseña es correcta
        session_start();
        $_SESSION['username'] = $usuario; // Almacena el nombre del usuario en la sesión
        header("Location: index.html"); // Redirige al usuario al inicio
        exit();
    } else {
        // Contraseña incorrecta
        echo "La contraseña es incorrecta. <a href='inicio_sesion.php'>Intentar de nuevo</a>";
    }
} else {
    // El usuario no existe
    echo "El usuario no existe. <a href='inicio_sesion.php'>Intentar de nuevo</a>";
}

// Cerrar la declaración y la conexión
$stmt->close();
$conn->close();
?>
    