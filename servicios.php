<?php include('layouts/header.php') ?>

<?php
    include("database/bd.php");

    $sql = "SELECT * FROM servicios ORDER BY id DESC";
    $services = mysqli_query($connect, $sql);
    // $services = $response->fetch_assoc();
?>

<div class="servicios-container">

    <img src="" alt="">
    <a href="back/agregarServicio.php">agregar servicio</a>
    <div class="servicios">
        <?php foreach($services as $service): ?>
            <div class="card">
                <div class="img"><img src="back/uploads/<?= $service['imagen'] ?>" alt=""></div>

                <div class="body">
                    <p class="estrellas">★★★★★</p>
                    <h3><?= $service['nombre'] ?></h3>
                    <p class="info"><?= $service['descripcion'] ?></p>
                    
                    <a href="actualizarServicio.php?id=<?= $service['id'] ?>">
                        Editar
                    </a>
                    <a href="back/borrarServicio.php?id=<?= $service['id'] ?>">
                        Eliminar
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include('layouts/footer.php') ?>