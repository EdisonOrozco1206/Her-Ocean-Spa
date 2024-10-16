<?php 
    session_start();
    if(!$_SESSION['user']  && !isset($_SESSION['user']['perfil']) && $_SESSION['user']['perfil'] != 2){ header("Location: ../index.php"); }
    if(empty($_GET) || empty($_GET['id'])){ header("Location: ../index.php"); }
    session_write_close();

    include("../database/bd.php");

    $id = $_GET['id'];
    mysqli_query($connect, "DELETE FROM reservas WHERE id = $id");
    header("Location: ../reservas.php");
?>