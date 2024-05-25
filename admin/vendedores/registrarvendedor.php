<?php
    session_start();
    $auth=$_SESSION['login'];
    if(!$auth){
        header('location:/dia5/bienes');
    }
    require '../../includes/config/database.php';
    $db=conectarDB();
    if($_POST){
        $n=$_POST['nom'];
        $p=$_POST['pat'];
        $m=$_POST['mat'];
        $t=$_POST['tel'];
        $con_sql="INSERT INTO vendedor (nombre,paterno,materno,telefono) VAlUES ('$n','$p','$m','$t')";
        $res=mysqli_query($db,$con_sql);
        if ($res) {
            // If registration is successful, redirect to listado.php
            header("Location: /dia5/bienes/admin/vendedores/listado.php");
            exit(); // Make sure to exit after redirection
        } else {
            echo "<script> alert ('No se Registró'); </script>";
        }
    }
?>