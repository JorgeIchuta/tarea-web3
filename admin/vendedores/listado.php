<?php
    session_start();
    $auth=$_SESSION['login'];
    if(!$auth){
        header('location:/dia5/bienes');
    }
    require '../../includes/config/database.php';
    $db = conectarDB();

    require '../../includes/funciones.php';
    incluirTemplate('header');
?>
<main class="contenedor Seccion">
    <a href="/dia5/bienes/admin/vendedores/crear.php" class="boton boton-verde">Nuevo Vendedor</a>
    <h1>Listado de vendedores</h1>
    <table class="table table-lg">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Paterno</th>
                <th>Materno</th>
                <th>Telefono</th>
                <th colspan="2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $con_sql = 'SELECT * FROM vendedor';
            $res = mysqli_query($db, $con_sql);
            while ($reg = mysqli_fetch_assoc($res)) {
                ?>
                <tr>
                    <td><?php echo $reg['idvendedores']; ?></td>
                    <td><?php echo $reg['nombre']; ?></td>
                    <td><?php echo $reg['paterno']; ?></td>
                    <td><?php echo $reg['materno']; ?></td>
                    <td><?php echo $reg['telefono']; ?></td>
                    <td><a class="btn btn-danger" href="borrar.php?cod=<?php echo $reg['idvendedores']; ?>" role="button">Eliminar</a></td>
                    <td><a class="btn btn-primary" href="actualizar.php?cod=<?php echo $reg['idvendedores']; ?>" role="button">Modificar</a></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</main>

<?php
    incluirTemplate('footer');
?>
