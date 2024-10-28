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
                    <div class="opinion-container">
                        <div class="title">
                            <div>
                                <h2><?= $u['nombre'] ?> <?= $u['apellido'] ?></h2>
                                <span class="fecha"><?= $r['fecha_hora'] ?></span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-quote" viewBox="0 0 16 16">
                                <path d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388q0-.527.062-1.054.093-.558.31-.992t.559-.683q.34-.279.868-.279V3q-.868 0-1.52.372a3.3 3.3 0 0 0-1.085.992 4.9 4.9 0 0 0-.62 1.458A7.7 7.7 0 0 0 9 7.558V11a1 1 0 0 0 1 1zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612q0-.527.062-1.054.094-.558.31-.992.217-.434.559-.683.34-.279.868-.279V3q-.868 0-1.52.372a3.3 3.3 0 0 0-1.085.992 4.9 4.9 0 0 0-.62 1.458A7.7 7.7 0 0 0 3 7.558V11a1 1 0 0 0 1 1z"/>
                            </svg>
                        </div>
                        <p class="mensaje"><?= $r['comentario'] ?></p>
                        <p class="opinion-correo"><?= $u['correo'] ?></p>
                        <p class="estrellas">
                            <?php for($i = 0; $i < $r['calificacion']; $i++):?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" color="#e5be01">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                </svg>
                            <?php endfor; ?>
                        </p>
                        <?php if(isset($_SESSION['user']) && !empty($_SESSION['user']) && $_SESSION['user']['perfil'] == 2): ?>
                            <a href="back/borrarReserva.php?id=<?= $r['id'] ?>" class="borrar-servicio-button">Borrar</a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </div>
</div>

<?php include('layouts/footer.php') ?>