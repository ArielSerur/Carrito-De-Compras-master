<?

require 'conexionPdo.php';
$mensaje = "";


if (!empty($_POST['email']) && !empty($_POST['password'])) {

    // $sql = "INSERT INTO usuario (`email`, `password`) VALUES ('email', 'password')";
    // $stmt = $conexion->prepare($sql);
    // $stmt::bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    // $stmt::bindParam(':password', $password);
    $sql = "INSERT INTO usuario (email,password) VALUES ('{$_POST["email"]}','{$password}')";
    $stmt = $conexion->prepare($sql);
    if ($stmt->execute()) {
        $mensaje = "Todo se envio bien";
    } else {
        $mensaje = "Se envio mal la contraseña";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="fonts/icomoon/style.css"> -->

    <link rel="stylesheet" href="/Carrito-De-Compras-master/css/bootstrap.min.css">

    <!-- <link rel="stylesheet" href="css/style.css"> -->
</head>

<body class="text-center">

    <?php if (!empty($mensaje)) : ?>
        <p><?= $mensaje ?></p>
    <? endif; ?>

    <h1>Crea tu cuenta!</h1>
    <form action="singup.php" method="POST">
        <div class="justify">
            <div class="badge badge-primary text-wrap justify ">
                <label for="email" class="">Email</label> <br>
                <input type="email" name="email" col=30 placeholder="Inserte email">
            </div>
            <br>
            <div class="badge badge-primary text-wrap">
                <label for="contra">Contraseña</label> <br>
                <input type="password" name="password" placeholder="Inserte contraseña">
            </div>
            <br>
            <div class="badge badge-primary text-wrap">
                <label for="contraConfirmar">Confirmar Contraseña</label> <br>
                <input type="password" name="password2" id="pass" placeholder="Confirme contraseña">
            </div>
            <div>
                <button type="submit">Ingresar!</button>
            </div>
        </div>
    </form>
    <br><br>
    <span><a href="/Carrito-De-Compras-master/php/login.php">Ya estoy registrado!</a></span>
    <br><br>
    <a href="/Carrito-De-Compras-master/index.php">Volver al inico </a>
</body>

</html>