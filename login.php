<?php
    require 'includes/config/database.php';
    $db = conectarDB();
    $errores = [];

    
    // Autenticar el usuario
    if ($_SERVER['REQUEST_METHOD'] = 'POST') {
        /*echo "<pre>";
        var_dump($_POST);
        echo "</pre>";*/
        $e = mysqli_real_escape_string($db,$_POST['email']);
        $p = mysqli_real_escape_string($db,$_POST['pass']);
        if (!$e) {
            $errores[]="El email es obligatorio";
        }
        if (!$p) {
            $errores[]="El password es obligatorio";
        }
        if(empty($errores)){
            $con_sql="SELECT * FROM usuarios WHERE email='$e'";
            echo $con_sql;
            $res=mysqli_query($db,$con_sql);
            //var_dump($res);
            if ($res->num_rows) {
                //revisar si el password es correcto
                $usuario=mysqli_fetch_array($res);
                //var_dump($usuario);
                $auth=password_verify($p,$usuario['password']);
                //var_dump($auth);
                if ($auth) {
                    session_start();
                    //llenar el arreglo de la sesion
                    $_SESSION['usuarios']=$usuario['email'];
                    $_SESSION['login']=true;
                    /*echo "<pre>";
                    var_dump($_SESSION);
                    echo "</pre>";*/
                    header("location:/dia5/bienes/admin");
                }else{
                    $errores[]="El password es incorecto";
                }
            }else{
                $errores[]="El usuario no existe";
            }
        }
        
    }
    

    require 'includes/funciones.php';
    incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesion</h1>
    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach;   ?>


    <form method="post" action="" class="formulario">
        <fieldset>
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" placeholder="Tu email">
            <label for="telefono">Password</label>
            <input type="password" name="pass" id="pass" placeholder="Tu password">
        </fieldset>
        <input type="submit" value="Iniciar Sesion" class="boton boton-verde">
    </form>
</main>


<?php
    incluirTemplate('footer');
?>

