<?php
require 'conexion.php';
session_start();
$db = new Conexion();
$con = $db->conectar();
$fecha = date("Y/m/d");
$tarjeta = $_SESSION['pago'];
$userid = $_SESSION['id_usuario'];
$total = $_POST['total'];
// Extraer los primeros 4 dígitos de la tarjeta
$primerosDigitos = substr($tarjeta, 0, 4);

// Comparar con los valores deseados
if ($primerosDigitos === "4000" || $primerosDigitos === "5354" || $primerosDigitos === "8860") {
    $tipoPago = "Tarjeta de credito";
} else {
    $tipoPago = "Tarjeta de débito";
}
    //Insert into Venta values(1,11,178.99,'2023-02-21','Tarjeta de credito');
$sql = $con->prepare("INSERT INTO Venta  values($userid,$total,$fecha,$tipoPago)");
            if($sql->execute()){
                echo "Compra realizada";
                return;
            }else{
                echo "Error con la BD. Contacte a soporte";
                return;
            }
?>