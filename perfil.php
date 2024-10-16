<?php
    include('layouts/header.php');
    include("database/bd.php");

    if(!isset($_SESSION['user']) || empty($_SESSION['user'])){
        header("Location: index.php");
    }
    
    if(isset($_POST) && !empty($_POST)){
        $id = $_SESSION['user']['id'];
        $nombre = isset($_POST['nombre']) && !empty($_POST['nombre']) ? $_POST['nombre'] : '';
        $apellido = isset($_POST['apellido']) && !empty($_POST['apellido']) ? $_POST['apellido'] : '';
        $correo = isset($_POST['correo']) && !empty($_POST['correo']) ? $_POST['correo'] : '';
        $clave = isset($_POST['clave']) && !empty($_POST['clave']) ? $_POST['clave'] : '';

        if($nombre && $apellido && $correo && $clave){
            $sql = "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', correo = '$correo', clave = '$clave' WHERE id = $id";
            $data = mysqli_query($connect, $sql);

            if($data){
                $newUserSQL = "SELECT * FROM usuarios WHERE id = $id";    
                $newUser = mysqli_query($connect, $newUserSQL);
                $userdata = array();

                while($row = mysqli_fetch_assoc($newUser)){
                    $userdata[] = $row;
                }

                $_SESSION['user'] = $userdata[0];
                header("Location: index.php");
            }
        }

        header("Location: index.php");
    }
?>

<div class="servicios-container agregar-servicio">
    <h1>Perfil de usuario</h1>
    <a href="cerrarSesion.php" class="agregar-servicio-button">Cerrar sesión</a>
    <form action="" method="POST">
        <div>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" value="<?= $_SESSION['user']['nombre'] ?>">
        </div>

        <div>
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" value="<?= $_SESSION['user']['apellido'] ?>">
        </div>

        <div>
            <label for="correo">Correo</label>
            <input type="email" name="correo" value="<?= $_SESSION['user']['correo'] ?>">
        </div>

        <div>
            <label for="clave">Contraseña</label>
            <input type="text" name="clave" value="<?= $_SESSION['user']['clave'] ?>">
        </div>
        
        <input type="submit" value="Actualizar información">
    </form>
</div>

<?php include('layouts/footer.php') ?>
