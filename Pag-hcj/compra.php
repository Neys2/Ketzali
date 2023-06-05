<?php
require 'conexion.php';
session_start();
$db = new Conexion();
$con = $db->conectar();
$totalCompra = $_SESSION['total'];
$direccion = $_SESSION['dom'];
$pago = $_SESSION['pago'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Realizar Compra</title>
</head>

<body>
    <header class="header">
        <?php include 'navbar.php'; ?>
    </header>

    <h2 class="h2Compra">Finalizando compra</h2>
    <div class="infoCompra">
        <p>TOTAL PEDIDO</p>
        <?php
        echo "<p>$totalCompra</p>";
        ?>
        <p>Costo de envío</p>
        <?php
        if ($totalCompra >= 1000) {
            echo "<p>¡Gratis! :D</p>";
        } else {
            $totalCompra += 90;
            echo "<p>$90</p>";
        }
        ?>
        <br>
        <p>Dirección de entrega</p>
        <?php
        echo "<p>$direccion</p><br>
        <a href='Usuario/perfil.php' class='boton2'>Cambiar direccion</a><br>";
        ?>
        <br>
        <p>Información de pago</p><br>
        <p>Numero de tarjeta:</p>
        <?php
        echo "<p>$pago</p><br>
        <a href='Usuario/perfil.php' class='boton2'>Cambiar tarjeta</a><br>";
        ?>


    </div>
    <div>
    <?php
        echo "
        <button class ='boton2' onclick=hacerPago($totalCompra)>Pagar</button><br>";
        ?>
    </div>

    <script>
        
        function hacerPago(costo) {
            alert(costo);
            const form = new FormData();
            form.append("total", costo);
            fetch('../pagar.php', {
                    method: "POST",
                    body: form
                }).then((response) => response.text())
                .then((text) => {
                    alert("Pago realizado");
                });
            }
    </script>



</body>

</html>