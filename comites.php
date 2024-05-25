<?php
require_once 'clases/clsComites.php';

if (isset($_POST['update_comites'])) {
    $comite = new Comites($_POST['update_id_Comite'],$_POST['update_Descripcion'],$_POST['update_Fecha'], $_POST['update_Medidas_Tomadas']);
    $comite->Modificar($con);
} elseif (isset($_POST['add_comites'])) {
    $comite = new Comites(null, $_POST['add_Descripcion'], $_POST['add_Fecha'],$_POST['add_Medidas_Tomadas']);
    $comite->Agregar($con);
} elseif(isset($_POST['delete_comites'])){
    $comite = new Comites($_POST['delete_id_Comite'], '', '', '');
    $comite->Eliminar($con);
}
// Realizar la consulta SQL para obtener las fichas
$query_fichas = "SELECT id_Ficha, Nombre FROM fichas ORDER BY Nombre ASC";
$res_fichas = mysqli_query($con, $query_fichas);

// Realizar la consulta SQL para obtener los comités
$query = "SELECT id_Comite,Fecha, Descripcion, Medidas_Tomadas from comites ORDER BY id_Comite asc;";
$res = mysqli_query($con, $query);

if (!$res) {
    die("Hubo un error al ejecutar la consulta SQL: " . mysqli_error($con));
}
require('views/comites.view.php');
?>
