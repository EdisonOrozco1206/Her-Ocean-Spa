<?php
    if(isset($_POST) && !empty($_POST)){
        include('../database/bd.php');

        $titulo = isset($_POST['nombre']) && !empty($_POST['nombre']) ? $_POST['nombre'] : '';
        $precio = isset($_POST['precio']) && !empty($_POST['precio']) ? $_POST['precio'] : '';
        $descripcion = isset($_POST['descripcion']) && !empty($_POST['descripcion']) ? $_POST['descripcion'] : '';


        if($titulo != '' && $precio != '' && $descripcion != ''){
            $sql = "INSERT INTO servicios (nombre, descripcion, precio) VALUES('$titulo', '$descripcion', $precio);";
            
            if(mysqli_query($connect, $sql)){
                header("Location: ../servicios.php");
            }
        }else{
            echo "Datos incompletos";
        }

    }else{
        header("Location: ../agregarServicio.php");
    }
?>