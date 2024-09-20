<?php
if (!defined("SCRIPT_ROOT")) {
    define('SCRIPT_ROOT', '//localhost/her-ocean-spa/');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Her Ocean Spa</title>

    <link rel="stylesheet" href="<?= SCRIPT_ROOT ?>css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>

<body>

    <header>
        <div class="fila">
            <!-- <p>Es tiempo de enfocarte en ti</p> -->
        </div>
        <div class="fila">
            <div>
                <a href="<?= SCRIPT_ROOT ?>index.php">
                    <h1>Her Ocean Spa</h1>
                    <p>Women's Spa</p>
                </a>
            </div>
            <div>
                <img src="<?= SCRIPT_ROOT ?>img/suit-heart.svg" alt=" ">
                <a href="<?= SCRIPT_ROOT ?>back-office/login.php"><img src="<?= SCRIPT_ROOT ?>img/person.svg" alt=" "></a>
                <img src="<?= SCRIPT_ROOT ?>img/search.svg" alt=" ">
                <img src="<?= SCRIPT_ROOT ?>img/handbag.svg" alt=" ">
            </div>
        </div>
        <div class="fila">
            <nav>
                <ul>
                    <li><a href="<?= SCRIPT_ROOT ?>nosotros.php">Nosotros</a></li>
                    <li><a href="<?= SCRIPT_ROOT ?>servicios.php">Servicios</a></li>
                    <li><a href="<?= SCRIPT_ROOT ?>reservas.php">Reservas</a></li>
                    <li><a href="<?= SCRIPT_ROOT ?>opiniones.php">Opiniones</a></li>
                    <li><a href="<?= SCRIPT_ROOT ?>belleza.php">Belleza</a></li>
                    <li><a href="<?= SCRIPT_ROOT ?>sedes.php">Sedes</a></li>
                </ul>
            </nav>
        </div>
    </header>