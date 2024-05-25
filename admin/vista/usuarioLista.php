<?php
    require '../../includes/funciones.php';
    incluirTemplate('header');
?>

<main class="contenedor seccion">
    <a href="/dia5/bienes/admin" class="boton boton-verde">Volver</a>
    <h1>LISTA DE USUARIOS</h1>
    <table class="table table-striped">
        <tr>
            <td>ID</td>
            <td>EMAIL</td>
        </tr>
        <?php
            while($reg=mysqli_fetch_array($res)){
                echo "<tr>";
                echo "<td>".$reg['id']."</td>";
                echo "<td>".$reg['email']."</td>";
                echo "<td><a href='../controlador/usuarioElimina.php?cod=".$reg['id']."' class='btn btn-danger'>Eliminar</a></td>";
                echo "<td><a href='../controlador/usuarioModifica.php?cod=".$reg['id']."' class='btn btn-success'>Modificar</a></td>";
                echo "</tr>";
            }
        ?>
    </table>
</mail>
<?php
incluirTemplate('footer');
?>
