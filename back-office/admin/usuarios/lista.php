<?php
define('SCRIPT_ROOT', '//localhost/her-ocean-spa/');
include($_SERVER["DOCUMENT_ROOT"].'/her-ocean-spa/database/bd.php');

$query = mysqli_query($connect, "SELECT * FROM usuarios;");

$data = array();
while ($row = mysqli_fetch_assoc($query)) {
    $data[] = $row;
}

?>
<link rel="stylesheet" href="<?= SCRIPT_ROOT ?>back-office/styles-bo.css">
<div class="container_bo">
    <div class="form-container">
        <h1>Lista de Usuarios </h1>
        <table cellspacing="0" border="1">
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>correo</th>
                <th>fecha de nacimiento</th>
                <th>perfil</th>
                <th>acciones</th>
            </tr>
        
        <?php
        if (!empty($data[0])) {
            foreach ($data as $row) {
                ?>
                <tr>
                    <td><?=$row['nombre']?></td>
                    <td><?=$row['apellido']?></td>
                    <td><?=$row['correo']?></td>
                    <td><?=$row['f_nacimiento']?></td>
                    <td><?=$row['perfil']?></td>
                    <td>
                        <a href="./form.php?id=<?= $row['id'] ?>">Editar</a>
                        <a href="./delete.php?id=<?= $row['id'] ?>">Eliminar</a>
                    </td>
                </tr>
                <?php

            }
        }
        ?>
        </table>

        <a class="btn" href="<?= SCRIPT_ROOT ?>back-office/admin/usuarios/form.php">Agregar Usuario</a>
    </div>
</div>