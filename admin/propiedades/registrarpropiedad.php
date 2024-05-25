<?php
    session_start();
    $auth=$_SESSION['login'];
    if(!$auth){
        header('location:/dia5/bienes');
    }
    require '../../includes/config/database.php';
    $db=conectarDB();
    if ($_POST) {
        $t=$_POST['tit'];
        $p=$_POST['pre'];
        $d=$_POST['des'];
        $h=$_POST['hab'];
        $w=$_POST['wc'];
        $e=$_POST['est'];
        $v=$_POST['ven'];
        $i=$_FILES['ima']['name'];

        $con_sql = "INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, idevendedores, imagen, estado, creado) VALUES ('$t','$p','$d','$h','$w','$e','$v','$i','Activo','2024-04-22')";
        $res = mysqli_query($db, $con_sql);
        if ($res) {
            $tmp = $_FILES['ima']['tmp_name'];
            @copy($tmp, 'imagenes/'.$i);
?>
            <script>
                alert('Se registró');
                location.href = 'listado.php';
            </script>
<?php
        } else {
            echo "ERROR";
        }
    }
?>