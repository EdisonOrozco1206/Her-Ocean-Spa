<?php include('../layouts/header.php') ?>

<link rel="stylesheet" href="../css/style.css">

<div class="servicios-container agregar-servicio">
    <h1>Agregar Servicio</h1>
    <form action="guardarServicio.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" required>
        </div>

        <div>
            <label for="descripcion">Descripcion</label>
            <textarea name="descripcion" id="" style="max-width: 98%; min-width: 98%;">Ingresa la descripcion</textarea>
        </div>

        <div>
            <label for="precio">Precio</label>
            <input type="number" name="precio" required>
        </div>
        
        <input type="submit" value="Enviar">
    </form>
</div>

<?php include('../layouts/footer.php') ?>