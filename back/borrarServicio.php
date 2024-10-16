<?php
    include("../database/bd.php");

    if(isset($_GET['id']) && !empty($_GET['id'])){
        $sql = "DELETE FROM servicios WHERE id = ".$_GET['id'];
        $query = mysqli_query($connect, $sql);
    }
    
    header("Location: ../servicios.php")
?>
