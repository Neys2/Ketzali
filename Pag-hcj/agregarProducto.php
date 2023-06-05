<?php 
require 'conexion.php';
session_start();
$db = new Conexion();
$con = $db->conectar();

if(isset($_SESSION['id_usuario'])){
    // echo '<pre>';
    // var_dump( $_POST);
    // echo '</pre>';
    // die();
    $idProducto = $_POST['id'];
    $cantidad = $_POST['cantidad'];
    $usuario = $_SESSION['id_usuario'];
    
    $sql = $con->prepare("SELECT * FROM articulo WHERE ID_A = ".$idProducto);
            $sql->execute();
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
            //var_dump($resultado[0]['ID_U']);
            if(sizeof($resultado) > 0 ){
                if($resultado[0]['cantidad'] >= $cantidad ){
                    array_push($_SESSION['carrito'],["ID_A"=>$resultado[0]['ID_A']]);
                    // Lógica del carrito
                    $sql = $con->prepare("INSERT INTO Carrito values($cantidad,$idProducto,$usuario,null)");
                    if($sql->execute()){
                    echo "Producto añadido al carrito";
                    }else{
                    echo "Error con el registro a base de datos, consulte a soporte";    
                    }
                    echo "Producto agregado";
                }else{
                    echo "Stock insuficiente";
                    return;
                }
            }else{
                echo "Error al añadir producto al carrito";
                return;
            }    
}else{
    echo "Inicia sesión para añadir productos a tu carrito :D!";
    return;
}



?>