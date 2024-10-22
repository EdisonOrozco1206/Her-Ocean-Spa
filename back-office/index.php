<?php include('../layouts/header.php') ?>
<link rel="stylesheet" href="<?= SCRIPT_ROOT ?>back-office/styles-bo.css">
<div class="container_bo">
    <form action="./login.php" method="post">
        <h1>Inicia sesion</h1>
        <!-- <label for="email">Correo electrónico:</label> -->
        <input type="email" name="email" id="email" autocomplete="off" required placeholder="Correo: ">
        <br>
        <!-- <label for="password">Contraseña:</label> -->
        <input type="password" name="password" id="password" required placeholder="Contraseña: ">
        <br>
        <div>
            <button type="submit">Iniciar sesión</button>
            <a class="btn" href="./registro.php">Registrese</a>
        </div>
    </form>
</div>
<?php include('../layouts/footer.php') ?>