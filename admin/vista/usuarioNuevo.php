<?php
    session_start();
    $auth=$_SESSION['login'];
    if(!$auth){
        header('location:/dia5/bienes');
    }
    require '../../includes/funciones.php';
    incluirTemplate('header');
?>
<main class="conetenedor seccion">
    <h1>Crear</h1>
    <a href="/dia5/bienes/admin/index.php" class="boton boton-verde">Volver</a>
    <form action="" method="post" class="formulario">
        <h1>REGISTRO DE USUARIOS</h1>
        <fieldset>
            <legend>Informacion General</legend>
            <label for="">Email</label>
            <input type="email" name="ema" id="ema">
            <label for="">Escriba Password</label>
            <input type="password" name="pas1" id="pas1">
            <label for="">Confirmar Password</label>
            <input type="password" name="pas2" id="pas2">
            <br><br>
            <input type="submit" name="registrar" value="Registrar Usuario" class="btn btn-primary">
            <a href="../controlador/usuarioLista.php" class="btn btn-danger">Cancelar</a>
        </fieldset>
    </form>
</main>
<?php
    incluirTemplate('footer');
?>
