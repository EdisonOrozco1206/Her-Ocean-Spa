<?php include('layouts/header.php') ?>

<?php
    include("database/bd.php");

    $sql = "SELECT * FROM servicios ORDER BY id DESC";
    $services = mysqli_query($connect, $sql);
    // $services = $response->fetch_assoc();
?>

<div class="servicios-container">

    <img src="" alt="">
    <a href="agregarServicio.php">agregar servicio</a>
    <div class="servicios">
        <?php foreach($services as $service): ?>
            <div class="card">
                <div class="img"><img src="back/uploads/<?= $service['imagen'] ?>" alt=""></div>

                <div class="body">
                    <p class="estrellas">★★★★★</p>
                    <h3><?= $service['nombre'] ?></h3>
                    <p class="info"><?= $service['descripcion'] ?></p>
                    
                    <div style="display: flex; justify-content:space-evenly">
                        <button>
                            <a href="back/actualizarServicio.php?id=<?= $service['id'] ?>">Actualizar</a>
                        </button>
                        <button>
                            <a href="back/borrarServicio.php?id=<?= $service['id'] ?>">Eliminar</a>
                        </button>
                    </div>

                    <button>
                        <p>Añadir al carrito - <span>$ <?= $service['precio'] ?></span></p>
                    </button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include('layouts/footer.php') ?>