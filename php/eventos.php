<!doctype html>

<?php
session_start();

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eventos</title>
    <link rel="stylesheet" href="../css/materialize.min.css">
    <link rel="stylesheet" href="../css/principal.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

<div class=" col s12 m11 l11   titulo ">
    <div class="section ">


        <div class="row container">
            <img class="logo" src="../img/cotorreala-logo.png" alt="">
        </div>
    </div>
</div>

<?php
require_once 'conexion.php';
$query = "SELECT * FROM `eventos` e JOIN `tipo_evento` t ON e.id_tipo = t.id WHERE e.usuarios_id=".$_SESSION['idu'];
$res = $connect->query($query);
$user= $_SESSION['nombres'];
$table = '';
while ($row = mysqli_fetch_array($res)){
    $table .='<tr>';
    $table .= " <td>$row[idevento] </td> ";
    $table .= " <td>$user </td> ";
    $table .= " <td>$row[tipo] </td> ";
    $table .= " <td>$row[fecha_inicio] </td> ";
    $table .= " <td> <a href=\"creaEvento.php?id=$row[ide]\"><i class=\"small material-icons\">language</i></a> </td> ";
    $table .= " <td> <a href=\"eventos.php?id=$row[ide]&idborrar=3\" onclick='return confirmar()'  ><i class=\"small material-icons red\" >assignment_late</i></a> </td> ";


    $table .='</tr>';

}
extract($_GET);
if(@$idborrar==3){

    $sqlborrar="DELETE FROM `eventos`  WHERE  ide=$id";
    $resborrar=$connect->query($sqlborrar);
    echo '<script>alert("EVENTO ELIMINADO")</script> ';

    echo "<script>location.href='eventos.php'</script>";
}
?>

<script type="text/javascript">

    function confirmar()
    {
        if(confirm('¿Realmente desea eliminar?'))
            return true;
        else
            return false;
    }

</script>

<table id="example" class=" col s12 m8 striped" >
<thead>
<tr>
    <th>#</th>
    <th>Organizador</th>
    <th>Tipo de evento</th>
    <th>Fecha de inicio</th>
    <th>Ver evento</th>
    <th>Eliminar</th>
</tr>
</thead>

<tbody>
<?php
echo $table;
?>
</tbody>






</table>


<div class="fixed-action-btn horizontal menu">
    <a class="btn-floating btn-large black pulse">
        <i class="large material-icons">menu</i>
    </a>
    <ul>
        <li><a href="cerrar_session.php" class="btn-floating green tooltipped" data-position="top" data-delay="50" data-tooltip="Cerrar sesion"><i class="material-icons">power_settings_new</i></a></li>
        <li><a href="principal.php" class="btn-floating blue tooltipped" data-position="top" data-delay="50" data-tooltip="Crear evento"><i class="material-icons"  >language</i></a></li>
    </ul>
</div>

<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/materialize.min.js"></script>
<script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>


<script>

    $(document).ready(function() {
        $('#example').DataTable();
    } );

</script>

</body>
</html>