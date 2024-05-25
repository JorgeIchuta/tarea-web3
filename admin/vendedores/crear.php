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
        <h1>Crear vendedor</h1>
        <a href="/dia5/bienes/admin/index.php" class="boton boton-verde">Volver</a>
        <form method="post" action="/dia5/bienes/admin/vendedores/registrarvendedor.php" class="formulario">
            <fieldset>
                <legend>Informacion General</legend>
                <label for="">Nombre</label>
                <input type="text" name="nom" id="nom" placeholder="Nombre">
                <label for="">Paterno</label>
                <input type="text" name="pat" id="pat" placeholder="Paterno">
                <label for="">Materno</label>
                <input type="text" name="mat" id="mat" placeholder="Materno">
                <label for="">Telefono</label>
                <input type="number" name="tel" id="tel" placeholder="Telefono">
            </fieldset>
            <input type="submit" value="Registrar Vendedor" class="boton boton-verde">
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>