<?php
class Fichas
{
    public $id_Ficha;
    public $Nombre;
    public $Numero;
    public $Fecha_Inicio;
    public $Fecha_Finalizacion;
    public $Estado;

    function __construct($id_Ficha, $Nombre, $Numero ,$Fecha_Inicio, $Fecha_Finalizacion, $Estado)
    {
        $this->id_Ficha = $id_Ficha;
        $this->Nombre = $Nombre;
        $this->Numero = $Numero;
        $this->Fecha_Inicio = $Fecha_Inicio;
        $this->Fecha_Finalizacion = $Fecha_Finalizacion;
        $this->Estado = $Estado;
    }

    public function Agregar($con)
    {
        $insertar = "INSERT INTO fichas(id_Ficha, Nombre, Numero, Fecha_Inicio, Fecha_Finalizacion, Estado)
        VALUES('$this->id_Ficha', '$this->Nombre', '$this->Numero', '$this->Fecha_Inicio', '$this->Fecha_Finalizacion', '$this->Estado')";
        $exe = mysqli_query($con, $insertar);
        if ($exe !== false) {
            MensajeExitoso("Ficha Registrada al Sistema");
        } else {
            MensajeError("La Ficha No Pudo Ser Registrado al Sistema");
        }
    }

    public function Modificar($con)
    {
        $modificar = "UPDATE fichas SET
        Nombre = '$this->Nombre', Numero = '$this->Numero', Fecha_Inicio = '$this->Fecha_Inicio',
        Fecha_Finalizacion = '$this->Fecha_Finalizacion', Estado = '$this->Estado'
        WHERE id_Ficha = '$this->id_Ficha'";
        $exe = mysqli_query($con, $modificar);
        if ($exe !== false) {
            MensajeExitoso("Ficha Modificado");
        } else {
            MensajeError("la Ficha No Pudo Ser Modificado");
        }
    }

    public function Eliminar($con)
    {
        $eliminar = "DELETE FROM fichas WHERE id_Ficha = '$this->id_Ficha'";
        $exe = mysqli_query($con, $eliminar);
        if ($exe !== false) {
            MensajeExitoso("Ficha Eliminado del Sistema");
        } else {
            MensajeError("La Ficha No Pudo Ser Eliminado");
        }
    }
}

