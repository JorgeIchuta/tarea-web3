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

    $cod = $_GET['cod']; // Corregido el uso de los corchetes
    if(isset($_POST['Modificar'])){
        $tit = $_POST['tit'];
        $pre = $_POST['pre'];
        $ima = $_POST['ima'];
        $des = $_POST['des'];
        $hab = $_POST['hab'];
        $wc = $_POST['wc'];
        $est = $_POST['est'];
        $ven = $_POST['ven'];
        $con_sql = "UPDATE propiedades SET titulo='$tit',precio='$pre',imagen='$ima',descripcion='$des',habitaciones='$hab',wc='$wc',estacionamiento='$est',vendedor='$ven' WHERE idevendedores='$cod'";
        $resm = mysqli_query($db, $con_sql); 
        if($resm){
            echo "<script>
                    window.alert('registro modificado con exito');
                    window.location='listado.php';
                  </script>"; 
        }
    }
?>

<main class="contenedor seccion">
    <h1>MODIFICAR PROPIEDAD Xb</h1>

    <?php
        $consultar = "SELECT * FROM propiedades WHERE idevendedores='$cod'"; 
        $res = mysqli_query($db, $consultar); // Corregido el nombre de la variable
        while ($fila = mysqli_fetch_array($res)) 
        {
    ?>
    <form action="actualizar.php?cod=<?php echo $fila['idevendedores']; ?>" method="post">
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <td>Titulo</td>
                <td><input type="text" class="form-control" name="tit" id="tit" value="<?php echo $fila['titulo'];?>"> </td>
            </tr>
            <tr>
                <td>Precio</td>
                <td><input type="number" class="form-control" name="pre" id="pre" value="<?php echo $fila['precio'];?>"> </td>
            </tr>
            <tr>
                <td>Imagen</td>
                <td><input type="file" class="form-control" name="ima" id="ima" value="<?php echo $fila['imagen'];?>"> </td>
            </tr>
            <tr>
                <td>Descripcion</td>
                <td><input type="text" class="form-control" name="des" id="des" value="<?php echo $fila['descripcion'];?>"> </td>
            </tr>
            <tr>
                <td>Nro Habitaciones</td>
                <td><input type="number" class="form-control" name="hab" id="hab" value="<?php echo $fila['habiatciones'];?>"> </td>
            </tr>
            <tr>
                <td>Banos</td>
                <td><input type="number" class="form-control" name="wc" id="wc" value="<?php echo $fila['wc'];?>"> </td>
            </tr>
            <tr>
                <td>Estacionamiento</td>
                <td><input type="number" class="form-control" name="est" id="est" value="<?php echo $fila['estacionamiento'];?>"> </td>
            </tr>
            <tr>
                <td colspan="3"><div align="center"><input type="submit" name="Modificar" id="Modificar" value="Modificar" class="btn btn-primary"></div></td>
            </tr>
    <?php
        }
    ?>
        </table>
    </form>
</main>

<?php
    incluirTemplate('footer');
?>
</html>
