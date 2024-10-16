<?php 
    session_start();
    if(!$_SESSION['user']  && !isset($_SESSION['user']['perfil']) && $_SESSION['user']['perfil'] != 2){ header("Location: ../index.php"); }
    if(empty($_GET) || empty($_GET['id'])){ header("Location: ../index.php"); }
    session_write_close();

    include("../database/bd.php");

    $id = $_GET['id'];
    $record = mysqli_query($connect, "SELECT * FROM reservas WHERE id = $id")->fetch_assoc();

    if(isset($_POST) && !empty($_POST)){
        $fecha = isset($_POST['fecha']) && !empty($_POST['fecha']) ? $_POST['fecha'] : '';
        $hora = isset($_POST['hora']) && !empty($_POST['hora']) ? $_POST['hora'] : '';
        $estado = isset($_POST['estado']) && !empty($_POST['estado']) ? $_POST['estado'] : '';
        $mPago = isset($_POST['mPago']) && !empty($_POST['mPago']) ? $_POST['mPago'] : '';
        $sede = isset($_POST['sede']) && !empty($_POST['sede']) ? $_POST['sede'] : '';

        if($fecha && $hora && $estado && $mPago && $sede){
            $fecha_hora = $fecha." ".$hora;
            $sql = "UPDATE reservas SET fecha_hora = '$fecha_hora', estado = '$estado', m_pago = '$mPago', sede = '$sede' WHERE id = $id";
            if(mysqli_query($connect, $sql)){
                header("Location: ../reservas.php");
            }
        }
    }

    include('../layouts/header.php');
?>

<div class="reservas-container agregar-servicio">
    <h1>Actualizar reserva - Código #<?= $record['id'] ?></h1>

    <?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])): ?>
        <form action="" method="POST" style="margin-top: 20px;">
            <div>
                <label for="estado">Estado de la reserva</label>
                <select name="estado">
                    <option  <?php if($record['estado'] == "reservado"): ?> <?= "selected" ?> <?php endif; ?> value="reservado">Reservado</option>
                    <option  <?php if($record['estado'] == "en proceso"): ?> <?= "selected" ?> <?php endif; ?> value="en proceso">En proceso</option>
                    <option  <?php if($record['estado'] == "terminado"): ?> <?= "selected" ?> <?php endif; ?> value="terminado">Terminado</option>
                    <option  <?php if($record['estado'] == "cancelado"): ?> <?= "selected" ?> <?php endif; ?> value="cancelado">Cancelado</option>
                    <option  <?php if($record['estado'] == "sin confirmar"): ?> <?= "selected" ?> <?php endif; ?> value="sin confirmar">Sin confirmar</option>
                </select>
            </div>
            <div>
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" value="<?= substr($record['fecha_hora'], 0, 10) ?>" required>
            </div>

            <div>
                <label for="hora">Hora de inicio</label>
                <input type="time" name="hora" value="<?= substr($record['fecha_hora'], 11, 20) ?>" required>
            </div>

            <div>
                <label for="sede">Sede</label>
                <select name="sede">
                    <option value="">Selecciona la sede...</option>
                    <option  <?php if($record['sede'] == "Sabaneta"): ?> <?= "selected" ?>  <?php endif; ?> value="Sabaneta">Sabaneta</option>
                    <option  <?php if($record['sede'] == "Envigado"): ?> <?= "selected" ?>  <?php endif; ?> value="Envigado">Envigado</option>
                    <option  <?php if($record['sede'] == "Poblado"): ?> <?= "selected" ?>  <?php endif; ?> value="Poblado">Poblado</option>
                    <option  <?php if($record['sede'] == "Laureles"): ?> <?= "selected" ?>  <?php endif; ?> value="Laureles">Laúreles</option>
                    <option  <?php if($record['sede'] == "Belen"): ?> <?= "selected" ?>  <?php endif; ?> value="Belen">Belén</option>
                </select>
            </div>

            <div>
                <label for="mPago">Metodo de pago</label>
                <select name="mPago">
                    <option <?php if($record['m_pago'] == "E"): ?> <?= "selected" ?> <?php endif; ?>value="E">Efectivo</option>
                    <option <?php if($record['m_pago'] == "T"): ?> <?= "selected" ?> <?php endif; ?>value="T">Transferencia</option>
                    <option <?php if($record['m_pago'] == "TD"): ?> <?= "selected" ?> <?php endif; ?>value="TD">Tarjeta</option>
                </select>
            </div>

            <input type="submit" value="Actualizar reserva">
        </form>
    <?php else: ?>
        <p class="page-description" style="margin-top: 20px;">Te invitamos a <a href="back-office/registro.php">Registrarte</a> o <a href="back-office/">Iniciar sesión</a> para realizar reservas en nuestros exclusivos spas</p>
    <?php endif; ?>
</div>

<?php include('../layouts/footer.php') ?>