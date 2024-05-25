<?php
    session_start();
    $auth=$_SESSION['login'];
    if(!$auth){
        header('location:/dia5/bienes');
    }
    require '../../includes/config/database.php';
    $db=conectarDB();

    require '../../includes/funciones.php';
    incluirTemplate('header');
?>


<main class="contenedor seccion">
    <h1>Eliminar</h1>
    <?php
        $id=$_GET['cod'];
        $con="DELETE FROM vendedor WHERE idvendedores=$id";
        $res=mysqli_query($db,$con);
        if($res){
            echo "se elimino";
        }else {
            echo "no se elimino";
        }
    ?>
</main>
<?php
    incluirTemplate('footer');
?>