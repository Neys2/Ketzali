<?php

include '../conexion.php';
session_start();
$db = new Conexion();
$con = $db->conectar();
$productosCarrito = $_SESSION['carrito'];

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

        <!--<link rel="stylesheet" href="style.css"> -->

    </head>

    <body>
        <header class="header">
            <a href="../index.php" class="logo">
                <img src="imagen/logo.png" alt="">
                <a class=ketzali href="../index.php">Ketzali Piel</a>
            </a>

            <nav class="navbar">
                <a href="../index.php">inicio</a>
                <a href="#nosotros">nosotros</a>
                <a href="../productos.php">productos</a>
            </nav>

            <div class="icons">
                <div class="fas fa-search" id="search-btn"></div>
                <div class="fas fa-shopping-cart" id="cart-btn" href="carrito.php"></div>
                <div class="fas fa-bars" id="menu-btn"></div>
                <div class="fas fa-circle-user" href="perfil.php"></div>
            </div>
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
            <h3>Carrito de compras</h3>
            <?php
            $i = 0;
            if (isset($productosCarrito) && $productosCarrito != []) {
                $listaCarrito = "<div style='display:grid;justify-content:center';>";
                var_dump($productosCarrito);
                foreach ($productosCarrito as $producto) {
                    $id = $producto['ID_A'];

                    $imagen = "../imagen/Productos/" . $producto['ID_A'] . ".png";
                    if (!file_exists($imagen)) {
                        $imagen = "imagen/noimage.jpg";
                    }

                    $sql = $con->prepare("SELECT nombreA, cantidad, precio FROM articulo WHERE ID_A = " . $id);
                    $sql->execute();
                    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
                    $quantity =  $resultado['cantidad'];
                    $listaCarrito .= '<div id="'.$i.'"; style="display:flex;margin-bottom:10px;">';
                    $listaCarrito .= '<img style="height: 150px;" src=' . $imagen . '>';
                    $listaCarrito .= '<p style = "margin-top: 12%;">' . $resultado['nombreA'] . '</p>';
                    $listaCarrito .= '<p style = "margin-top: 12%;">' . $resultado['precio'] . '</p>';
                    $listaCarrito .= '<button  class="quantity" onclick="decreaseQuantity(' . $i . ')">-</button>
                        <span style = "margin-top: 15%; margin-left: 5px;  margin-rigth: 5px;" id="quantity-' . $i . '">1</span>
                        <button class="quantity" onclick="increaseQuantity(' . $i . ',' . $quantity . ')">+</button>.</p>';
                    $listaCarrito .= '<div class="fa-light fa-trash-can" onclick="deleteItem(' . $id . ')"></div>';
                    $listaCarrito .= "</div>";
                    $i++;
                }
                $listaCarrito .= '</div>';
                echo $listaCarrito;
            } else {
                echo "<h3> Aún no has agregado productos a tu carrito :( </h3>";
            }
            ?>
            <script>
                function decreaseQuantity(productId) {
                    var quantityElement = document.getElementById("quantity-" + productId);
                    var quantity = parseInt(quantityElement.innerText);
                    if (quantity > 1) {
                        quantityElement.innerText = (quantity - 1).toString();
                    }
                }

                function increaseQuantity(productId, maxQuantity) {
                    var quantityElement = document.getElementById("quantity-" + productId);
                    var quantity = parseInt(quantityElement.innerText);

                    if (quantity < maxQuantity) {
                        quantityElement.innerText = (quantity + 1).toString();
                    } else {
                        alert("El producto se ha agotado");
                    }
                }

                function deletItem(productId) {
                    var productElement = document.getElementById("product-" + productId);
                    productElement.remove();
                }
            </script>
        </div>
    </body>

</HTML:5>