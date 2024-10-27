<?php
    if(isset($_GET) && !empty($_GET) && !empty($_GET['email'])){
        include("../database/bd.php");
        $email = $_GET['email'];
        mysqli_query($connect, "INSERT INTO suscripciones VALUES(NULL, '$email')");
        header("Location: ../index.php");
    }else{
        header("Location: ../index.php");
    }
?>