<?php
    if(!isset($_GET['type']) && empty($_GET['type']) && $_GET['type'] != 0 && $_GET['type'] != 1){
        header("Location: index.php");
    }
?>

<?php include('layouts/header.php') ?>

<div class="reserva-info" style="transform: translateY(15vw); margin-bottom: 5vw;">
    <?php if($_GET['type'] == 0): ?>
        <h1>Reserva exitosa!!</h1>
        <p>En Her Ocean Spa, te esperamos para brindarte un servicio extraordinadio.</p>
        <p style="color: red;">¡¡<strong>IMPORTANTE:</strong> Tiempo de tolerancia, maximo 15 minutos!!</p>
        <a href="index.php">Regresar al inicio</a>
    <?php else: ?> 
        <h1>Error al realizar la reserva!</h1>
        <p>Upps, parece que ha ocurrido algo no esperado durante la agenda de la reserva.</p>
        <a href="reservas.php">Realizar reserva de nuevo</a>
    <?php endif; ?>
</div>

<?php include('layouts/footer.php') ?>