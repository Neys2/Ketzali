<?php
require 'conexion.php';
session_start();
$db = new Conexion();
$con = $db->conectar();
$idU = $_SESSION['id_usuario'];



if (!empty($_POST["actualizar"])) {
    if (!empty($_POST["nombre"])){
        $dato = $_POST["nombre"];
        $sql = $con->prepare("UPDATE Usuario SET nombreU = '$dato' WHERE ID_U = $idU");
        $sql->execute();

    }
    if(!empty($_POST["correo"])){
        $dato = $_POST["correo"];
        $sql = $con->prepare("UPDATE Usuario SET correoU = '$dato' WHERE ID_U = $idU");
        $sql->execute();

    }
    if(!empty($_POST["password"])){
        $dato = $_POST["password"];
        $sql = $con->prepare("UPDATE Usuario SET contrasena = '$dato' WHERE ID_U = $idU");
        $sql->execute();

    }
    if(!empty($_POST["telefono"])){
        $dato = $_POST["telefono"];
        $sql = $con->prepare("UPDATE Usuario SET telefono = '$dato' WHERE ID_U = $idU");
        $sql->execute();

    }
    if(!empty($_POST["domicilio"])){
        $dato = $_POST["domicilio"];
        $sql = $con->prepare("UPDATE Usuario SET domicilio = '$dato' WHERE ID_U = $idU");
        $sql->execute();

    }
    if(!empty($_POST["tarjeta"])){
        $dato = $_POST["tarjeta"];
        $sql = $con->prepare("UPDATE Usuario SET numTarjeta = '$dato' WHERE ID_U = $idU");
        $sql->execute();

    }
}else{
    echo 'No ocurrió nada ';
}
header("Location:Usuario/perfil.php");

?>