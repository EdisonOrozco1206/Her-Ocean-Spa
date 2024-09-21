<?php include('../layouts/header.php') ?>

<link rel="stylesheet" href="../css/style.css">

<div class="servicios-container">
    <h1>Agregar Servicio</h1>
    <form action="guardarServicio.php" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre">

        <label for="descripcion">descripcion</label>
        <input type="text" name="descripcion">

        <label for="precio">precio</label>
        <input type="number" name="precio">

        <label for="imagen">imagen</label>
        <input type="file" name="imagen">
        
        <input type="submit" value="enviar">
    </form>
</div>

<?php include('../layouts/footer.php') ?>