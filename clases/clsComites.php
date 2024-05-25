<?php
class Comites
{
    public $id_Comite;
    public $Fecha;
    public $Descripcion;
    public $Medidas_Tomadas; // Corregí el nombre a "Medidad_Tomadas" en caso de ser un error tipográfico

    function __construct($id_Comite,$Fecha, $Descripcion, $Medidas_Tomadas)
    {
        $this->id_Comite = $id_Comite;
        $this->Fecha = $Fecha;
        $this->Descripcion = $Descripcion;
        $this->Medidas_Tomadas = $Medidas_Tomadas;
    }

    public function Agregar($con)
    {
        $insertar = "INSERT INTO comites(id_Comite, Fecha, Descripcion, Medidas_Tomadas)
        VALUES('$this->id_Comite','$this->Fecha',  '$this->Descripcion', '$this->Medidas_Tomadas')";
        $exe = mysqli_query($con, $insertar);
        if ($exe !== false) {
            MensajeExitoso("Comité Registrado al Sistema");
        } else {
            MensajeError("El Comité No Pudo Ser Registrado al Sistema");
        }
    }

    public function Modificar($con)
    {
        $modificar = "UPDATE comites SET
         Descripcion = '$this->Descripcion',Fecha = '$this->Fecha', Medidas_Tomadas = '$this->Medidas_Tomadas'
        WHERE id_Comite = '$this->id_Comite'";
        $exe = mysqli_query($con, $modificar);
        if ($exe !== false) {
            MensajeExitoso("Comité Modificado");
        } else {
            MensajeError("El Comité No Pudo Ser Modificado");
        }
    }

    public function Eliminar($con)
    {
        $eliminar = "DELETE FROM comites WHERE id_Comite = '$this->id_Comite'";
        $exe = mysqli_query($con, $eliminar);
        if ($exe !== false) {
            MensajeExitoso("Comité Eliminado del Sistema");
        } else {
            MensajeError("El Comité No Pudo Ser Eliminado");
        }
    }
}
