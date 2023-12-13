<?php
require_once('cls_conexion.model.php');
class Clase_Donante
{
    public function todos()
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `donante`";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function uno($CodDonante)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `donante` WHERE CodDonante=$CodDonante";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function insertar($NombreDonante, $Cedula, $Edad, $Genero, $GrupoSanguineo, $UnidadDetectora, $TipoDeMuerte, $TipoDonante)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "INSERT INTO `donante`(`CodDonante`, `NombreDonante`, `Cedula`, `Edad`, `Genero`, `GrupoSanguineo`, `UnidadDetectora`, `TipoDeMuerte`, `TipoDonante`) VALUES ('$NombreDonante, $Cedula, $Edad, $Genero, $GrupoSanguineo, $UnidadDetectora, $TipoDeMuerte, $TipoDonante)";
            //INSERT INTO `donante` (`CodDonante`, `NombreDonante`, `Cedula`, `Edad`, `Genero`, `GrupoSanguineo`, `UnidadDetectora`, `TipoDeMuerte`, `TipoDonante`) VALUES ('Don001', 'Aracely Cadena', '2100136972', '14', 'Femenino', 'ABP', 'Hospital Eugenio Espejo', 'Muerte encefálica', 'Donante efectivo de órganos');

            $result = mysqli_query($con, $cadena);
            return 'ok';
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    

}
