<?php

include '../conexion.php';
session_start();
$db = new Conexion();
$con = $db->conectar();

$usuario = $_SESSION['id_usuario'];
$sql = $con->prepare("SELECT * FROM Carrito WHERE fkUsuario = $usuario AND fkVenta IS NULL");
if ($sql->execute()) {
    $productosCarrito = $sql->fetchAll(PDO::FETCH_ASSOC);
} else {
    echo "Error con BD. Consulta a soporte";
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

        <!--<link rel="stylesheet" href="style.css"> -->

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
            <h3>Carrito de compras</h3>
            <?php
            $i = 0;
            if (isset($productosCarrito) && $productosCarrito != []) {
                $total = 0;
                $listaCarrito = "<div >";
                $listaCarrito .= "<table id='carritoTable' class='carrito'><thead><tr>";
                $listaCarrito .= "<th></th>";
                $listaCarrito .= "<th>Descripción</th>";
                $listaCarrito .= "<th>Precio</th>";
                $listaCarrito .= "<th>Cantidad</th>";
                $listaCarrito .= "<th>Subtotal</th>";
                $listaCarrito .= "<th></th>";
                $listaCarrito .= "</tr></thead><tbody>";
                foreach ($productosCarrito as $producto) {
                    $idArticulo = $producto['fkArticulo'];
                    $cantidad = $producto['cantidadArt'];
                    $sql = $con->prepare("SELECT * FROM articulo WHERE ID_A = " . $idArticulo);
                    if ($sql->execute()) {
                        $articulo = $sql->fetchAll(PDO::FETCH_ASSOC);
                    } else {
                        echo "Error con BD. Consulta a soporte";
                        return;
                    }
                    $imagen = "../imagen/Productos/" . $articulo[0]['ID_A'] . ".png";
                    // echo '<pre>';
                    // var_dump( $imagen);
                    // echo '</pre>';
                    // die();
                    if (!file_exists($imagen)) {
                        $imagen = "imagen/noimage.jpg";
                    }
                    $sql = $con->prepare("SELECT * FROM Carrito WHERE fkArticulo = $idArticulo  AND fkUsuario = $usuario AND fkVenta IS NULL");
                    if ($sql->execute()) {
                        $carrito2 = $sql->fetchAll(PDO::FETCH_ASSOC);
                        $subtotal = $articulo[0]['precio'] * $carrito2[0]['cantidadArt'];
                    }
                    $stock =  $articulo[0]['cantidad'];
                    $botonesCantidad = "<button onclick = decrementar($idArticulo)> - </button>";
                    $botonesCantidad .= "<span id='$idArticulo-cantidad'>$cantidad</span>";
                    $botonesCantidad .= "<button onclick = incrementar($idArticulo,$stock)> + </button>";
                    $listaCarrito .= "<tr id='$idArticulo-fila'>";
                    $listaCarrito .= "<td><img style='max-width:170px' src='" . $imagen . "'/></td>";
                    $listaCarrito .= "<td>" . $articulo[0]['descripcion'] . "</td>";
                    $listaCarrito .= "<td>" . $articulo[0]['precio'] . "</td>";
                    $listaCarrito .= "<td>" . $botonesCantidad . "</td>";
                    $total = $total + $subtotal;
                    $listaCarrito .= "<td><span id='subtotal'>$subtotal</span></td>";
                    $listaCarrito .= "<td>" . "<i onclick = eliminar($idArticulo) class='fa-solid fa-trash-can'></i>" . "</td>";
                    $listaCarrito .= "</tr>";
                }
                $listaCarrito .= "<tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Total:</td>
                <td>$total</td></tr>";
                $listaCarrito .= '</tbody></table></div>';
                $_SESSION['total'] = $total;
                echo $listaCarrito;
                echo '<a href ="../compra.php";><button  class="boton";>Continuar a la compra</button></a>';
            } else {
                echo "<h3> Aún no has agregado productos a tu carrito :( </h3>";
            }
            ?>
        </div>
        <script>
            function decrementar(productId) {
                var quantityElement = document.getElementById(productId + "-cantidad");
                var quantity = parseInt(quantityElement.textContent);
                if (quantity > 1) {
                    const form = new FormData();
                    form.append("id", productId);
                    fetch('../decrementar.php', {
                            method: "POST",
                            body: form
                        }).then((response) => response.text())
                        .then((text) => {
                            quantityElement.textContent = (quantity - 1).toString();
                            location. reload()
                        });
                }
            }

            function incrementar(productId, maxQuantity) {
                var quantityElement = document.getElementById(productId + "-cantidad");
                var quantity = parseInt(quantityElement.textContent);

                if (quantity < maxQuantity) {
                    const form = new FormData();
                    form.append("id", productId);
                    fetch('../incrementar.php', {
                            method: "POST",
                            body: form
                        }).then((response) => response.text())
                        .then((text) => {
                            quantityElement.textContent = (quantity + 1).toString();
                            location. reload()
                        });
                } else {
                    alert("El producto se ha agotado");
                }
            }

            function eliminar(productId) {
                const idToMatch = productId + "-fila";
                console.log(idToMatch)
                const productRow = document.getElementById(idToMatch);
                const form = new FormData();
                form.append("id", productId);
                fetch('../eliminarProducto.php', {
                        method: "POST",
                        body: form
                    }).then((response) => response.text())
                    .then((text) => {
                        productRow.remove()
                        location. reload()
                    });
            }
        </script>
    </body>

</HTML:5>