<?php
    include('../database/bd.php');

    if(isset($_POST) && !empty($_POST)){

        $titulo = isset($_POST['titulo']) && !empty($_POST['titulo']) ? $_POST['titulo'] : '';
        $precio = isset($_POST['precio']) && !empty($_POST['precio']) ? $_POST['precio'] : '';
        $descripcion = isset($_POST['descripcion']) && !empty($_POST['descripcion']) ? $_POST['descripcion'] : '';
        $id = isset($_POST['id']) && !empty($_POST['id']) ? $_POST['id'] : '';

        // imagen upload

        // Verificar si el directorio existe, si no, crearlo
        $uploadDirectory = 'uploads/';
        if (!is_dir($uploadDirectory)) {
            mkdir($uploadDirectory, 0755, true);
        }

        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['imagen']['tmp_name'];
            $fileName = $_FILES['imagen']['name'];
            $fileSize = $_FILES['imagen']['size'];
            $fileType = $_FILES['imagen']['type'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            
            // Validar la extensión del archivo
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            if (in_array($fileExtension, $allowedExtensions)) {
                // Crear una ruta de destino para el archivo
                $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                $destPath = $uploadDirectory . $newFileName;
                
                // Mover el archivo al directorio de destino
                if (move_uploaded_file($fileTmpPath, $destPath)) {
                    echo "imagen subida exitosamente.";
                } else {
                    echo "Hubo un error al subir la imagen. Inténtalo de nuevo.";
                }
            } else {
                echo "Tipo de archivo no permitido. Solo se permiten archivos JPG, JPEG, PNG y GIF.";
            }
        } else {
            echo "No se ha subido ningún archivo o se produjo un error.";
        }

        if($titulo != '' && $precio != '' && $descripcion != '' && $id != ''){
            $sql = "UPDATE servicios SET nombre='$titulo', descripcion='$descripcion', precio= $precio WHERE id = $id"; 

            if(mysqli_query($connect, $sql)){
                
                if($newFileName){
                    $sql = "UPDATE servicios SET imagen='$newFileName' WHERE id = $id);"; 
                    mysqli_query($connect, $sql);
                }

                header("Location: ../servicios.php");
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

<?php include("../layouts/header.php") ?>

<link rel="stylesheet" href="css/style.css">

<div class="servicios-container">
    <h1>Actualizar Servicio</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="titulo">titulo</label>
        <input type="text" name="titulo" value="<?= $service['nombre'] ?>">

        <label for="descripcion">descripcion</label>
        <input type="text"name="descripcion" value="<?= $service['descripcion'] ?>">

        <label for="precio">precio</label>
        <input type="number"name="precio" value="<?= $service['precio'] ?>">

        <label for="imagen">imagen</label>
        <input type="file"name="imagen">

        <input type="hidden" name="id" value="<?= $service['id'] ?>">
        
        <input type="submit" value="Actualizar">
    </form>
    <?php if($service['imagen']): ?>
        <div style="text-align: center; margin-top: 20px;">
            <img src="uploads/<?= $service['imagen'] ?>" alt="Imagen servicio" style="width: 200px;">
        </div>
    <?php endif; ?>

</div>

<?php include('../layouts/footer.php') ?>