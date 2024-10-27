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
            <p>En Her Ocean Spa, cada visita es una oportunidad para desconectar y reconectar contigo misma. Desde el momento en que cruzas nuestras puertas, serás recibida por un ambiente que evoca la tranquilidad del mar, con detalles cuidadosamente diseñados para transportarte lejos del estrés cotidiano.

            Nuestros tratamientos van más allá de lo superficial. Cada masaje, baño terapéutico o tratamiento corporal ha sido seleccionado con esmero para aliviar tensiones, mejorar la circulación y devolverle al cuerpo la sensación de ligereza que merece. Las manos expertas de nuestros terapeutas se combinan con ingredientes naturales que nutren la piel y los sentidos, logrando una experiencia que realmente se siente.

            En Her Ocean Spa, creemos que la verdadera belleza y bienestar comienzan desde adentro. Por eso, ofrecemos espacios de calma donde puedes descansar, respirar profundo y dejarte llevar por el entorno. Desde el suave sonido del agua hasta la iluminación tenue que invita a la relajación, hemos pensado en cada detalle para que encuentres el equilibrio entre cuerpo y mente.</p>
        </div>
        
        <div class="arco">
            <div><img src="img/img 1.jpg" alt=""></div>
        </div>
    </div>
    <div class="row_2">
        <div class="container">
            <img src="img/img3.jpg" alt="">
            <div class="content">
                <p>En Her Ocean Spa, cada visita es una invitación a desconectar y reconectar contigo misma. Al cruzar nuestras puertas, te encontrarás rodeada de un ambiente que evoca la serenidad del mar, diseñado para que dejes atrás el estrés diario y te sumerjas en un momento de paz.</p>
            </div>
        </div>
        <div class="container">
            <img src="img/img2.jpg" alt="">
            <div class="content">
                <p>Nuestros tratamientos van desde masajes hasta baños terapéuticos, cada uno pensado para aliviar tensiones y mejorar la circulación. Con ingredientes naturales y las manos expertas de nuestros terapeutas, tu cuerpo y sentidos se sienten cuidados y renovados.</p>
            </div>
        </div>
        <div class="container">
            <img src="img/img4.jpg" alt="">
            <div class="content">
                <p>La experiencia en Her Ocean Spa va más allá de un simple tratamiento: aquí, cada detalle cuenta. Desde el suave sonido del agua hasta la luz tenue que invita a relajarse, cada elemento está pensado para que disfrutes plenamente de un ambiente de calma.</p>
            </div>
        </div>
        <div class="container">
            <img src="img/img5.jpg" alt="">
            <div class="content">
                <p>Ven a Her Ocean Spa y permite que el equilibrio entre cuerpo y mente se convierta en tu nueva realidad. Saldrás sintiéndote más ligera y lista para enfrentar el mundo desde una perspectiva renovada.</p>
            </div>
        </div>
    </div>
    <div class="row_3">
        <h2 style="font-size: 80px;">Nuestro trabajo</h2>
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