<?php
require_once('../Models/cls_donante.models.php');
$donante = new Clase_Donante;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array(); //defino un arreglo
        $datos = $donante->todos(); //llamo al modelo de usuarios e invoco al procedimiento todos y almaceno en una variable
        while ($fila = mysqli_fetch_assoc($datos)) { //recorro el arreglo de datos
            $todos[] = $fila;
        }
        echo json_encode($todos); //devuelvo el arreglo en formato json
        break;
        
    case "uno":
        $CodDonante = $_POST["CodDonante"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $donante->uno($CodDonate); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;
    case 'insertar':
       
        $NombreDonante = $_POST["Nombre Donante"];
        $Cedula = $_POST["Cédula"];
        $Edad = $_POST["Edad"];
        $Genero = $_POST["Género"];
        $GrupoSanguineo = $_POST["Grupo Sanguineo"];
        $UnidadMedDet = $_POST["Unidad Médica Detectora"];
        $TipoMuerte = $_POST["Tipo de Muerte"];
        $TipoDonante = $_POST["Tipo de Donante"];

        $datos = array(); //defino un arreglo
        $datos = $donante->insertar($NombreDonante; $Cedula; $Edad; $Genero; $GrupoSanguineo; $UnidadMedDet; $TipoMuerte; $TipoDonante); //llamo al modelo de donante e invoco al procedimiento insertar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
   
}
