<?php

$con = mysqli_connect("localhost","root","","her_ocean_spa");
mysqli_select_db($con,"her_ocean_spa");

$query = mysqli_query($con,"SELECT * FROM usuarios where correo = '".$_POST['email']."' and clave = '".$_POST['password']."'");

$data = array();
while($row = mysqli_fetch_assoc($query)){
    $data[] = $row;
}

if($data){
    echo json_encode($data);
    echo "<h1>BIENVENIDO ". $data[0]['nombre']."</h1>";
}else{
    echo "<h1>USUARIO Y CLAVE INCORRECTOS</h1>";
}

// echo $_POST['email']." ".$_POST['password'];
?>

