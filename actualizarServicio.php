<?php
    include('database/bd.php');

    if(isset($_POST) && !empty($_POST)){

        $nombre = isset($_POST['nombre']) && !empty($_POST['nombre']) ? $_POST['nombre'] : '';
        $precio = isset($_POST['precio']) && !empty($_POST['precio']) ? $_POST['precio'] : '';
        $descripcion = isset($_POST['descripcion']) && !empty($_POST['descripcion']) ? $_POST['descripcion'] : '';
        $id = isset($_POST['id']) && !empty($_POST['id']) ? $_POST['id'] : '';

        if($nombre != '' && $precio != '' && $descripcion != '' && $id != ''){
            $sql = "UPDATE servicios SET nombre='$nombre', descripcion='$descripcion', precio= $precio WHERE id = $id"; 

            if(mysqli_query($connect, $sql)){
                header("Location: servicios.php");
            }
        }else{
            echo "Datos incompletos";
        }
    }

    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM servicios WHERE id  = $id";
        $service = mysqli_query($connect, $sql)->fetch_assoc();
    }
?>

<?php include("layouts/header.php") ?>

<link rel="stylesheet" href="css/style.css">

<div class="servicios-container agregar-servicio">
    <h1>Actualizar Servicio</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="nombre">nombre</label>
        <input type="text" name="nombre" value="<?= $service['nombre'] ?>">

        <label for="descripcion">descripcion</label>
        <textarea name="descripcion" id=""><?= $service['descripcion'] ?></textarea>

        <label for="precio">precio</label>
        <input type="number"name="precio" value="<?= $service['precio'] ?>">

        <input type="hidden" name="id" value="<?= $service['id'] ?>">
        
        <input type="submit" value="Actualizar">
    </form>
</div>

<?php include('layouts/footer.php') ?>