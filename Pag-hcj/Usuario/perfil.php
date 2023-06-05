<?php

include '../conexion.php';
session_start();
$db = new Conexion();
$con = $db->conectar();
$id = $_SESSION['id_usuario'];

$sql = $con->prepare("SELECT * FROM usuario WHERE ID_U = '" . $id . "'");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

if (isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario'])) {
    $iduser = $_SESSION['id_usuario'];
} else {
    header("Location:../login.php");
}

$name = $resultado[0]['nombreU'];
$tel = $resultado[0]['telefono'];
$email = $resultado[0]['correoU'];
$pago = $resultado[0]['tarjeta'];
$dom = $resultado[0]['domicilio'];


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
            <?php include 'navbar.php'; ?>
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
                echo "<div class='pSection'>
                <h1>HOLA, $name</h1>
                </div>";
            ?>

            <div class="pSection">
                <h3>DATOS PERSONALES</h3>
                <?php
                echo '<p>Nombre:' . $name . '</p>
                <p>Telefono:' . $tel . '</p>
                <p>Correo:' . $email . '</p>'
                ?>
                <hr>
            </div>
            <div class="pSection">
                <h3>DOMICILIOS</h3>
                <?php
                echo '<div class="minSection";>
                <p>' . $dom . '<\p></div>';
                ?>
                <hr>
            </div>
            <div class="pSection">
                <h3>INFORMACION DE PAGO</h3>
                <?php
                echo '<div class = "minSection";> 
                <p>Tarjeta: ' . $pago . ' <\p><br>
                </div>';
                ?>
                <hr>
            </div>
            <a class="salir" href="salir.php">Cerrar Sesion</a>
        </div>
    </body>

</HTML:5>