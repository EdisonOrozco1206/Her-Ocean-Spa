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

<?php include('../layouts/header.php') ?>
<link rel="stylesheet" href="<?= SCRIPT_ROOT ?>back-office/styles-bo.css">
<div class="container_bo">
    <form action="./login.php" method="post">
        <h1>Inicia sesión</h1>
        <label for="email">Correo electrónico:</label>
        <input type="email" name="email" id="email" autocomplete="off" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <div>
            <input type="submit" value="Iniciar sesión">
            <a class="btn" href="./registro.php">Registrese</a>
        </div>
    </form>
</div>
<?php include('../layouts/footer.php') ?>

