<?php

require("conexion.php");



if (isset($_POST[asis])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    $query = " INSERT INTO  `asistentes`(`nombre_completo`,`email`)VALUES ('$nombre','$email')";

    $resultado = $connect->query($query) || die("Ha ocurrido un error al guardar los datos");
    if ($resultado) {
        echo "<script> alert('Felicidades a quedado registrado') </script>";
        echo "<script>window.history.back();</script>";

        echo "<script>  document.getElementById('registrarse').disabled=true; </script>";
    } else {
        echo "<script> alert('Ha ocurrido un error') </script>";
        echo "<script>window.history.back();</script>";
    }
}

?>
