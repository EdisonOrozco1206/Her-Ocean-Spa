<?php 
    include('layouts/header.php');
    include("database/bd.php");
    $servicios = mysqli_query($connect, "SELECT * FROM servicios ORDER BY id desc");

    if(isset($_POST) && !empty($_POST)){
        $fecha = isset($_POST['fecha']) && !empty($_POST['fecha']) ? $_POST['fecha'] : '';
        $hora = isset($_POST['hora']) && !empty($_POST['hora']) ? $_POST['hora'] : '';
        $servicio = isset($_POST['servicio']) && !empty($_POST['servicio']) ? $_POST['servicio'] : '';
        $mPago = isset($_POST['mPago']) && !empty($_POST['mPago']) ? $_POST['mPago'] : '';
        $sede = isset($_POST['sede']) && !empty($_POST['sede']) ? $_POST['sede'] : '';

        if($fecha && $hora && $servicio && $mPago && $sede){
            $fecha_hora = $fecha." ".$hora;
            $servicioDatabase = mysqli_query($connect, "SELECT * FROM servicios WHERE id = $servicio");
            $servicioDatabase = $servicioDatabase->fetch_assoc();
            $precio = $servicioDatabase['precio'];
            $uId = $_SESSION['user']['id'];
            $sql = "INSERT INTO reservas VALUES(NULL, '$fecha_hora', $precio, 'reservado', '$mPago', '$sede', $uId, $servicio);";

            $reserva = mysqli_query($connect, $sql);
            if($reserva){
                header("Location: index.php");
            }
        }
    }
?>

<?php 
    if(isset($_SESSION['user']['perfil']) && $_SESSION['user']   && $_SESSION['user']['perfil'] == 2){
        include('back/adminReservas.php');
    }
?>

<div class="reservas-container agregar-servicio">
    <h1>Reservas</h1>
    <p class="page-description">Visitanos en alguna de nuestras <a href="sedes.php">sedes</a> para disfrutar de un servicio unico!</p>

    <?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])): ?>
        <form action="" method="POST" style="margin-top: 20px;">
            <div>
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" required>
            </div>

            <div>
                <label for="hora">Hora de inicio</label>
                <input type="time" name="hora" required>
            </div>

            <div>
                <label for="servicio">Servicio</label>
                <select name="servicio">
                    <option value="">Selecciona tú servicio...</option>
                    <?php if(mysqli_num_rows($servicios) >= 0): ?>
                        <?php foreach($servicios as $s): ?>
                            <option value="<?= $s['id'] ?>"><?= $s['nombre'] ?></option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option value="">No se pudieron cargar los servicios</option>
                    <?php endif; ?>
                </select>
            </div>

            <div>
                <label for="sede">Sede</label>
                <select name="sede">
                    <option value="">Selecciona la sede...</option>
                    <option value="Sabaneta">Sabaneta</option>
                    <option value="Envigado">Envigado</option>
                    <option value="Poblado">Poblado</option>
                    <option value="Laureles">Laúreles</option>
                    <option value="Belen">Belén</option>
                </select>
            </div>
            
            <div>
                <label for="mPago">Metodo de pago</label>
                <select name="mPago">
                    <option value="E">Efectivo</option>
                    <option value="T">Transferencia</option>
                    <option value="TD">Tarjeta</option>
                </select>
            </div>
            
            <input type="submit" value="Realizar reserva">
        </form>
    <?php else: ?>
        <p class="page-description" style="margin-top: 20px;">Te invitamos a <a href="back-office/registro.php">Registrarte</a> o <a href="back-office/">Iniciar sesión</a> para realizar reservas en nuestros exclusivos spas</p>
    <?php endif; ?>
</div>

<?php include('layouts/footer.php') ?>