<?php
$mensaje_error = "";
if (isset($_POST) && !empty($_POST)) {

    include('../database/bd.php');
 
    $query = mysqli_query($connect, "SELECT * FROM usuarios where correo = '" . $_POST['email'] . "' and clave = '" . $_POST['password'] . "'");

    $data = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $data[] = $row;
    }

    if ($data) {
        if ($data[0]['perfil'] == "0") {
            header("location: ../back-office/admin/index.php");
        } else {
            header("location: ../back-office/client/index.php");
        }
    } else {
        $mensaje_error = "<span style='color:red;'>USUARIO Y CLAVE INCORRECTOS</span>";
    }
}

// echo $_POST['email']." ".$_POST['password'];
?>

<?php include('../layouts/header.php') ?>
<link rel="stylesheet" href="<?= SCRIPT_ROOT ?>back-office/styles-bo.css">
<div class="container_bo">
    <form action="" method="post">
        <h1>Inicia sesión</h1>
        <label for="email">Correo electrónico:</label>
        <input type="text" name="email" id="email" autocomplete="off" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <?= $mensaje_error?>
        <div>
            <a class="btn" href="./registro.php">Registrese</a>
            <input type="submit" value="Iniciar sesión">
        </div>
    </form>
</div>
<?php include('../layouts/footer.php') ?>