<?php
include($_SERVER["DOCUMENT_ROOT"] . '/Proyecto/database/bd.php');

$datos_formulario = array();

if (isset($_GET['id'])) {
    $query = mysqli_query($connect, "SELECT * FROM sedes WHERE id = " . $_GET['id']);
    $data = mysqli_fetch_assoc($query);
    $datos_formulario = $data;
}


if (isset($_POST['Guardar'])) {
    if (isset($_POST['id']) && $_POST['id'] != "") {
        $query = mysqli_query(
            $connect,
            "UPDATE sedes SET 
             nombre = '{$_POST["name"]}',
             direccion= '{$_POST['address']}',
             municipio ='{$_POST['city']}',
             departamento ='{$_POST['department']}',
             telefono ='{$_POST['phone']}',
             horario ='{$_POST['hour']}',
             descripcion ='{$_POST['description']}' WHERE  id = {$_POST['id']};"

        );
    } else {
        $query = mysqli_query(
            $connect,
            "INSERT INTO sedes (id,nombre,direccion,municipio,departamento,telefono,horario,descripcion) VALUES (0,'"
                . $_POST['name'] . "','"
                . $_POST['address'] . "','"
                . $_POST['city'] . "','"
                . $_POST['department'] . "','"
                . $_POST['phone'] . "','"
                . $_POST['hour'] . "','"
                . $_POST['description'] . "')"
        );
    }
    if ($query) {


        echo "
        <script>
        confirm('registro exitoso');
        window.location.href = '" . SCRIPT_ROOT . "back-office//admin/sedes/lista.php';
        </script>
        ";
    } else {
        echo "
        <script>
        confirm('ha ocurrido un error');
        </script>";
    }
}

?>

<?php include($_SERVER["DOCUMENT_ROOT"] . '/Proyecto/layouts/header.php') ?>

<link rel="stylesheet" href="<?= SCRIPT_ROOT ?>back-office/styles-bo.css">
<div class="container_bo">
    <form action="" method="post">

        <h1>Formulario de sedes</h1>
        <label for="name">Nombre:</label>
        <input type="text" name="name" value="<?= $datos_formulario && $datos_formulario['nombre'] ? $datos_formulario['nombre'] : "" ?>" id="name" maxlength="30" pattern="^[a-zA-Z ]*" required>
        <br>
        <label for="address">Dirección:</label>
        <input type="text" name="address" value="<?= $datos_formulario && $datos_formulario['direccion'] ? $datos_formulario['direccion'] : "" ?>" id="address" maxlength="100" required>
        <br>
        <label for="city">Municipio:</label>
        <input type="text" name="city" value="<?= $datos_formulario && $datos_formulario['municipio'] ? $datos_formulario['municipio'] : "" ?>" id="city" maxlength="100" required>
        <br>
        <label for="department">departamento:</label>
        <input type="text" name="department" value="<?= $datos_formulario && $datos_formulario['departamento'] ? $datos_formulario['departamento'] : "" ?>" id="department" maxlength="100" required>
        <br>
        <label for="phone">Telefono:</label>
        <input type="text" name="phone" value="<?= $datos_formulario && $datos_formulario['telefono'] ? $datos_formulario['telefono'] : "" ?>" id="phone" maxlength="100" required>
        <br>
        <label for="hour">Horario:</label>
        <input type="text" name="hour" value="<?= $datos_formulario && $datos_formulario['horario'] ? $datos_formulario['horario'] : "" ?>" id="hour" maxlength="100" required>
        <br>
        <label for="description">Descripcion:</label>
        <textarea type="text" name="description" id="description" maxlength="1000" cols="50" rows="8" required ><?= $datos_formulario && $datos_formulario['descripcion'] ? $datos_formulario['descripcion'] : "" ?> </textarea>
        
        

        <input type="hidden" name="id" value="<?= $datos_formulario && $datos_formulario['id'] ? $datos_formulario['id'] : "" ?>">


        <div>
            <a class="btn" href="<?= SCRIPT_ROOT ?>back-office/admin/sedes/lista.php">Regresar</a>
            <input type="submit" name="Guardar" value="Guardar">
        </div>

    </form>
</div>
<?php include($_SERVER["DOCUMENT_ROOT"] . '/Proyecto/layouts/footer.php') ?>