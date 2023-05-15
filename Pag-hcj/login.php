
<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "Piel";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(!$conn)
{
    die("No hay conexión: ".mysqli_connect_error());
};
$nombre = $_POST["correo"];
$pass = $_POST["contrasenia"];

$query = mysqli_query($conn,"SELECT * FROM usuario WHERE correoU = '".$nombre."' and contrasena = '".$pass."'");
$nr = mysqli_num_rows($query);

if($nr > 0){
    
    header("location:perfil.php");
    echo "Bienvenido: ".$nombre;
    $_SESSION['id_usuario'] = $nr['ID_U'];
    
}elseif ($nr == 0){
    echo "Error en los datos";
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Inicia sesion</title>
</head>

<body>
    <header class="header">
        <a href="#" class="logo">
            <img src="imagen/logo.png" alt="">
            <a class=ketzali href="index.php">Ketzali Piel</a>
        </a>

        <nav class="navbar">
            <a href="index.php">inicio</a>
            <a href="#nosotros">nosotros</a>
            <a href="productos.php">productos</a>
            <a href="login.php">login</a>
        </nav>

        <div class="icons">
            <div class="fas fa-search" id="search-btn"></div>
            <div class="fas fa-shopping-cart" id="cart-btn"></div>
            <div class="fas fa-bars" id="menu-btn"></div>
        </div>
    </header>

    <section class="formulario">
        
        <form action="#" method="post">
            <h2 class="formTitle">Iniciar sesion</h2><br>
            <input class="control" type="text" name="correo" id="correo" placeholder="Correo"><br>
            <input class="control" type="password" name="contrasenia" id="contrasenia" placeholder="Contraseña"><br><br>
            <input class="boton" type="submit" value="Iniciar sesion">
        </form>
    </section>
     
    <section class="registro">
        
        <form action="#" method="post">
            <?php
            $dbhost = "localhost";
            $dbuser = "root";
            $dbpass = "";
            $dbname = "Piel";
            
            $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
            if(!$conn)
            {
                die("No hay conexión: ".mysqli_connect_error());
            };
            include ("controlador_registro.php");
            ?>
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