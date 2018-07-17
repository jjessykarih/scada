<?php
//se establece una conexion a la base de datos
include 'conexion.php';
//si se han enviado datos
if (isset($_POST['nombre']) and isset($_POST['nombre'])){
    $usuario=mysqli_real_escape_string($conexion,$_POST['nombre']);
    $ciu=mysqli_real_escape_string($conexion,$_POST['ciudad']);
    $tele=mysqli_real_escape_string($conexion,$_POST['telefono']);
    $mail=mysqli_real_escape_string($conexion,$_POST['email']);
    $contraseña=password_hash($_POST['pwd'],PASSWORD_DEFAULT);
    $contraseña1=password_hash($_POST['pwd1'],PASSWORD_DEFAULT);
    $ingresar=mysqli_query($conexion,'insert into users(nombre,ciudad,telefono,email,pwd,pwd1) values
    ("'.$usuario.'","'.$ciu.'","'.$tele.'","'.$mail.'","'.$contraseña.'","'.$contraseña1.'")') or die ('<p>Error al registrar</p><br>'.mysqli_error($conexion));
    //redirección
    header ('location: ./');
}//si no se enviaron datos
else{
    header ('location: ./');
}
?>