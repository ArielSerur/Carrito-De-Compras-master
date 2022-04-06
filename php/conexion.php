<?php
$servidor = "localhost";
$nombreBd = "carrito_tutorial";
$usuario = "root";
$pass = "";
$conexion = new mysqli($servidor, $usuario, $pass, $nombreBd);
if ($conexion->connect_error) {
    die("No se puede conectar");
    //es como un break que frena todo codigo posterior
}
