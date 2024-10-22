<?php
include($_SERVER["DOCUMENT_ROOT"] . '/Proyecto/database/bd.php');

$query = mysqli_query($connect, "SELECT * FROM sedes;");

$data = array();
while ($row = mysqli_fetch_assoc($query)) {
    $data[] = $row;
}

?>
<?php include($_SERVER["DOCUMENT_ROOT"] . '/Proyecto/layouts/header.php') ?>

<link rel="stylesheet" href="<?= SCRIPT_ROOT ?>back-office/styles-bo.css">
<div class="container_bo">
    <div class="table-container">
        <h1>Lista de sedes </h1>
        <table cellspacing="0" border="0">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>direccion</th>
                    <th>municipio</th>
                    <th>departamento</th>
                    <th>telefono</th>
                    <th>horario</th>
                    <th>descripcion</th>
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
                            <td><?= $row['direccion'] ?></td>
                            <td><?= $row['municipio'] ?></td>
                            <td><?= $row['departamento'] ?></td>
                            <td><?= $row['telefono'] ?> </td>
                            <td><?= $row['horario' ]?></td>
                            <td><?= $row['descripcion']?></td>
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

        <a class="btnFill" href="<?= SCRIPT_ROOT ?>back-office/admin/sedes/form.php">Agregar sedes</a>
    </div>
</div>

<?php include($_SERVER["DOCUMENT_ROOT"] . '/Proyecto/layouts/footer.php') ?>