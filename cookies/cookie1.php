<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    //CAPTURAR DATOS EN UNA COOKIE
    setcookie("prueba", "Esta es la informacion de la cookie jeje.", time() + 300, "/cursoPhp/cookies/contenidos/");
    ?>
    <a href="leercookie1.php">Ver contenido cookie1</a>
</body>

</html>