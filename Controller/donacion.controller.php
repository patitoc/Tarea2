<?php
require_once('../Models/cls_donacion.model.php');
$donacion = new Clase_Donacion;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array(); //defino un arreglo
        $datos = $donacion->todos(); //llamo al modelo de usuarios e invoco al procedimiento todos y almaceno en una variable
        while ($fila = mysqli_fetch_assoc($datos)) { //recorro el arreglo de datos
            $todos[] = $fila;
        }
        echo json_encode($todos); //devuelvo el arreglo en formato json
        break;
    case "uno":
        $CodDonacion= $_POST["Código Donación"]; //defino una variable para almacenar el codigo Donacion, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $donacion->uno($CodDonacion); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;
    case 'insertar':
        $CodDonacion = $_POST["Codigo Donación"];
        $TipoDonacion = $_POST["Tipo Donacion"];
        $OrgTej = $_POST["Organo o Tejido"];
        $datos = array(); //defino un arreglo
        $datos = $donacion->insertar($OrgTej; $TipoDonacion; $CodDonacion); //llamo al modelo de usuarios e invoco al procedimiento insertar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
   
}
