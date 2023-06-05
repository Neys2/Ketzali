<?php
require 'conexion.php';
if(!empty($_POST["registro"])){
    if(empty($_POST["nombre"]) or empty($_POST["apellido"]) or empty($_POST["usuarioR"]) 
        or empty($_POST["contraseniaR"]))
    {
        echo '<div class="alerta">Uno de los campos está vacío</div>';

    }else{
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $correo = $_POST["usuarioR"];
        $contrasenia = $_POST["contraseniaR"];
        $db = new Conexion();
        $con = $db->conectar();
        $sql = $con->prepare("INSERT INTO usuario(nombreU,contrasena,correoU,telefono,numTarjeta,domicilio)
                values('$nombre $apellido','$contrasenia','$correo','null','null','null')");
        $band = $sql->execute();
        //var_dump($sql);
        if ( $band == 1) {
            session_start();
            echo '<div class="success">Usuario registrado correctamente</div>';
            $sql = $con->prepare("SELECT * FROM usuario WHERE correoU = '".$correo."' and contrasena = '".$contrasenia."'");
            $sql->execute();
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
            header("Location:Usuario/perfil.php");
            $_SESSION['id_usuario'] = $resultado[0]['ID_U'];
            $_SESSION['name'] = $resultado[0]['nombreU'];
            $_SESSION['correo'] = $resultado[0]['correoU'];
            $_SESSION['telefono'] = $resultado[0]['telefono'];
            $_SESSION['dom'] = $resultado[0]['domicilio'];
            $_SESSION['pago'] = $resultado[0]['numTarjeta'];
            $_SESSION['carrito'] = [];
            
        } else {
            echo '<div class="alerta">Error al registrar usuario</div>';
        }
        
    }
}
