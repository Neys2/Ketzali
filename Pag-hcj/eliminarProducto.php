<?php 
require 'conexion.php';
session_start();
$db = new Conexion();
$con = $db->conectar();
$userid = $_SESSION['id_usuario'];
$idArticulo = $_POST['id'];
    
    $sql = $con->prepare("DELETE FROM Carrito WHERE fkUsuario = $userid AND fkArticulo = $idArticulo AND fkVenta IS NULL");
            if($sql->execute()){
                echo "Producto eliminado";
                return;
            }else{
                echo "Error con la BD. Contacte a soporte";
                return;
            }
