<?php 
    include('layouts/header.php');
    include("database/bd.php");

    if(isset($_POST) && !empty($_POST)){
        date_default_timezone_set('America/Bogota');
        $fecha_hora = date("Y-m-d H:i:s");
        $id_cliente = $_SESSION['user']['id'];
        $mensaje = isset($_POST['mensaje']) && !empty($_POST['mensaje']) ? $_POST['mensaje'] : '';
        $calificacion = isset($_POST['calificacion']) && !empty($_POST['calificacion']) ? $_POST['calificacion'] : '';
        $sql = "INSERT INTO opiniones VALUES(NULL, '$fecha_hora', '$mensaje', $calificacion, $id_cliente)";
        mysqli_query($connect, $sql);
    }

    $usuarios = mysqli_query($connect, "SELECT * FROM usuarios ORDER BY id DESC");
    $rows = mysqli_query($connect, "SELECT * FROM opiniones ORDER BY id DESC");
?>

<div class="reservas-container agregar-servicio">
    <h1>Opiniones de nustras clientas</h1>
    <?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])): ?>
        <form action="" method="POST" style="margin-top: 20px;">
            <div>
                <label for="mensaje">Ingresa el mensaje</label>
                <textarea name="mensaje">...</textarea>
            </div>

            <div>
                <label for="calificacion">Dejanos tu calificación</label>
                <select name="calificacion">
                    <option value="5">5 -⭐⭐⭐⭐⭐</option>
                    <option value="4">4 -⭐⭐⭐⭐</option>
                    <option value="3">3 -⭐⭐⭐</option>
                    <option value="2">2 -⭐⭐</option>
                    <option value="1">1 -⭐</option>
                </select>
            </div>

            <input type="submit" value="Postear opinion">
        </form>
    <?php else: ?>
        <p class="page-description" style="margin-top: 20px; margin-bottom: 20px;">Te invitamos a <a href="back-office/registro.php">Registrarte</a> o <a href="back-office/">Iniciar sesión</a> para dejar tu valiosa opinion sobre nosotros</p>
    <?php endif; ?>

    <div class="opiniones-container" style="margin-top: 20px;">
        <?php foreach($rows as $r): ?>
            <?php foreach($usuarios as $u): ?>
                <?php if($u['id'] == $r['id_cliente']): ?>
                    <div>
                        <h2><?= $u['nombre'] ?> <?= $u['apellido'] ?></h2>
                        <span><?= $r['fecha_hora'] ?> - <?= $u['correo'] ?></span>
                        <hr style="margin: 10px 0px;">
                        <p><?= $r['comentarion'] ?></p>
                        <?php if(isset($_SESSION['user']) && !empty($_SESSION['user']) && $_SESSION['user']['perfil'] == 2): ?>
                            <a href="back/borrarReserva.php?id=<?= $r['id'] ?>" class="borrar-servicio-button">Borrar</a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </div>

<?php include('layouts/footer.php') ?>