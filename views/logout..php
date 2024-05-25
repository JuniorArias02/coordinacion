<?php
// Iniciar sesión si no está iniciada
session_start();

// Si se envía un formulario de confirmación
if (isset($_POST['confirmar'])) {
    if ($_POST['confirmar'] == 'si') {
        // Destruir todas las variables de sesión
        $_SESSION = array();

        // Destruir la sesión
        session_destroy();

        // Redirigir al usuario a la página de inicio de sesión
        header("Location: login.php");
        exit;
    } else {
        // Si el usuario cancela, redirige a alguna página o realiza alguna otra acción
        header("Location: panel.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Confirmar Cerrar Sesión</title>
</head>
<body>

<script>
function confirmarCerrarSesion() {
    var confirmacion = confirm("¿Estás seguro de cerrar sesión?");
    if (confirmacion) {
        document.getElementById("confirmarForm").submit();
    } else {
        // Aquí puedes redirigir a alguna página o realizar alguna otra acción si el usuario cancela
    }
}
</script>

<form id="confirmarForm" method="post">
    <input type="hidden" name="confirmar" value="si">
</form>