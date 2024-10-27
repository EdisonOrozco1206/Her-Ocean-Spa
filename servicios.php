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

<div class="serviciosss-container servicios-container" style="transform: translateY(12vw);">
    <?php if(isset($_SESSION['user']) && isset($_SESSION['user']['perfil']) && $_SESSION['user']['perfil'] == 2): ?>
        <a href="back/agregarServicio.php" class="agregar-servicio-button">Agregar servicio</a>
    <?php endif; ?>

    <?php if(isset($_GET['search']) && !empty($_GET['search'])): ?>
        <a href="servicios.php" class="agregar-servicio-button">Ver todos los servicios</a>
    <?php endif; ?>

    <div class="servicios-box">
        <h1>Servicios</h1>
        <div class="servicios">
            <img src="img/back-servicios.jpg" alt="Imagen de servicios">
            <?php if(mysqli_num_rows($services) >= 1): ?>
                <?php foreach($services as $service): ?>
                    <div class="card">
                        <div class="body">
                            <h2><?= $service['nombre'] ?></h2>
                            <p class="info"><?= $service['descripcion'] ?></p>
                            <p class="price">$<?= number_format($service['precio'], 0, ',', '.') ?></p>
                            <p>
                                <a href="" class="favorito-button" data-value="<?= htmlspecialchars(json_encode($service), ENT_QUOTES, 'UTF-8') ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" x-bind:width="size" x-bind:height="size" viewBox="0 0 24 24" fill="none" stroke="currentColor" x-bind:stroke-width="stroke" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
                                        <path d="M11.537 19.542l-7.037 -6.97a5 5 0 1 1 7.5 -6.566a5 5 0 0 1 8.212 5.693"></path>
                                        <path d="M19 22.5a4.75 4.75 0 0 1 3.5 -3.5a4.75 4.75 0 0 1 -3.5 -3.5a4.75 4.75 0 0 1 -3.5 3.5a4.75 4.75 0 0 1 3.5 3.5"></path>
                                    </svg>
                                </a>
                            </p>
                            
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

<script>
    window.addEventListener("DOMContentLoaded", () => {
        const favoriteButtons = document.querySelectorAll(".favorito-button");

        favoriteButtons.forEach(button => {
            button.addEventListener("click", (e) => {
                e.preventDefault();

                const value = button.getAttribute('data-value');
                try {
                    const service = JSON.parse(value);
                    
                    const services = JSON.parse(localStorage.getItem("services")) || [];
                    services.push(service);

                    localStorage.setItem("services", JSON.stringify(services));
                } catch (error) {
                    console.error("Error al parsear JSON:", error);
                }
            });
        });
    });
</script>

<?php include('layouts/footer.php') ?>