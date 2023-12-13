<?php
require_once('cls_conexion.model.php');
class Clase_Donacion
{
    public function todos()
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT Donacion.CodDonacion, Donacion.NombreDonante, Donante.NombreDonante as donante FROM `Donacion` inner JOIN Donante on Donante.CodDonante = Donacion.CodDonacion";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function uno($CodDonacion)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `Donacion` WHERE CodDonacion=$CodDonacion";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function insertar($TipoDonacion,$OrganoOTejido,$CodDonacion)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "INSERT INTO `donacion`(`TipoDonacion`,`OrganoOTejido`,CodDonacion) VALUES ('$TipoDonacion','$OrganoOTejido', $CodDonacion)";
            $result = mysqli_query($con, $cadena);
            return 'ok';
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    
}
