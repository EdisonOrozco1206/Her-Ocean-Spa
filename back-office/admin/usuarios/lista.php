<?php
include($_SERVER["DOCUMENT_ROOT"] . '/her-ocean-spa/database/bd.php');

$query = mysqli_query($connect, "SELECT * FROM usuarios;");

$data = array();
while ($row = mysqli_fetch_assoc($query)) {
    $data[] = $row;
}

?>
<?php include($_SERVER["DOCUMENT_ROOT"] . '/her-ocean-spa/layouts/header.php') ?>

<link rel="stylesheet" href="<?= SCRIPT_ROOT ?>back-office/styles-bo.css">
<div class="container_bo">
    <div class="table-container">
        <h1>Lista de Usuarios </h1>
        <table cellspacing="0" border="0">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Fecha de nacimiento</th>
                    <th>Perfil</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($data[0])) {
                    foreach ($data as $row) {
                ?>
                        <tr>
                            <td><?= $row['nombre'] ?></td>
                            <td><?= $row['apellido'] ?></td>
                            <td><?= $row['correo'] ?></td>
                            <td><?= $row['f_nacimiento'] ?></td>
                            <td><?= $row['perfil'] == 0 ? 'Administrador' : 'Cliente' ?></td>
                            <td>
                                <a href="./form.php?id=<?= $row['id'] ?>">Editar</a>
                                <a href="./delete.php?id=<?= $row['id'] ?>">Eliminar</a>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>

        <a class="btnFill" href="<?= SCRIPT_ROOT ?>back-office/admin/usuarios/form.php">Agregar Usuario</a>
    </div>
</div>

<?php include($_SERVER["DOCUMENT_ROOT"] . '/her-ocean-spa/layouts/footer.php') ?>