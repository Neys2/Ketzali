<?php

require 'conexion.php';
session_start();
$db = new Conexion();
$con = $db->conectar();

$sql = $con->prepare("SELECT ID_A, nombreA, precio, descripcion FROM articulo where categoria ='Aceites'");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css"> 
    <script src="script.js" defer></script>
</head>
<body>
<!--header inicia -->
<header class="header">
<?php include 'navbar.php';?>
</header>
<!--header acaba -->

<!--Presentacion de productos -->
<div>
<div class="contenedor-product" id="contenedor-p">
<?php foreach ($resultado as $row){ ?>

<?php
$id = $row['ID_A'];
$data = "p-" . $id;
?>
<div class="itemp" data-name="<?php echo $data ?>">
    <?php

    $id = $row['ID_A'];
    $imagen = "imagen/Productos/" . $id . ".png";

    if(!file_exists($imagen)){
        $imagen = "imagen/noimage.jpg";
    }

    ?>
    <figure>
        <img class="imagen-p" src="<?php echo $imagen . '?v=' . time(); ?>" alt="producto 1">
    </figure>
    <div class="informacion">
        <p id="producto-p-<?php echo $row['nombreA'] ?>"><?php echo $row['nombreA'] ?></p>
        <p class="precio"><?php echo "$ " . $row['precio'] ?></p>
        <div class="botonp">
            <button class="botondp">Detalles</button>
            <button onclick="agregarProducto('producto-<?php echo $row['ID_A']?>')">Agregar a carrito</button>
        </div>
    </div>
</div>
<?php } ?>
</div>
</div>


<!--Informacion adicional del producto-->
<div class="products-preview">
<?php foreach ($resultado as $row){ ?>

<?php
$id = $row['ID_A'];
$data = "p-" . $id;
?>
    <div class="preview" data-target="<?php echo $data ?>">
        <i class="fas fa-times"></i>
        <?php

        $id = $row['ID_A'];
        $imagen = "imagen/Productos/" . $id . ".png";

        if(!file_exists($imagen)){
            $imagen = "imagen/noimage.jpg";
        }

        ?>

        <img src="<?php echo $imagen . '?v=' . time(); ?>" alt="">
        <h3 id="producto-<?php echo $row['nombreA'];?>"><?php echo $row['nombreA'] ?></h3>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
        </div>
        <p><?php echo $row['descripcion'] ?></p>
        <div class="precio-preview"><?php echo "$ " . $row['precio'] ?></div>
        <div class="contenedor-add-carr">
            <div class="contenedor-quantity">
                <input
                    type="number"
                    placeholder="1"
                    value="1"
                    min="1"
                    class="input-quantity"
                    id ="producto-<?php echo $row['ID_A']?>-cantidad"
                />
            </div>
            <div class="boton-preview">
                <button class="buy" onclick="agregarProducto('<?php echo $row['ID_A']?>',2)">Agregar a carrito</button>
            </div>
        </div>
    </div>
<?php } ?>
</div>

</body>
</html>