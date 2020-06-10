<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (!$_COOKIE["idiomaSeleccionado"]) {
        header("location:idioma.php");
    } else if ($_COOKIE["idiomaSeleccionado"] == "es") {
        header("location:spanish.php");
    } else if ($_COOKIE["idiomaSeleccionado"] == "en") {
        header("location:english.php");
    }
    ?>
</body>

</html>