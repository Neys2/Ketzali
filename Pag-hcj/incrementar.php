<?php 
include './conexion.php';
session_start();
$db = new Conexion();
$con = $db->conectar();
$usuario = $_SESSION['id_usuario'];
$idArticulo = $_POST['id'];

$sql = $con->prepare("UPDATE Carrito SET cantidadArt = cantidadArt + 1 where fkArticulo = ".$idArticulo);
            if($sql->execute()){
                echo "Cantidad del artículo aumentada";
                return;
            }else{
                echo "Error con la BD. Contacte a soporte";
                return;
            }

?>