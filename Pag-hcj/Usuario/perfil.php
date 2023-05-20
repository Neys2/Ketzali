<?php

include '../conexion.php';
session_start();

if (isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario'])) {
    $iduser = $_SESSION['id_usuario'];
}

if (isset($_SESSION['correo']) && !empty($_SESSION['correo'])) {
    $email = $_SESSION['correo'];
}
if (isset($_SESSION['telefono']) && !empty($_SESSION['telefono'])) {
    $tel = $_SESSION['telefono'];
}
if (isset($_SESSION['dom']) && !empty($_SESSION['dom'])) {
    $dom = $_SESSION['dom'];
}
if (isset($_SESSION['pago']) && !empty($_SESSION['pago'])) {
    $pago = $_SESSION['pago'];
}



?>
<!DOCTYPE html>
<HTMl:5>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>tienda en linea de cuidado de piel</title>
        <link rel="stylesheet" href="..\style.css">
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
            <a href="../index.php" class="logo">
                <img src="../imagen/logo.png" alt="" href="../index.php">
                <a class=ketzali href="index.php">Ketzali Piel</a>
            </a>

            <nav class="navbar">
                <a href="../index.php">inicio</a>
                <a href="../productos.php">productos</a>
            </nav>

            <div class="icons">
                <div class="fas fa-search" id="search-btn"></div>
                <div class="fas fa-shopping-cart" id="cart-btn"></div>
                <div class="fas fa-bars" id="menu-btn"></div>
                <div class = "fas fa-circle-user" href = "perfil.php"></div>
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
            <?php
            if (isset($_SESSION['name']) && !empty($_SESSION['name'])) {
                $name = $_SESSION['name'];
                echo "<div class='pSection'>
                <h1>HOLA, $name</h1>
                </div>";
            }
            ?>

            <div class="pSection">
                <h3>DATOS PERSONALES</h3>
                <?php
                echo "<p>Nombre(s): $name</p>
                <p>Apellidos:</p>
                <p>Telefono:$tel</p>
                <p>Correo:$email</p>";
                ?>
                <hr>
            </div>
            <div class="pSection">
                <h3>DOMICILIOS</h3>
                <?php
                echo "<p>$dom<\p>";
                ?>
                <hr>
            </div>
            <div class="pSection">
                <h3>INFORMACION DE PAGO</h3>
                <?php
                echo "<p>Tarjeta: $pago <\p>";
                ?>
                <hr>
            </div>
            <a class="salir" href="salir.php">Cerrar Sesion</a>
        </div>
    </body>

</HTML:5>