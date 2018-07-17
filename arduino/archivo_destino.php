<?php
//se lee la cookie de sesion
session_start();
//se establece una conexión a la base de datos
include 'conexion.php';
//se validarán los campos si la sesion aún no está abierta
if (empty($_SESSION) and isset($_POST['email'])){
    //se escaparán caracteres peligrosos
    $nombre_de_usuario=mysqli_real_escape_string($conexion,$_POST['email']);
    $contraseña_introducida=$_POST['pwd'];
    //se hará la consulta a la base de datos
    $consulta='select * from users where email="'.$mail.'"';
    //si hubo un resultado
    if ($ejecución_de_la_consulta=$conexion->query($consulta)){
        //se obtiene la contraseña registrada
        $contraseña_guardada=$ejecución_de_la_consulta->fetch_assoc();
        //se compara la contraseña
        $verificar_contraseña=password_verify($contraseña_introducida,$contraseña_guardada['pwd']);
        //si el resultado de la comparación ha sido verdadero
        if ($verificar_contraseña){
            //se asigna la sesión y redirecciona
            $_SESSION['name']=$nombre_de_usuario;
            header ('location: web.php');
        }//si la contraseña es incorrecta
        else{
            header ('location: ./');
        }
    }//si el usuario no está registrado
    else{
        header ('location: ./');
    }
}//si hay una sesion abierta o no se enviaron datos
else{
    header ('location: ./');
}
?>