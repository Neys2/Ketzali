<?php 
require 'conexion.php';
session_start();
$db = new Conexion();
$con = $db->conectar();

//var_dump( $_POST);
$idProducto = $_POST['id'];

$sql = $con->prepare("SELECT * FROM articulo WHERE ID_A = ".$idProducto);
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($resultado[0]['ID_U']);
        if($resultado > 0 ){
            if($resultado[0]['cantidad'] >= 1 ){
                array_push($_SESSION['carrito'],["ID_A"=>$resultado[0]['ID_A']]);

                echo "Producto añadido al carrito";
            }else{
                echo "No hay disponibilidad del producto";
                return;
            }
        }else{
            echo "Error al añadir producto al carrito";
            return;
        }


?>