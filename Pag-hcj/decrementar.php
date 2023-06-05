<?php 
include './conexion.php';
session_start();
$db = new Conexion();
$con = $db->conectar();
$usuario = $_SESSION['id_usuario'];
$idArticulo = $_POST['id'];

$sql = $con->prepare("UPDATE Carrito SET cantidadArt = cantidadArt - 1 where fkUsuario = $usuario AND fkArticulo = $idArticulo AND fkVenta IS NULL");
            if($sql->execute()){
                echo "Cantidad del artículo reducida";
                return;
            }else{
                echo "Error con la BD. Contacte a soporte";
                return;
            }

?>