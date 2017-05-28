<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 15/05/2017
 * Time: 04:42 PM
 */
session_start();
#Conexión con mysqli
require("conexion.php");


$ubicacion = $_POST['ubicacion'];
$id_tipo = $_POST['id_tipo'];
$nombre = $_POST['nombre'];
$titulo = $_POST['titulo'];
$fecha_inicio = $_POST['fecha_inicio'];
$hora_inicio = $_POST['hora_inicio'];
$hora_fin = $_POST['hora_fin'];
$fecha_fin = $_POST['fecha_fin'];
$target_path = "../uploads/";
$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path))
$descripcion = $_POST['descripcion'];
$organizador = $_SESSION['idu'];

$query = " INSERT INTO  `eventos`(`ubicacion`,`id_tipo`,`nombre`,`titulo`,`fecha_inicio`,`hora_inicio`,`hora_fin`,
                                  `fecha_fin`,`imagen`,`descripcion`,`usuarios_id`)VALUES ('$ubicacion',
                                  $id_tipo,'$nombre','$titulo','$fecha_inicio','$hora_inicio','$hora_fin','$fecha_fin','$target_path','$descripcion',
                                  '$organizador')";

$resultado = $connect -> query($query)|| die("Ha ocurrido un error al guardar los datos");
if($resultado)
{
    echo "<script> alert('evento guardado') </script>";
    echo "<script>location.href='eventos.php'</script>";
}
else
{
    echo "<script> alert('Ha ocurrido un error') </script>";
    echo "<script>location.href='principal.php'</script>";
}