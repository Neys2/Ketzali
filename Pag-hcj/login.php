

<!--
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "Piel";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(!$conn)
{
    die("No hay conexión: ".mysqli_connect_error());
};
 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <title>Inicia sesion</title>
</head>

<body>
    <header class="header">
    <?php include 'navbar.php';?>
    </header>

    <?php
    if(isset($_SESSION['error']))
    {
        echo '<script>mostrarPopup("Error en los datos");</script>';
        $_SESSION['error'] = false;
        session_unset();
        session_destroy(); // Reiniciar el valor de $_SESSION['error']
    }
    ?>
    <section class="formulario">
        
        <form action="loguear.php" method="post">
            <h2 class="formTitle">Iniciar sesion</h2><br>
            <input class="control" type="text" name="correo" id="correo" placeholder="Correo"><br>
            <input class="control" type="password" name="contrasenia" id="contrasenia" placeholder="Contraseña"><br><br>
            <input class="boton" type="submit" value="Iniciar sesion">
        </form>
        
    </section>
     
    <section class="registro">
        
        <form action="registro.php" method="post">
            <h2 class="formTitle">Registrate</h2><br>
            <input class="control" type="text" name="nombre" id="nombre" placeholder="Nombre"><br>
            <input class="control" type="text" name="apellido" id="apellido" placeholder="Apellido"><br>
            <input class="control" type="text" name="usuarioR" id="usuarioR" placeholder="Correo"><br>
            <input class="control" type="password" name="contraseniaR" id="contraseniaR" placeholder="Contraseña"><br><br>
            <input class="boton" type="submit" value="Registrarse" name="registro">
        </form>
    </section> 
    

</body>

</html>