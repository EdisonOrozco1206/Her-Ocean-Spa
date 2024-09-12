<?php

$mensajeRegistro = "";

if (isset($_POST['registro'])) {

    if (isset($_POST['password']) && isset($_POST['cpassword'])) {
        if ($_POST['password'] == $_POST['cpassword']) {
            $con = mysqli_connect("localhost", "root", "", "her_ocean_spa");
            mysqli_select_db($con, "her_ocean_spa");

            $query = mysqli_query(
                $con,
                "INSERT INTO usuarios (id,nombre,apellido,correo,clave,perfil) VALUES (0,'" . $_POST['name'] . "','" . $_POST['lastname'] . "','" . $_POST['email'] . "','" . $_POST['password'] . "',1)"
            );

            if ($query) {
                $mensajeRegistro = "<h1>REGISTRO EXITOSO</h1>";
            } else {
                $mensajeRegistro = "<h1>ERROR AL REGISTRAR</h1>";
            }
        } else {
            $mensajeRegistro = "<h1>Las contraseñas no coinciden</h1>";
        }
    }
}



?>
<?php include('../layouts/header.php') ?>
<link rel="stylesheet" href="<?= SCRIPT_ROOT ?>back-office/styles-bo.css">
<div class="container_bo">
    <form action="" method="post">
        <?php
        if ($mensajeRegistro == "") {
        ?>
            <h1>Regístrese</h1>
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" maxlength="30" pattern="^[a-zA-Z]*" required>
            <br>
            <label for="lastname">Apellido:</label>
            <input type="text" name="lastname" id="lastname" pattern="^[a-zA-Z]*" maxlength="30" required>
            <br>
            <label for="email">Correo electrónico:</label>
            <input type="email" name="email" id="email" required>
            <br>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" minlength="5" required>
            <br>
            <label for="cpassword">Confirmar contraseña:</label>
            <input type="password" name="cpassword" id="cpassword" minlength="5" required>
            <br>
            <div>
                <input type="submit" name="registro" value="Registrarse">
                <a class="btn" href="<?= SCRIPT_ROOT ?>back-office/index.php">Inicie sesión</a>
            </div>
        <?php
        } else {
        ?>
            <?= $mensajeRegistro ?>
            <br>
            <a class="btn" href="<?= SCRIPT_ROOT ?>back-office/registro.php">Reintentar</a>
        <?php
        }
        ?>
    </form>
</div>
<?php include('../layouts/footer.php') ?>