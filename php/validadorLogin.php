<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 14/05/2017
 * Time: 12:44 PM
 */


require("conexion.php");

session_start();

if(isset($_SESSION["idu"])){
    header("Location: principal.php");
}

if(!empty($_POST))
{
    $email = mysqli_real_escape_string($connect,$_POST['email']);
    $pw = mysqli_real_escape_string($connect,$_POST['pw']);
    $error = '';



    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND pw = '$pw'";
    $result=$connect->query($sql);
    $rows = $result->num_rows;

    if($rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['email'] = $row['email'];
        $_SESSION['idu'] = $row['idu'];
        $_SESSION['nombres'] = $row['nombres'];

        //$_SESSION['tipo_usuario'] = $row['id_tipo'];

        header("location: eventos.php");
    } else {
        echo "<script> alert('El email o contraseña son incorrectos') </script>";
        echo "<script>location.href='../index.php'</script>";

        //$error = "El nombre o contraseña son incorrectos";
    }
}

?>