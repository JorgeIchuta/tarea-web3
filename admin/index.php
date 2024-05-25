<?php
    session_start();
    $auth=$_SESSION['login'];
    if(!$auth){
        header('location:/dia5/bienes');
    }
    require '../includes/funciones.php';
    incluirTemplate('header');
?>

<main class="contenedor Seccion">
    <h1>Administrador de Bienes Raíces</h1>
    <a href="/dia5/bienes/admin/vendedores/listado.php" class="boton boton-verde">Vendedores</a>
    <a href="/dia5/bienes/admin/propiedades/listado.php" class="boton boton-amarillo">Propiedades</a>
    <a href="/dia5/bienes/admin/controlador/usuarioLista.php" class="boton boton-verde">Usuarios</a>
    <a href="/dia5/bienes/admin/controlador/nuevo.php" class="boton boton-amarillo">Nuevo Usuario</a>
</main>

<?php
    incluirTemplate('footer');
?>
