<?php
$server = "localhost";
$pass = "";
$user = "root";
$db = "tienda";
//conexion
$con = mysqli_connect($server, $user, $pass, $db) or die("Error al conectarse a la base de datos");
$imagen = 'Assets/ImgPrueba/product-4-2.jpg';
$contenido = file_get_contents($imagen);
$contenido_binario = mysqli_real_escape_string($con, $contenido);
$sql = "UPDATE productos SET Img2 = '$contenido_binario' WHERE id = 4";
mysqli_query($con, $sql);
