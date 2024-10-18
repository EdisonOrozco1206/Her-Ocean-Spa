<?php
    session_start();

    if(isset($_SESSION['user']) && !empty($_SESSION['user']) && $_SESSION['user']['perfil'] == 2 ){

        include("../database/bd.php");
        $id = $_GET['id'];
        mysqli_query($connect, "DELETE FROM opiniones WHERE id = $id");
        header("Location: ../opiniones.php");
    }else{
        header("Location: ../index.php");
    }
?>