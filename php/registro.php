<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 15/05/2017
 * Time: 04:42 PM
 */

#Conexión con mysqli
require("conexion.php");

$nombre=$_POST['nombre'];
$apellidos=$_POST['apellidos'];
$correo = $_POST['correo'];
$password=$_POST['password'];
$fecha_nacimiento=$_POST['fecha_nacimiento'];

#Insertar datos a través de la sentencia INSERT
$consulta = "INSERT INTO usuarios(nombres, apellidos, email, pw,fecha_nacimiento) VALUES('$nombre', '$apellidos', '$correo', '$password','$fecha_nacimiento')";
$resultado = $connect -> query($consulta)|| die("Ha ocurrido un error al guardar los datos");
if($resultado)
{
    echo "<script> alert('Felicidades ya puedes iniciar session') </script>";
    echo "<script>location.href='../index.php'</script>";
}
else
{
    echo "<script> alert('Ha ocurrido un error') </script>";
    echo "<script>location.href='../index.php'</script>";
}