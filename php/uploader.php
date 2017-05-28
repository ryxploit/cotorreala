<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form enctype="multipart/form-data" action="" method="POST">
    <input name="uploadedfile" type="file" />
    <input type="submit" value="Subir archivo" />

    <?php
    $target_path = "../uploads/";
    $target_path = $target_path . basename( $_FILES['uploadedfile']['name']); if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) { echo "El archivo ". basename( $_FILES['uploadedfile']['name']). " ha sido subido";
        $file_name=$_FILES['uploadedfile']['name'];
       echo "<img style='height: 100px;width: 100px;' src='../uploads/$file_name' >";

    } else{
        echo "Ha ocurrido un error, trate de nuevo!";
    }
    ?>


</form>
</body>
</html>
