<?
session_start();

require 'conexionPdo.php';



if (!empty($_POST['email']) && !empty($_POST['password'])) {

    $recordar = $conexion->prepare("SELECT id, email, password FROM usuario WHERE email=:email ");
    $recordar->bindParam(':email', $_POST['EMAIL']);
    $recordar->execute();
    $resultado = $recordar->fetch(PDO::FETCH_ASSOC);

    $mensaje = "";

    if (count($resultado) > 0 && password_verify($_POST['password'], $resultado['password'])) {
        $_SESSION['user_id'] = $resultado['id'];
        // header('Location: /php-login');
    } else {
        $mensaje = 'Estas credenciales no coinciden';
    }
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logearse</title>
    <link rel="stylesheet" href="/Carrito-De-Compras-master/css/bootstrap.min.css">
</head>

<body class="text-center">


    <h1>Ingresa a tu cuenta!</h1>

    <?php if (!empty($mensaje)) : ?>
        <p><?= $mensaje ?></p>
    <? endif; ?>

    <form action="login.php" method="post">
        <div class="justify">
            <div class="badge badge-primary text-wrap justify ">
                <label for="email" class="">Email</label> <br>
                <input type="email" name="email" id="email" col=30 placeholder="Inserte email">
            </div>
            <p></p>
            <div class="badge badge-primary text-wrap">
                <label for="contra">Contraseña</label> <br>
                <input type="password" name="password" id="pass" placeholder="Inserte contraseña">
            </div>
            <div>
                <button type="submit">Ingresar!</button>
            </div>
        </div>
    </form>
    <br><br>
    <span><a href="/Carrito-De-Compras-master/php/singup.php">Necesito registrarme!</a></span>
    <br><br>
    <a href="/Carrito-De-Compras-master/index.php">Volver al inico </a>
</body>

</html>