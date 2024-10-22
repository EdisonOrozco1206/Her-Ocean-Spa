<?php include('layouts/header.php') ?>

<?php
    include("database/bd.php");
    
    if(isset($_GET['search']) && !empty($_GET['search'])){
        $search = $_GET['search'];
        $sql = "SELECT * FROM servicios WHERE nombre LIKE '%$search%' OR descripcion LIKE '%$search%' ORDER BY id DESC";
    }else{
        $sql = "SELECT * FROM servicios ORDER BY id DESC";
    }

    $services = mysqli_query($connect, $sql);
?>

<div class="serviciosss-container servicios-container">
    <?php if(isset($_SESSION['user']) && isset($_SESSION['user']['perfil']) && $_SESSION['user']['perfil'] == 2): ?>
        <a href="back/agregarServicio.php" class="agregar-servicio-button">Agregar servicio</a>
    <?php endif; ?>

    <?php if(isset($_GET['search']) && !empty($_GET['search'])): ?>
        <a href="servicios.php" class="agregar-servicio-button">Ver todos los servicios</a>
    <?php endif; ?>

    <div class="servicios-box">
        <h1>Servicios Her Ocean Spa</h1>
        <div class="servicios">
            <img src="img/back-servicios.jpg" alt="Imagen de servicios">
            <?php if(mysqli_num_rows($services) >= 1): ?>
                <?php foreach($services as $service): ?>
                    <div class="card">
                        <div class="body">
                            <h2><?= $service['nombre'] ?></h2>
                            <p class="info"><?= $service['descripcion'] ?></p>
                            <p class="price">$<?= number_format($service['precio'], 0, ',', '.') ?></p>
                            
                            <?php if(isset($_SESSION['user']) && isset($_SESSION['user']['perfil']) && $_SESSION['user']['perfil'] == 2): ?>
                                <div class="service-options" style="margin-top: 10px;">
                                    <a href="actualizarServicio.php?id=<?= $service['id'] ?>">
                                        Editar
                                    </a>
                                    <a href="back/borrarServicio.php?id=<?= $service['id'] ?>">
                                        Eliminar
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <h3 style="color: white;">No se ha encontrado nada</h3>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include('layouts/footer.php') ?>