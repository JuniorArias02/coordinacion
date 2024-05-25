<?php
class Aprendices
{
    public $id_Aprendiz;
    public $Ficha;
    public $Nombre;

    public $Apellido;
    public $Renta_Joven;
    public $Beneficios_Bienestar;
    public $Historial;

    function __construct($id_Aprendiz, $Ficha, $Nombre, $Apellido, $Renta_Joven, $Beneficios_Bienestar, $Historial)
    {
        $this->id_Aprendiz = $id_Aprendiz; // Inicializamos id_Ficha
        $this->Ficha = $Ficha;
        $this->Nombre = $Nombre;
        $this->Apellido = $Apellido;
        $this->Renta_Joven = $Renta_Joven;
        $this->Beneficios_Bienestar = $Beneficios_Bienestar;
        $this->Historial = $Historial;
    }
   
    

    public function Agregar($con)
    {
        $insertar = "INSERT INTO aprendices(id_Aprendiz,Ficha, Nombre, Apellido, Renta_Joven, Beneficios_Bienestar, Historial)
        VALUES('$this->id_Aprendiz', '$this->Ficha', '$this->Nombre', '$this->Apellido', '$this->Renta_Joven', '$this->Beneficios_Bienestar', '$this->Historial')";
        $exe = mysqli_query($con, $insertar);
        if ($exe !== false) {
            MensajeExitoso("Aprendiz Registrado al Sistema");
        } else {
            MensajeError("El Aprendiz No Pudo Ser Registrado al Sistema");
        }
    }

    public function Modificar($con)
    {
        $modificar = "UPDATE aprendices SET
        Ficha = '$this->Ficha',Nombre = '$this->Nombre', Apellido = '$this->Apellido', Renta_Joven = '$this->Renta_Joven',
        Beneficios_Bienestar = '$this->Beneficios_Bienestar', Historial = '$this->Historial'
        WHERE id_Aprendiz = '$this->id_Aprendiz'";
        $exe = mysqli_query($con, $modificar);
        if ($exe !== false) {
            MensajeExitoso("Aprendiz Modificado");
        } else {
            MensajeError("El Aprendiz No Pudo Ser Modificado");
        }
    }

    public function Eliminar($con)
    {
        $eliminar = "DELETE FROM aprendices WHERE id_Aprendiz = '$this->id_Aprendiz'";
        $exe = mysqli_query($con, $eliminar);
        if ($exe !== false) {
            MensajeExitoso("Aprendiz Eliminado del Sistema");
        } else {
            MensajeError("El Aprendiz No Pudo Ser Eliminado");
        }
    }
}
