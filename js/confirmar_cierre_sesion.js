// confirmar_cierre_sesion.js
function confirmarCerrarSesion() {
    // Mostrar una alerta de confirmación y guardar la respuesta del usuario
    var respuesta = window.confirm("¿Estás seguro de cerrar sesión?");
    
    // Verificar la respuesta del usuario
    if (respuesta) {
        // Si el usuario elige "Sí", redirigir al script PHP para cerrar sesión
        window.location.href = "index.php?vista=logout";
    } else {
        // Si el usuario elige "No", no hacer nada o realizar alguna otra acción
        // Por ejemplo, puedes mostrar un mensaje en la consola
        console.log("El usuario decidió no cerrar sesión.");
    }
}
