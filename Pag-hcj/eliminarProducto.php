<?php 
require 'conexion.php';
session_start();
$db = new Conexion();
$con = $db->conectar();
$userid = $_SESSION['id_usuario'];
$idArticulo = $_POST['id'];
    
$sql = $con->prepare("DELETE FROM Carrito WHERE fkUsuario = $userid AND fkArticulo = $idArticulo AND fkVenta IS NULL");
            if($sql->execute()){
                if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
                    foreach($_SESSION['carrito'] as $carrito){
                        if($carrito['ID_A'] == $idArticulo ){
                            $_SESSION['carrito'] = array_diff($_SESSION['carrito'], $carrito['ID_A']);
                        }
                    }
                }
                echo "Producto eliminado";
                return;
            }else{
                echo "Error con la BD. Contacte a soporte";
                return;
            }
