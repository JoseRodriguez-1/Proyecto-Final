<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";   // Dirección del servidor MySQL (localhost para pruebas locales)
$username = "root";    // Usuario de la base de datos MySQL
$password = ""; // Contraseña del usuario de MySQL
$dbname = "tienda";          // Nombre de tu base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$usuario = $_POST['username'];
$correo = $_POST['email'];
$contrasena = $_POST['password'];
$fecha_nacimiento = $_POST['bdate'];
$numero_tarjeta = $_POST['card-number'];
$codigo_postal = $_POST['cp'];

// Encriptar la contraseña para mayor seguridad
$contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

// Insertar los datos en la tabla usuarios
$sql = "INSERT INTO usuarios (`nombre usuario`, `correo`, `contraseña`, `fecha nacimiento`, `numero tarjeta`, `cp`) VALUES (?, ?, ?, ?, ?, ?)";

// Preparar la declaración
$stmt = $conn->prepare($sql);
if ($stmt) {
    // Vincular los parámetros
    $stmt->bind_param("ssssss", $usuario, $correo, $contrasena_encriptada, $fecha_nacimiento, $numero_tarjeta, $codigo_postal);

    // Ejecutar la declaración
    if ($stmt->execute()) {
        echo "Registro exitoso. Ahora puedes <a href='inicio_sesion.html'>iniciar sesión</a>.";
    } else {
        echo "Error al registrar: " . $stmt->error;
    }

    // Cerrar la declaración
    $stmt->close();
} else {
    echo "Error al preparar la consulta: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
