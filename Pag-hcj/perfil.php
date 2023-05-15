<?php

include("conexion.php");
$db = new Conexion();
$con = $db->conectar();


$sql = $con->prepare("SELECT ID_A, nombreA, precio, descripcion FROM articulo ");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<HTMl:5>
    <head> 
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>tienda en linea de cuidado de piel</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,300&display=swap" rel="stylesheet">
    
<!--
            <link rel="stylesheet" href="style.css"> 
        session_start();
if(isset($SESSION['id_usuario'])){
    header("Location: index.php");
}else{
    header("Location:login.php");
}
$iduser = $_SESSION['id_usuario'];
    
-->
       
    </head>
    <body>
        <header class="header">
            <a href="#" class="logo">
                <img src="imagen/logo.png" alt="" href="index.php">
                <a class= ketzali href="index.php">Ketzali Piel</a>
            </a>
        
            <nav class="navbar">
                <a href="index.php">inicio</a>
                <a href="#nosotros">nosotros</a>
                <a href="productos.php">productos</a>
                <a href="perfil.php">perfil</a>
            </nav>
        
            <div class="icons">
                <div class="fas fa-search" id="search-btn"></div>
                <div class="fas fa-shopping-cart" id="cart-btn"></div>
                <div class="fas fa-bars" id="menu-btn"></div>
            </div>
        </header>

        <div class="barraDeUsuario">
            <nav class="navbar">
                <a href="perfil.php">Perfil</a>
                <a href="carrito.php">Carrito</a>
                <a href="compras.php">Compras</a>
                <a href="listaDeseos.php">Lista de deseos</a>
                <a href="configuracion.php">Configuracion</a>
            </nav>

        </div>
        <div class="dataArea">
            <div class="pSection">
                <h3>DATOS PERSONALES</h3>
                <p>Nombre(s):</p>
                <p>Apellidos:</p>
                <p>Telefono:</p>
                <p>Correo:</p>
                <hr>
            </div>
            <div class="pSection">
                <h3>DOMICILIOS</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia ipsum</p>
                <hr>
            </div>
            <div class="pSection">
                <h3>INFORMACION DE PAGO</h3>
                <p>Tarjeta: :D</p>
                <hr>
            </div>
        </div>
    </body>

</HTML:5>