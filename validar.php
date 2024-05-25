<?php
session_start();

// Establecer la conexión con la base de datos
$host = "localhost";
$user = "root";
$pass = "";
$db = "coordinacion";

$conexion = new mysqli($host, $user, $pass, $db);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Inicializar la variable de error
$loginError = "";

// Verificar si se enviaron datos mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario y limpiarlos
    $usuario = limpiar_input($_POST['usuario']);
    $password = limpiar_input($_POST['contraseña']);

    // Validar que los campos no estén vacíos
    if (!empty($usuario) && !empty($password)) {
        // Consultar la base de datos para verificar las credenciales
        $sql = "SELECT * FROM usuarios WHERE usuario = ? AND contraseña = ?";
        $statement = $conexion->prepare($sql);
        $statement->bind_param("ss", $usuario, $password);
        $statement->execute();
        $resultado = $statement->get_result();

        // Verificar si se encontró un registro que coincida con las credenciales
        if ($resultado->num_rows > 0) {
            // Iniciar sesión y redirigir al usuario a la página de inicio
            $_SESSION['usuario'] = $usuario;
            header("Location: panel.php");
            exit;
        } else {
            // Las credenciales son incorrectas, mostrar un mensaje de error
            $_SESSION['loginError'] = "Usuario o contraseña incorrectos";
            header("Location: login.php");
            exit;
        }
    } else {
        // Mostrar un mensaje de error si los campos están vacíos
        $_SESSION['loginError'] = "Por favor, ingrese el usuario y la contraseña.";
        header("Location: login.php");
        exit;
    }
}

// Función para limpiar los datos de entrada
function limpiar_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
