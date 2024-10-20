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