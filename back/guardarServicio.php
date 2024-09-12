<?php
    if(isset($_POST) && !empty($_POST)){
        include('../database/bd.php');

        $titulo = $_POST['titulo'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];


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


        $sql = "INSERT INTO servicios VALUES(NULL, '$titulo', '$descripcion', $precio, '$newFileName');";
        
        if(mysqli_query($connect, $sql)){
            header("Location: ../servicios.php");
        }

    }else{
        header("Location: ../agregarServicio.php");
    }
?>