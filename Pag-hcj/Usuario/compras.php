<?php

include '../conexion.php';
session_start();

$db = new Conexion();
$con = $db->conectar();

$ideuser = $_SESSION['id_usuario'];

$sql = $con->prepare("SELECT * FROM venta WHERE fkID_U = '" . $ideuser . "'");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);


/*
foreach($resultado as $compras){
        array_push($compras['compras'], 
        [
        'ID_V' => $compras[0]['ID_V'],
        'fecha' => $compras[0]['fecha'],
        'total' => $compras[0]['total'],
        'tipoPago' => $compras[0]['tipoPago']
        ]
    );
    
    }
*/

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
            $listaCompras = " ";
            if (isset($resultado) && $resultado != []) {
                echo '<table class="tabla">
                    <tr class="cabecera">
                        <td>Folio</td>
                        <td>Fecha</td>
                        <td>Total</td>
                        <td>Tipo de pago</td>
                    </tr>';
                foreach ($resultado as $compras) {
                    $listaCompras .= '<tr>';
                    $listaCompras .= '<td>' . $compras['ID_V'] . '</td>';
                    $listaCompras .= '<td>' . $compras['fecha'] . '</td>';
                    $listaCompras .= '<td>' . $compras['total'] . '</td>';
                    $listaCompras .= '<td>' . $compras['tipoPago'] . '</td>';
                }
                $listaCompras .= "</tr>";
                echo $listaCompras;
                echo '</table>';
            }else{
                echo '<h3>Aún no ha realizado compras</h3>';
            }

            ?>
        </div>
    </body>

</HTML:5>