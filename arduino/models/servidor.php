<?php
    require("base.php");
    $valor = mysqli_real_escape_string($con, $_GET['fecha']);
    $valor1 = mysqli_real_escape_string($con, $_GET['t1']);
    $valor2 = mysqli_real_escape_string($con, $_GET['t2']);
    $valor3 = mysqli_real_escape_string($con, $_GET['ilumi']);
    // fecha reloj arduino
    $valor4 = mysqli_real_escape_string($con, $_GET['dia']);
    $valor5 = mysqli_real_escape_string($con, $_GET['mes']);
    $valor6 = mysqli_real_escape_string($con, $_GET['anio']);
    $valor7 = mysqli_real_escape_string($con, $_GET['ph']);
    $valor8 = mysqli_real_escape_string($con, $_GET['oda']);
    
    $query = "INSERT INTO sensors(fecha,t1,t2,ilumi,dia,mes,anio,ph,oda) VALUES ('".$valor."','".$valor1."','".$valor2."','".$valor3."','".$valor4."','".$valor5."','".$valor6."','".$valor7."','".$valor8."');";
    // Ejecutamos la instrucción
    mysqli_query($con, $query);
    mysqli_close($con);
?>