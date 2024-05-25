<?php
require_once 'clases/clsAprendices.php';

if (isset($_POST['update_aprendices'])) {
    $aprendices = new Aprendices($_POST['update_id_Aprendiz'],$_POST['update_ficha'], $_POST['update_Nombre'], $_POST['update_Apellido'], $_POST['update_Renta_Joven'], $_POST['update_Beneficios_Bienestar'], $_POST['update_Historial']);
    $aprendices->Modificar($con);
} else if (isset($_POST['add_aprendices'])) {
    $aprendices = new Aprendices(null, $_POST['add_Ficha'],$_POST['add_Nombre'], $_POST['add_Apellido'], $_POST['add_Renta_Joven'], $_POST['add_Beneficios_Bienestar'], $_POST['add_Historial']);
    $aprendices->Agregar($con);
} else if(isset($_POST['delete_aprendices'])){
    $aprendices = new Aprendices($_POST['delete_id_Aprendiz'],'', '', '', '', '','');
    $aprendices->Eliminar($con);
}

// Realizar la consulta SQL
$query = "SELECT id_Aprendiz,Ficha, Nombre, Apellido, Renta_Joven, Beneficios_Bienestar, Historial FROM aprendices ORDER BY Nombre ASC";
$res = mysqli_query($con, $query);

// Verificar si la consulta se ejecutó correctamente
if ($res) {
    // Pasar $res a tu archivo de vista
    require('views/aprendices.view.php');
} else {
    // Manejar el error si la consulta falla
    echo "Hubo un error al ejecutar la consulta SQL: " . mysqli_error($con);
}
?>

