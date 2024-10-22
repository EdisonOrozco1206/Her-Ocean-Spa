<?php include('layouts/header.php') ?>

<div class="index-container">
    <video src="img/bg.mp4" class="bg" autoplay muted loop></video>
    <div class="row_0">
        <div class="info">
            <h1>Her ocean spa</h1>
            <?php if(isset($_SESSION['user']) && $_SESSION['user'] && !empty($_SESSION['user'])):?>
                <p>Bienvenido <?= $_SESSION['user']['nombre'] ?> <?= $_SESSION['user']['apellido'] ?>!!!</p>
            <?php endif;?>
        </div>
    </div>
    <div class="row_1">
        <div class="pincipal-titulo">
            <p>desconectar</p>
            <p>para</p>
            <p>conectar</p>
        </div>

        <div class="texto">
            <p>En Her Ocean Spa te invitamos a descubrir un lugar donde cada detalle está pensado para brindarte momentos de auténtica relajación. Desde masajes relajantes hasta faciales cuidadosamente diseñados, ofrecemos una experiencia que te permitirá desconectar del estrés diario.
            Aquí, el ambiente marino se refleja en cada rincón: suaves sonidos de agua, fragancias frescas y una atmósfera serena que te envuelve desde el primer momento. Nuestros especialistas te acompañarán en un recorrido de bienestar, adaptando cada tratamiento a lo que realmente necesitas.
            Ven a Her Ocean Spa, un espacio donde el cuidado personal se convierte en una experiencia verdaderamente única</p>
        </div>
        
        <div class="arco">
            <div><img src="img/img 1.jpg" alt=""></div>
        </div>
    </div>
    <div class="row_2">
        <div class="container">
            <img src="img/img3.jpg" alt="">
            <div class="content">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem, dolorum!</p>
            </div>
        </div>
        <div class="container">
            <img src="img/img2.jpg" alt="">
            <div class="content">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem, dolorum!</p>
            </div>
        </div>
        <div class="container">
            <img src="img/img4.jpg" alt="">
            <div class="content">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem, dolorum!</p>
            </div>
        </div>
        <div class="container">
            <img src="img/img5.jpg" alt="">
            <div class="content">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem, dolorum!</p>
            </div>
        </div>
    </div>
    <div class="row_3">
        <h2>Nuestro trabajo</h2>
        <div class="card-container">
            <div class="row">
                <div class="card">
                    <video src="videos/video3.mp4" autoplay muted loop></video>
                </div>
                <div class="card">
                    <video src="videos/video2.mp4" autoplay muted loop></video>
                </div>
                <div class="card">
                    <video src="videos/video1.mp4" autoplay muted loop></video>
                </div>
                <div class="card">
                    <video src="videos/video4.mp4" autoplay muted loop></video>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('layouts/footer.php') ?>             