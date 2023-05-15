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
        $sql = $con->prepare("INSERT INTO usuario(nombre,contrasenia,correo)values('$nombre' '$apellido','$contrasenia','$correo')");
        $sql->execute();
        if ($sql == 1) {
            echo '<div class="success">Usuario registrado correctamente</div>';
        } else {
            echo '<div class="alerta">Error al registrar usuario</div>';
        }
        
    }
}

?>