<?php

include 'conexion.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tienda en linea de cuidado de piel</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">

</head>

<!-- 
session_start();
if(!isset($SESSION['id_usuario'])){
    header("Location: index.php");
};
?>

-->


<body>
    <!--header inicia -->
    <header class="header">
        <a href="#" class="logo">
            <img src="imagen/logo.png" alt="">
            <a class=ketzali href="index.php">Ketzali Piel</a>
        </a>

        <nav class="navbar">
            <a href="index.php">inicio</a>
            <a href="productos.php">productos</a>
            <?php
            if(!isset($_SESSION['id_usuario']) || empty($_SESSION['id_usuario'])){
                echo "<a href='login.php'>login</a>";
            }else {
                // La sesión está iniciada, no muestra nada de login
            }
            ?>
        </nav>

        <div class="icons">
            <div class="fas fa-search" id="search-btn"></div>
            <div class="fas fa-shopping-cart" id="cart-btn"></div>
            <div class="fas fa-bars" id="menu-btn"></div>
            <?php
            if(!isset($_SESSION['id_usuario']) || empty($_SESSION['id_usuario'])){
                echo "<div class = 'fas fa-circle-user' ></div>";
            }else {
                // La sesión está iniciada, muestra info de perfil
                echo "<a href='Usuario/perfil.php'>";
                echo "<div class = 'fas fa-circle-user'></div>";
                echo "</a>";
            }
            ?>
        </div>
    </header>
    <!--header acaba -->
    <div class="welcome">
        <img style="width: max-content; height: 850px;" src="imagen/welcome.jpg" alt="">
        <h1 id="welcome-titulo">¡Bienvenida a tu</h1>
        <h1 id="animado">Glow Up!</h1>
        <p>Hagamos que tu piel brille con el sol</p>
    </div>

    <div class="us">
    <h2 id="ustitulo">Nuestra filosofía</h2>
    <p id="usp">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Est, a possimus officiis ducimus et ut enim dolore!
        Dolore, doloribus nam, molestias modi similique ipsa excepturi id blanditiis perferendis eveniet quia?</p>
    </div>

        <div class="products">
            <h3>Nuestros productos</h3>
         <div class="pimg">
            <div class="pindeximg">
            <img src="imagen/aceites.jpg" alt="">
            <div class="aproduct"><a href="">Orgánicos</a></div>
            </div>
            <div class="pindeximg">
            <img src="imagen/pexels-karolina-grabowska-4465830.jpg" alt="">
            <div class="aproduct"><a href="">Aceites hidratantes</a></div>
            </div>
            <div class="pindeximg">
            <img src="imagen/bottle-cream.jpg" alt="">
            <div class="aproduct"><a href="">Cremas hidratantes</a></div>
            </div>
            <div class="pindeximg">
            <img src="imagen/serum-beige.jpg" alt="">
            <div class="aproduct"><a href="">Tonificadores</a></div>
            </div>
         </div>
        </div>

        <div class="genero">
            <h4>No importa tu genero</h4>
            <p>Conecta con tu piel y sientete bello y bella</p>
            <img style="width: max-content; height: 850px;" src="imagen/beauty_boy.jpg" alt="">
        </div>

</body>

<footer>
    <div class="comunicate">
        <div class="comunicate-box">
            <h5>¿Tienes dudas?</h5>
            <p>¡Comunicate con nosotras !</p>
        </div>
        <form action="/submit-form" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="mensaje">Mensaje:</label><br>
            <textarea id="mensaje" name="mensaje" rows="5" cols="40" required></textarea><br>

            <input type="submit" value="Enviar">
        </form>
    </div>
</footer>

</html>