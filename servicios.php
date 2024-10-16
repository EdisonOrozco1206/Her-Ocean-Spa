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

<div class="servicios-container">
    <h1>Servicios</h1>
    <img src="" alt="">
    <?php if($_SESSION['user'] && isset($_SESSION['user']['perfil']) && $_SESSION['user']['perfil'] == 2): ?>
        <a href="back/agregarServicio.php" class="agregar-servicio-button">Agregar servicio</a>
    <?php endif; ?>

    <?php if(isset($_GET['search']) && !empty($_GET['search'])): ?>
        <a href="servicios.php" class="agregar-servicio-button">Ver todos los servicios</a>
    <?php endif; ?>
    <div class="servicios">
        <?php if(mysqli_num_rows($services) >= 1): ?>
            <?php foreach($services as $service): ?>
                <div class="card">
                    <div class="img">
                        <img src="<?= SCRIPT_ROOT ?>back/uploads/<?=$service['imagen']?>" alt="">
                    </div>

                    <div class="body">
                        <h2><?= $service['nombre'] ?></h2>
                        <p class="info"><?= $service['descripcion'] ?></p>
                        <p class="price">$<?= $service['precio'] ?></p>
                        
                        <?php if($_SESSION['user'] && isset($_SESSION['user']['perfil']) && $_SESSION['user']['perfil'] == 2): ?>
                            <div class="service-options">
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

<?php include('layouts/footer.php') ?>