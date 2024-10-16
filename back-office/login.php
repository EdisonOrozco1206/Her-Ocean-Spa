<?php

$con = mysqli_connect("localhost","root","","her_ocean_spa");
mysqli_select_db($con,"her_ocean_spa");
session_start();

if($_SESSION['user'] != ""){
    header("Location: ../index.php");
}

$query = mysqli_query($con,"SELECT * FROM usuarios where correo = '".$_POST['email']."' and clave = '".$_POST['password']."'");

$data = array();
while($row = mysqli_fetch_assoc($query)){
    $data[] = $row;
}

if($data){
    $_SESSION['user'] = $data[0];
    header("Location: ../index.php");
}else{
    echo "<h1>USUARIO Y CLAVE INCORRECTOS</h1>";
}
?>

