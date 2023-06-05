<?php
include 'conexion.php';
if(isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario']))
{
    session_start();
}

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


<body>
    <!--header inicia -->
    <header class="header">
    <?php include 'navbar.php';?>
    </header>
    <!--header acaba -->


    <div class="welcome">
        <img style="width: 100%; height: 100%;" src="imagen/welcome.jpg" alt="">
        <h1 id="welcome-titulo">¡Bienvenida a tu</h1>
        <h1 id="animado">Glow Up!</h1>
        <p>Hagamos que tu piel brille con el sol</p>
    </div>

    <div class="us" id="us">
    <h2 id="ustitulo">Nuestra filosofía</h2>
    <p id="usp">Nuestra empresa se fundamenta en una filosofía centrada en la excelencia, la orientación al cliente y la innovación.
        Valoramos la responsabilidad social y ambiental, promovemos el trabajo en equipo y el respeto mutuo, y actuamos con integridad y ética en todas nuestras acciones.</p>
    </div>

        <div class="products">
            <h3>Nuestros productos</h3>
         <div class="pimg">
            <div class="pindeximg">
            <img src="imagen/aceites.jpg" alt="">
            <div class="aproduct"><a href="productoscat1.php">Orgánicos</a></div>
            </div>
            <div class="pindeximg">
            <img src="imagen/pexels-karolina-grabowska-4465830.jpg" alt="">
            <div class="aproduct"><a href="productoscat2.php">Aceites hidratantes</a></div>
            </div>
            <div class="pindeximg">
            <img src="imagen/bottle-cream.jpg" alt="">
            <div class="aproduct"><a href="productoscat3.php">Cremas hidratantes</a></div>
            </div>
            <div class="pindeximg">
            <img src="imagen/serum-beige.jpg" alt="">
            <div class="aproduct"><a href="productoscat4.php">Tonificadores</a></div>
            </div>
         </div>
        </div>

        <div class="genero">
            <h4>No importa tu genero</h4>
            <p>Conecta con tu piel y sientete bello y bella</p>
            <img style="width: 100%; height: 100%" src="imagen/beauty_boy.jpg" alt="">
        </div>

</body>

<footer>
    <div class="comunicate">
        <div class="comunicate-box">
            <h5>¿Tienes dudas?</h5>
            <p>¡Comunicate con nosotras !</p>
        </div>
        <form action="https://formsubmit.co/sodic1822@gmail.com" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="mensaje">Mensaje:</label><br>
            <textarea id="mensaje" name="mensaje" rows="5" cols="40" required></textarea><br>

            <input type="submit" value="Enviar">
            <input type="hidden" name="_next" value="http://localhost/Ketzali-main/Pag-hcj/index.php">
            <input type="hidden" name="_captcha" value="false">

        </form>
    </div>
</footer>

</html>