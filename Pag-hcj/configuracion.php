<?php

require 'conexion.php';
$db = new Conexion();
$con = $db->conectar();

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
    
        <!--<link rel="stylesheet" href="style.css"> -->
       
    </head>
    <body>
        <header class="header">
            <a href="#" class="logo">
                <img src="imagen/logo.png" alt="">
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
            <h3>EDITAR INFORMACION</h3>
            <form action="#" method="post">
            <input class="control" type="text" name="nombre" id="nombre" placeholder="Nombre"><br>
            <input class="control" type="text" name="apellido" id="apellido" placeholder="Apellido"><br>
            <input class="control" type="text" name="usuarioR" id="usuarioR" placeholder="Correo"><br>
            <input class="control" type="password" name="contraseniaR" id="contraseniaR" placeholder="Contraseña"><br><br>
            <input class="boton" type="submit" value="Cambiar datos">
        </form>
        </div>
    </body>

</HTML:5>