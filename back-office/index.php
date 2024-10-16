<?php include('../layouts/header.php') ?>
<link rel="stylesheet" href="<?= SCRIPT_ROOT ?>back-office/styles-bo.css">
<div class="container_bo">
    <form action="./login.php" method="post">
        <h1>Inicia sesión</h1>
        <input type="email" name="email" id="email" required placeholder="Correo"> 
        <br>
        <input type="password" name="password" id="password" required placeholder="Contraseña">
        <br>
        <div class="buttons-container">
            <input type="submit" value="Iniciar sesión">
            <a class="btn" href="./registro.php">Registrese</a>
        </div>
    </form>
</div>
<?php include('../layouts/footer.php') ?>