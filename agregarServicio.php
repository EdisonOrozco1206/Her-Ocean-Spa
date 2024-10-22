<?php include('layouts/header.php') ?>

<link rel="stylesheet" href="../../css/style.css">

<div class="servicios-container">
    <form action="back/guardarServicio.php" method="post" enctype="multipart/form-data">
        <label for="titulo">titulo</label>
        <input type="text"name="titulo">

        <label for="descripcion">descripcion</label>
        <input type="text"name="descripcion">

        <label for="precio">precio</label>
        <input type="number"name="precio">

        <label for="imagen">imagen</label>
        <input type="file"name="imagen">
        
        <input type="submit" value="enviar">
    </form>
</div>

<?php include('layouts/footer.php') ?>