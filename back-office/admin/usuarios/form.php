<?php
include($_SERVER["DOCUMENT_ROOT"] . '/her-ocean-spa/database/bd.php');

$datos_formulario = array();

if (isset($_GET['id'])) {
    $query = mysqli_query($connect, "SELECT * FROM usuarios WHERE id = " . $_GET['id']);
    $data = mysqli_fetch_assoc($query);
    $datos_formulario = $data;
}


if (isset($_POST['Guardar'])) {
    if (isset($_POST['id']) && $_POST['id'] != "") {
        $query = mysqli_query(
            $connect,
            "UPDATE usuarios SET 
             nombre = '{$_POST["name"]}',
             apellido = '{$_POST['lastname']}',
             correo ='{$_POST['email']}',
             clave ='{$_POST['password']}',
             f_nacimiento ='{$_POST['date']}',
             perfil ='{$_POST['profile']}' WHERE  id = {$_POST['id']};"

        );
    } else {
        $query = mysqli_query(
            $connect,
            "INSERT INTO usuarios (id,nombre,apellido,correo,clave,f_nacimiento,perfil) VALUES (0,'" . $_POST['name'] . "','" . $_POST['lastname'] . "','" . $_POST['email'] . "','" . $_POST['password'] . "','" . $_POST['date'] . "'," . $_POST['profile'] . ")"
        );
    }
    if ($query) {


        echo "
        <script>
        confirm('registro exitoso');
        window.location.href = '" . SCRIPT_ROOT . "back-office//admin/usuarios/lista.php';
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

<?php include($_SERVER["DOCUMENT_ROOT"] . '/her-ocean-spa/layouts/header.php') ?>

<link rel="stylesheet" href="<?= SCRIPT_ROOT ?>back-office/styles-bo.css">
<div class="container_bo">
    <form action="" method="post">

        <h1>Formulario de Usuario</h1>
        <label for="name">Nombre:</label>
        <input type="text" name="name" value="<?= $datos_formulario && $datos_formulario['nombre'] ? $datos_formulario['nombre'] : "" ?>" id="name" maxlength="30" pattern="^[a-zA-Z ]*" required>
        <br>
        <label for="lastname">Apellido:</label>
        <input type="text" name="lastname" value="<?= $datos_formulario && $datos_formulario['apellido'] ? $datos_formulario['apellido'] : "" ?>" id="lastname" pattern="^[a-zA-Z ]*" maxlength="30" required>
        <br>
        <label for="email">Correo electrónico:</label>
        <input type="email" name="email" value="<?= $datos_formulario && $datos_formulario['correo'] ? $datos_formulario['correo'] : "" ?>" id="email" required>
        <br>
        <label for="date">fecha de nacimiento:</label>
        <input type="date" name="date" value="<?= $datos_formulario && $datos_formulario['f_nacimiento'] ? $datos_formulario['f_nacimiento'] : "" ?>" id="date" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" value="<?= $datos_formulario && $datos_formulario['clave'] ? $datos_formulario['clave'] : "" ?>" id="password" minlength="5" required>
        <br>
        <label for="profile">Perfil:</label>
        <select name="profile" id="profile">
            <option value="" disabled
                <?= !$datos_formulario  ? 'selected' : ''  ?>>
                Seleccione una opción
            </option>
            <option value="0" <?= $datos_formulario && $datos_formulario['perfil'] && ($datos_formulario['perfil'] == "0") ? 'selected' : ''  ?>>
                Administrador
            </option>
            <option value="1" <?= $datos_formulario && $datos_formulario['perfil'] && ($datos_formulario['perfil'] == "1") ? 'selected' : ''  ?>>
                Cliente
            </option>
        </select>
        <input type="hidden" name="id" value="<?= $datos_formulario && $datos_formulario['id'] ? $datos_formulario['id'] : "" ?>">


        <div>
            <a class="btn" href="<?= SCRIPT_ROOT ?>back-office/admin/usuarios/lista.php">Regresar</a>
            <input type="submit" name="Guardar" value="Guardar">
        </div>

    </form>
</div>
<?php include($_SERVER["DOCUMENT_ROOT"] . '/her-ocean-spa/layouts/footer.php') ?>