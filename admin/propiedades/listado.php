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
    <a href="/dia5/bienes/admin/propiedades/crear.php" class="boton boton-verde">Nuevo Propiedad</a>
    <h1>Listado de Propiedades</h1>
    <table class="table table-lg">
        <thead>
            <tr>
                <th>Id</th>
                <th>Vendedor</th>
                <th>titulo</th>
                <th>Precio</th>
                <th>descripcion</th>
                <th>No hab</th>
                <th>No Banos</th>
                <th>Estacionamiento</th>
                <th>Imagen</th>
                <th colspan="2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $con_sql = "SELECT p.*,v.* FROM propiedades p INNER JOIN vendedor v ON p.idevendedores=v.idvendedores WHERE estado='Activo'";
            $res = mysqli_query($db, $con_sql);
            while ($reg = mysqli_fetch_assoc($res)) {
                ?>
                <tr>
                    <td><?php echo $reg['id']; ?></td>
                    <td><?php echo $reg['nombre']. " ".$reg['paterno']; ?></td>
                    <td><?php echo $reg['titulo']; ?></td>
                    <td><?php echo $reg['precio']; ?></td>
                    <td><?php echo $reg['descripcion']; ?></td>
                    <td><?php echo $reg['habitaciones']; ?></td>
                    <td><?php echo $reg['wc']; ?></td>
                    <td><?php echo $reg['estacionamiento']; ?></td>
                    <td> <img src="imagenes/<?php echo $reg['imagen']; ?>"></td>
                    <td><a class="btn btn-danger" href="borrar.php?cod=<?php echo $reg['id']; ?>" role="button">Eliminar</a></td>
                    <td><a class="btn btn-primary" href="actualizar.php?cod=<?php echo $reg['id']; ?>" role="button">Modificar</a></td>
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
