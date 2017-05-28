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
    <title>Principal</title>
    <link rel="stylesheet" href="../css/materialize.min.css">
    <link rel="stylesheet" href="../css/principal.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/jquery.timepicker.css">
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




<div class=" col s12 m12">
    <div class="row container">


        <form enctype="multipart/form-data" action="G_evento.php" method="POST">

            <div class="row">
                <div class="input-field col s6">
                    <input name="ubicacion" value="" id="ubicacion" type="text" class="validate">
                    <label class="active" for="ubicacion">Ubicacion</label>
                </div>
            </div>

            <?php
            require("conexion.php");

            $query = "SELECT DISTINCT id,tipo FROM tipo_evento";
            $res = $connect->query($query);
            $option = '';
            while ($row = mysqli_fetch_array($res)){
                $option .= " <option value=\"$row[id]\" > $row[tipo] </option> ";
            }

            ?>
            <select name="id_tipo">
                <option value="-" disabled selected>Seleccione tipo de evento</option>
                <?php
                echo $option;
                ?>
            </select>

            <div class="row">
                <div class="input-field col s6">
                    <input name="nombre" value="" id="nombre" type="text" class="validate">
                    <label class="active" for="nombre">Nombre del evento</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input name="titulo" value="" id="titulo" type="text" class="validate">
                    <label class="active" for="titulo">Titulo del evento</label>
                </div>
            </div>

            <div class="row col s12 m9">
                <p id="datepairExample">
                    <label for="nombre_evento"  >Fecha de inicio</label>
                    <input type="date"  name="fecha_inicio">
                    <label for="nombre_evento" >Hora de inicio</label>
                    <input type="text" class="time start" name="hora_inicio"/>
                    <label for="nombre_evento" >Hora de finalizacion</label>
                    <input type="text" class="time end" name="hora_fin"/>
                    <label for="nombre_evento" >Fecha de finalizacion</label>
                    <input type="date"  name="fecha_fin">
                </p>
            </div>

            <br>
            <input  class="waves-effect waves-light btn" name="uploadedfile" type="file" /><br>
            <br>


            <div class="row">
                <div class="input-field col s12">
                    <textarea name="descripcion" id="descripcion" class="materialize-textarea"></textarea>
                    <label for="textarea1">Descripcion</label>
                </div>
            </div>



            <input class="waves-effect waves-light btn" type="submit" value="Guardar evento" /><br>
        </form>

</div>
</div>


<div class="fixed-action-btn horizontal menu">
    <a class="btn-floating btn-large black pulse">
        <i class="large material-icons">menu</i>
    </a>
    <ul>
        <li><a href="eventos.php" class="btn-floating green tooltipped" data-position="top" data-delay="50" data-tooltip="Cerrar sesion"><i class="material-icons">power_settings_new</i></a></li>
    </ul>
</div>



<script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/jquery.timepicker.min.js"></script>
<script src="../js/materialize.min.js"></script>

<script>
    $(document).ready(function() {
        $('select').material_select();
    });
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });
    // initialize input widgets first
    $('#datepairExample .time').timepicker({
        'showDuration': true,
        'timeFormat': 'g:ia'
    });

    $('#datepairExample .date').datepicker({
        'format': 'yyyy-m-d',
        'autoclose': true
    });

    // initialize datepair
    $('#datepairExample').datepair();

    $(document).ready(function() {
        Materialize.updateTextFields();
    });

</script>

</body>
</html>