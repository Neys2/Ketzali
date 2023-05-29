<?php 
require 'conexion.php';
session_start();

$arrayCarrito = $_SESSION['carrito'];

foreach($arrayCarrito as $carrito)
{
    if($carrito['ID_A'] == "hola"){

    }
}
unset($arrayCarrito['ID_U']);

?>