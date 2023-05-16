<?php
require 'conexion.php';
if(!empty($_POST["registro"])){
    if(empty($_POST["nombre"]) or empty($_POST["apellido"]) or empty($_POST["usuarioR"]) or empty($_POST["contraseniaR"]))
    {
        echo '<div class="alerta">Uno de los campos está vacío</div>';

    }else{
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $correo = $_POST["usuarioR"];
        $contrasenia = $_POST["contraseniaR"];
        $db = new Conexion();
        $con = $db->conectar();
        $sql = $con->prepare("INSERT INTO usuario(ID_U,nombreU,contrasena,correoU,telefono,numTarjeta,domicilio)values('25','$nombre $apellido','$contrasenia','$correo','null','null','null')");
        $band = $sql->execute();
        var_dump($sql);
        if ( $band == 1) {
            session_start();
            header("Location:Usuario/perfil.php");
            echo '<div class="success">Usuario registrado correctamente</div>';
            
        } else {
            echo '<div class="alerta">Error al registrar usuario</div>';
        }
        
    }
}

?>