<?php
require_once 'clases/clsFichas.php';

// Función para mostrar una alerta en JavaScript
function mostrarAlerta($mensaje) {
    echo "<script>alert('$mensaje');</script>";
}

if (isset($_POST['update_fichas'])) {
    // Verificar si el número de ficha ya existe antes de actualizarla
    $id_Ficha = $_POST['update_id_Ficha'];
    $numero_Ficha = $_POST['update_Numero'];
    $query_verificar = "SELECT COUNT(*) AS total FROM fichas WHERE Numero = '$numero_Ficha' AND id_Ficha != '$id_Ficha'";
    $resultado_verificar = mysqli_query($con, $query_verificar);
    $fila_verificar = mysqli_fetch_assoc($resultado_verificar);
    $total_fichas = $fila_verificar['total'];

    if ($total_fichas > 0) {
        mostrarAlerta('El número de ficha ingresado ya existe.');
    } else {
        $fichas = new Fichas($_POST['update_id_Ficha'], $_POST['update_Nombre'], $_POST['update_Numero'], $_POST['update_Fecha_Inicio'], $_POST['update_Fecha_Finalizacion'], $_POST['update_Estado']);
        $fichas->Modificar($con);
    }
} else if (isset($_POST['add_fichas'])) {
    // Verificar si el número de ficha ya existe antes de agregarla
    $numero_Ficha = $_POST['add_Numero'];
    $query_verificar = "SELECT COUNT(*) AS total FROM fichas WHERE Numero = '$numero_Ficha'";
    $resultado_verificar = mysqli_query($con, $query_verificar);
    $fila_verificar = mysqli_fetch_assoc($resultado_verificar);
    $total_fichas = $fila_verificar['total'];

    if ($total_fichas > 0) {
        mostrarAlerta('El número de ficha ingresado ya existe.');
    } else {
        $fichas = new Fichas(null, $_POST['add_Nombre'], $_POST['add_Numero'], $_POST['add_Fecha_Inicio'], $_POST['add_Fecha_Finalizacion'], $_POST['add_Estado']);
        $fichas->Agregar($con);
    }
} else if(isset($_POST['delete_fichas'])){
    $fichas = new Fichas($_POST['delete_id_Ficha'], '', '', '', '', '');
    $fichas->Eliminar($con);
}

$query = "SELECT id_Ficha, Nombre, Numero, Fecha_Inicio , Fecha_Finalizacion, Estado from fichas
ORDER BY Nombre asc;";
$res = mysqli_query($con, $query);

$query_fichas = "SELECT id_Ficha, Nombre FROM fichas";
$res_fichas = mysqli_query($con, $query_fichas);

if (!$res_fichas) {
    // Manejar el error si la consulta falla
    echo "Hubo un error al obtener las fichas: " . mysqli_error($con);
}

require('views/fichas.view.php');
?>
