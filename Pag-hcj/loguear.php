
<?php
require 'conexion.php';
$db = new Conexion();
$con = $db->conectar();

session_start();

$nombre = $_POST["correo"];
$pass = $_POST["contrasenia"];

$sql = $con->prepare("SELECT * FROM usuario WHERE correoU = '".$nombre."' and contrasena = '".$pass."'");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($resultado[0]['ID_U']);
        if(sizeof($resultado) > 0 && $nombre=="admin18@gmail.com"){
            header("location:Admin\admin.php");
            echo "Bienvenido: ".$nombre;
            
        }else if(sizeof($resultado) > 0 ){
            $_SESSION['id_usuario'] = $resultado[0]['ID_U'];
            $_SESSION['name'] = $resultado[0]['nombreU'];
            $_SESSION['correo'] = $resultado[0]['correoU'];
            $_SESSION['telefono'] = $resultado[0]['telefono'];
            $_SESSION['dom'] = $resultado[0]['domicilio'];
            $_SESSION['pago'] = $resultado[0]['numTarjeta'];
            $_SESSION['carrito'] = [];
            //var_dump($_SESSION);
            header("location:Usuario/perfil.php");
            echo "Bienvenido: ".$nombre;
            
        }elseif (sizeof($resultado) == 0){
            $_SESSION['error'] = "true";
            header("location:login.php");
            //echo "Error en los datos";
        };

?>