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

<main class="contenedor seccion">
    <h1>Borrar</h1>
</main>

<?php
$cod = $_GET['cod'];
$con_sql = "UPDATE propiedades SET estado='Inactivo' WHERE id='$cod'";
$res = mysqli_query($db, $con_sql);
if ($res) {
    echo "
        <script>
            alert('Se eliminó');
            location.href='listado.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('No se eliminó');
        </script>
    ";
}
?>

<?php
incluirTemplate('footer');
?>
