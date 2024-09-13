<?php
define('SCRIPT_ROOT', '//localhost/her-ocean-spa/');
if (isset($_GET['id'])) {

    include($_SERVER["DOCUMENT_ROOT"] . '/her-ocean-spa/database/bd.php');

    $query = mysqli_query($connect, "SELECT * FROM usuarios WHERE id = '" . $_GET['id'] . "';");

    $data = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $data[] = $row;
    }

    if (!isset($data[0])) {
        echo "
        <script>
        alert('registro no encontrado');
        window.location.href = '" . SCRIPT_ROOT . "back-office//admin/usuarios/lista.php';
        </script>
        ";
    } else {
        $query = mysqli_query($connect, "DELETE  FROM usuarios WHERE id = '" . $_GET['id'] . "';");
        if ($query) {
       

            echo "
            <script>
            alert('borrado exitoso');
            window.location.href = '" . SCRIPT_ROOT . "back-office//admin/usuarios/lista.php';
            </script>
            ";
        } else {
            echo "
            <script>
            alert('ha ocurrido un error');
            </script>";
        }
    }
}

// echo $_POST['email']." ".$_POST['password'];
