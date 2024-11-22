<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";   // Dirección del servidor MySQL (localhost para pruebas locales)
$username = "root";    // Usuario de la base de datos MySQL
$password = ""; // Contraseña del usuario de MySQL
$dbname = "tienda";          // Nombre de tu base de datos

// Crear la conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Obtener los datos del formulario y filtrar para evitar inyección SQL
$usuario = mysqli_real_escape_string($conn, $_POST['username']);
$correo = mysqli_real_escape_string($conn, $_POST['email']);
$contraseña = $_POST['password']; // Se mantiene tal cual, ya no se encripta
$fecha_nacimiento = mysqli_real_escape_string($conn, $_POST['bdate']);
$numero_tarjeta = mysqli_real_escape_string($conn, $_POST['card-number']);
$codigo_postal = mysqli_real_escape_string($conn, $_POST['cp']);

// Insertar los datos en la tabla usuarios utilizando una declaración preparada
$sql = "INSERT INTO `usuarios` (`nombre usuario`, `correo`, `contraseña`, `fecha nacimiento`, `numero tarjeta`, `cp`) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt) {
    // Vincular los parámetros
    $stmt->bind_param("ssssss", $usuario, $correo, $contraseña, $fecha_nacimiento, $numero_tarjeta, $codigo_postal);
    
    // Ejecutar la declaración
    if ($stmt->execute()) {
        echo "Registro exitoso. Ahora puedes <a href='inicio_sesion.php'>iniciar sesión</a>.";
    } else {
        echo "Error al registrar: " . $stmt->error;
    }

    // Cerrar la declaración
    $stmt->close();
} else {
    echo "Error al preparar la consulta: " . $conn->error;
}

// Cerrar la conexión
mysqli_close($conn);
?>
