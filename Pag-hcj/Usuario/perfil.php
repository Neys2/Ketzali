<?php

include '../conexion.php';
session_start();

if (isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario'])) {
    $iduser = $_SESSION['id_usuario'];
}else{
    header("Location:../login.php");
}

if (isset($_SESSION['correo']) && !empty($_SESSION['correo'])) {
    $email = $_SESSION['correo'];
}
if (isset($_SESSION['telefono']) && !empty($_SESSION['telefono'])) {
    $tel = $_SESSION['telefono'];
}else{
    $_SESSION['telefono'] = "Sin agregar";
    $tel = "Sin agregar";
}
if (isset($_SESSION['dom']) && !empty($_SESSION['dom'])) {
    $dom = $_SESSION['dom'];
}else{
    $_SESSION['dom'] = "Sin agregar";
    $dom = "Sin agregar";
}
if (isset($_SESSION['pago']) && !empty($_SESSION['pago'])) {
    $pago = $_SESSION['pago'];
}else{
    $_SESSION['pago'] = "Sin agregar";
    $pago = "Sin agregar";
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
        <?php include 'navbar.php';?>
        </header>

        <div class="barraDeUsuario">
            <nav class="navbar">
                <a href="perfil.php">Perfil</a>
                <a href="carrito.php">Carrito</a>
                <a href="compras.php">Compras</a>
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
                echo '<p>Nombre:'.$name.'</p>
                <p>Telefono:'.$tel.'</p>
                <p>Correo:'.$email.'</p>
                <button type = submit; class ="boton"; >Agregar telefono</button>';
                ?>
                <hr>
            </div>
            <div class="pSection">
                <h3>DOMICILIOS</h3>
                <?php
                echo '<div class="minSection";>
                <p>'.$dom.'<\p>
                <button type = submit; class ="boton"; >Agregar domicilio</button>
                <br></div>';
                ?>
                <hr>
            </div>
            <div class="pSection">
                <h3>INFORMACION DE PAGO</h3>
                <?php
                echo '<div class = "minSection";> 
                <p>Tarjeta: '.$pago.' <\p>
                <button type = submit; class ="boton"; >Agregar tarjeta</button>
                <br>
                </div>';
                ?>
                <hr>
            </div>
            <a class="salir" href="salir.php">Cerrar Sesion</a>
        </div>
    </body>

</HTML:5>