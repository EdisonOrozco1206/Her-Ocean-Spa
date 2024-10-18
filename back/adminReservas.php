<?php
    $records = mysqli_query($connect, "SELECT * FROM reservas ORDER BY id DESC");
    $servicios = mysqli_query($connect, "SELECT * FROM servicios ORDER BY id DESC");
    $usuarios = mysqli_query($connect, "SELECT * FROM usuarios ORDER BY id DESC");
?>

<div class="reservas-container agregar-servicio">
    <h1>Listado de reservas</h1>
    <?php if(mysqli_num_rows($records) >= 1): ?>
        <table class="reservas-table">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Servicio</th>
                    <th>Sede</th>
                    <th>Metodo de pago</th>
                    <th>Estado</th>
                    <th>Fecha hora</th>
                    <th>Precio total</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($records as $r): ?>
                    <tr>
                        <td>
                            <?php foreach($usuarios as $u): ?>
                                <?php if($u['id'] == $r['id_cliente']): ?>
                                    <p><?= $u['nombre'] ?> <?= $u['apellido'] ?></p>
                                    <p><?= $u['correo'] ?></p>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </td>
                        <td>
                            <?php foreach($servicios as $s): ?>
                                <?php if($s['id'] == $r['id_servicio']): ?>
                                    <p><?= $s['nombre'] ?></p>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </td>
                        <td><?= $r['sede'] ?></td>
                        <td>
                            <?php if($r['m_pago'] == "T"): ?>
                                <p>Transferencia</p>
                            <?php elseif($r['m_pago'] == "E"): ?>
                                <p>Efectivo</p>
                            <?php elseif($r['m_pago'] == "TD"): ?>
                                <p>Tarjeta</p>
                            <?php endif; ?>
                        </td>
                        <td><?= $r['estado'] ?></td>
                        <td><?= $r['fecha_hora'] ?></td>
                        <td>$ <?= $r['precio_total'] ?></td>
                        <td><a href="back/editarReserva.php?id=<?= $r['id'] ?>" style="color: blue;">Editar</a></td>
                        <td><a href="back/eliminarReserva.php?id=<?= $r['id'] ?>" style="color: red;">Eliminar</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <tr>
            <p style="text-align: center; font-weight: bolder; margin-bottom: 10px;">No se han encontrado reservas</p>
            <hr>
        </tr>
    <?php endif;?>

</div>