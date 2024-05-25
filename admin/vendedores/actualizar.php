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
        $nom = $_POST['nom'];
        $pat = $_POST['pat'];
        $mat = $_POST['mat'];
        $tel = $_POST['tel'];
        $con_sql = "UPDATE vendedor SET nombre='$nom',paterno='$pat',materno='$mat',telefono='$tel' WHERE idvendedores='$cod'";
        $resm = mysqli_query($db, $con_sql); // Corregido el uso de la variable $b
        if($resm){
            echo "<script>
                    window.alert('registro modificado con exito');
                    window.location='listado.php';
                  </script>"; // Agregado el punto y coma al final del script
        }
    }
?>

<main class="contenedor seccion">
    <h1>MODIFICAR VENDEDOR</h1>

    <?php
        $consultar = "SELECT * FROM vendedor WHERE idvendedores='$cod'"; // Corregido el nombre de la variable
        $res = mysqli_query($db, $consultar); // Corregido el nombre de la variable
        while ($fila = mysqli_fetch_array($res)) 
        {
    ?>
    <form action="actualizar.php?cod=<?php echo $fila['idvendedores']; ?>" method="post">
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <td>Nombre</td>
                <td><input type="text" class="form-control" name="nom" id="nom" value="<?php echo $fila['nombre'];?>"> </td>
            </tr>
            <tr>
                <td>Paterno</td>
                <td><input type="text" class="form-control" name="pat" id="pat" value="<?php echo $fila['paterno'];?>"> </td>
            </tr>
            <tr>
                <td>Materno</td>
                <td><input type="text" class="form-control" name="mat" id="mat" value="<?php echo $fila['materno'];?>"> </td>
            </tr>
            <tr>
                <td>Telefono</td>
                <td><input type="text" class="form-control" name="tel" id="tel" value="<?php echo $fila['telefono'];?>"> </td>
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
