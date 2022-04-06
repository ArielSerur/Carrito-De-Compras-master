<?
$server = "localhost";
$db = "carrito_tutorial";
$user = "root";
$pass = "";

try {
    $conexion = new PDO("mysql:host=$server;dbname=" . $db, $user, $pass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Conexión realizada Satisfactoriamente";
} catch (\Throwable $th) {
    //throw $th;
}
