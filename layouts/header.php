<?php
define('SCRIPT_ROOT','//localhost/Proyecto/');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="<?= SCRIPT_ROOT ?>img/favicon.png">
    <link rel="stylesheet" href="<?= SCRIPT_ROOT ?>css/style.css">
    <link rel="stylesheet" href="<?= SCRIPT_ROOT ?>css/new_styles.css">
    <title>Her Ocean Spa</title>
</head>
<body>
    <header id="header">
        <div class="fila">
            <p>centro de relajación</p>
        </div>
        <div class="fila">
            <div>
                <a href="<?=SCRIPT_ROOT ?>index.php">
                    <h1 class="title">Her Ocean Spa</h1>
                    <p class="title">Women's Spa</p>
                </a>
            </div>
            <div>
                <a class="nav-action dnone" href=""><img src="<?=SCRIPT_ROOT ?>img/suit-heart.svg" alt=""></a>
                <?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])): ?>
                    <a class="nav-action dnone" href="<?=SCRIPT_ROOT ?>perfil.php"><img src="<?=SCRIPT_ROOT ?>img/person.svg" alt=" "></a>
                <?php else: ?>
                    <a class="nav-action dnone" href="<?=SCRIPT_ROOT ?>back-office/"><img src="<?=SCRIPT_ROOT ?>img/person.svg" alt=" "></a>
                <?php endif; ?>
                <a class="nav-action dnone" href="" id="search-button"><img src="<?=SCRIPT_ROOT ?>img/search.svg" alt=""></a>
            </div>
        </div>
        <div class="fila">  
            <nav>
                <ul>
                    <li><a class="header-link" href="<?=SCRIPT_ROOT ?>nosotros.php">Nosotros</a></li>
                    <li class="li-destellos">
                        <img class="destellos" src="http://localhost/Proyecto/img/destellos.png" alt="">
                        <a class="header-link servicios-link" href="<?=SCRIPT_ROOT ?>servicios.php">Servicios</a>
                        <img class="destellos" src="http://localhost/Proyecto/img/destellos.png" alt="">
                    </li>
                    <li><a class="header-link" href="<?=SCRIPT_ROOT ?>reservas.php">Reservas</a></li>
                    <li><a class="header-link" href="<?=SCRIPT_ROOT ?>opiniones.php">Opiniones</a></li>
                    <li><a class="header-link" href="<?=SCRIPT_ROOT ?>belleza.php">Recomendaciones</a></li>
                    <li><a class="header-link" href="<?=SCRIPT_ROOT ?>sedes.php">Sedes</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const searchButton = document.getElementById("search-button");
        searchButton.addEventListener("click", (e) => {
            e.preventDefault();

            Swal.fire({
                title: "<strong>Buscar servicios</strong>",
                html: `
                    <div class="search-div" method="GET">
                        <form action="<?= SCRIPT_ROOT ?>servicios.php" id="search-form">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="10" height="10" viewBox="0 0 24 24" stroke-width="1.5" stroke="#9e9e9e" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                <path d="M21 21l-6 -6" />
                            </svg>
                            <input type="text" name="search" placeholder="Nombre del servicio" autofocus/>
                        </form>
                    </div>
                `,
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: `
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#b3b3b3" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                        <path d="M21 21l-6 -6" />
                    </svg>
                `,
                confirmButtonAriaLabel: "Thumbs up, great!",
                cancelButtonText: `
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M18 6l-12 12" />
                        <path d="M6 6l12 12" />
                    </svg>
                `,
                cancelButtonAriaLabel: "Thumbs down",
                preConfirm: () => {
                    const form = document.getElementById("search-form");
                    form.submit();
                }
            });
        });
    </script>
    <script>
        if(window.location.href != "http://localhost/Proyecto/index.php" || window.location.href != "http://localhost/Proyecto/"){
            const navActions = document.querySelectorAll(".nav-action");
            navActions.forEach(element => {
                element.classList.remove("dnone");
                element.classList.add("dblock");
            });
        }
        if(window.location.href == "http://localhost/Proyecto/index.php" || window.location.href == "http://localhost/Proyecto/"){
            
            window.addEventListener("DOMContentLoaded", () => {
                const header = document.getElementById("header");
                const text = document.querySelectorAll(".title");
                const links = document.querySelectorAll(".header-link");
                const footer = document.getElementById("footer");
                const destellos = document.querySelectorAll(".destellos");
                const navActions = document.querySelectorAll(".nav-action");
                header.addEventListener('mouseover', function() {
                    navActions.forEach(element => {
                        element.classList.remove("dnone");
                        element.classList.add("dblock");
                    });
                });
                header.addEventListener('mouseout', function() {
                    navActions.forEach(element => {
                        element.classList.add("dnone");
                        element.classList.remove("dblock");
                    });
                });


                destellos.forEach(element => {
                    element.classList.add("dnone");
                });

                header.classList.add("bgtrp");
                text.forEach(element => {
                    element.classList.add("textwhite");
                });
                links.forEach(element => {
                    element.classList.add("textwhite");
                });
                navActions.forEach(element => {
                        element.classList.add("dnone");
                        element.classList.remove("dblock");
                    });
                footer.style.transform = "translateY(0vh)";
            });

            window.addEventListener("scroll", () => {
                const header = document.getElementById("header");
                const text = document.querySelectorAll(".title");
                const links = document.querySelectorAll(".header-link");
                const navActions = document.querySelectorAll(".nav-action");
                const destellos = document.querySelectorAll(".destellos");

                if(window.scrollY >= 544){
                    header.classList.remove("bgtrp");
                    header.classList.add("addbgwhite");
                    text.forEach(element => {
                        element.classList.remove("textwhite");
                        element.classList.add("blackText");
                    });
                    links.forEach(element => {
                        element.classList.remove("textwhite");
                        element.classList.add("blackText");
                    });
                    destellos.forEach(element => {
                        element.classList.remove("dnone");
                    });

                    if(header.classList.contains("addbgwhite")){
                        navActions.forEach(element => {
                            element.classList.remove("dnone");
                            element.classList.add("dblock");
                        });
                    }
                }
                if(window.scrollY < 544){
                    header.classList.remove("addbgwhite");
                    header.classList.add("bgtrp");
                    text.forEach(element => {
                        element.classList.add("textwhite");
                        element.classList.remove("blackText");
                    });
                    links.forEach(element => {
                        element.classList.add("textwhite");
                        element.classList.remove("blackText");
                    });
                    navActions.forEach(element => {
                        element.classList.add("dnone");
                        element.classList.remove("dblock");
                    });
                    destellos.forEach(element => {
                        element.classList.add("dnone");
                    });
                }   
            });
        }
    </script>