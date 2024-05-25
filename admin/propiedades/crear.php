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
    <h1>Crear</h1>
    <a href="/dia5/bienes/admin/index.php" class="boton boton-verde">Volver</a>
    <form method="post" action="registrarpropiedad.php" class="formulario" enctype="multipart/form-data">
        <fieldset>
            <legend>Información General</legend>
            <label for="tit">Título:</label>
            <input type="text" name="tit" id="tit" placeholder="Título Propiedad"><br>
            <label for="pre">Precio:</label>
            <input type="number" name="pre" id="pre" placeholder="Precio Propiedad"><br>
            <label for="ima">Imagen:</label>
            <input type="file" name="ima" id="ima" accept="image/jpeg, image/png"><br>
            <label for="des">Descripción:</label>
            <textarea name="des" id="des" cols="30" rows="10"></textarea><br>
        </fieldset>
        <fieldset>
            <legend> Información de la Propiedad </legend>
            <label for="hab">Habitaciones:</label>
            <input type="number" name="hab" id="hab" placeholder="Ej. 3" min="1" max="20"><br>
            <label for="wc">Baños:</label>
            <input type="number" name="wc" id="wc" placeholder="Ej. 3" min="1" max="20"><br>
            <label for="est">Estacionamiento:</label>
            <input type="number" name="est" id="est" placeholder="Ej. 3" min="1" max="9"><br>
        </fieldset>
        <fieldset>
            <legend>Vendedor</legend>
            <select name="ven" id="ven">
                <?php
                    $con_sql = 'SELECT * FROM vendedor';
                    $res = mysqli_query($db, $con_sql);
                    while ($reg = mysqli_fetch_assoc($res)) {
                ?>
                <option value="<?php echo $reg['idvendedores']; ?>">
                    <?php echo $reg['nombre'] . " " . $reg['paterno'] . " " . $reg['materno']; ?>
                </option>
                <?php } ?>
            </select>
        </fieldset>
        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>
</main>

<?php
    incluirTemplate('footer');
?>

