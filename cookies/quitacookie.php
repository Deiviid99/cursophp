<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    //ELIMINAR UNA COOKIE ES CON UN TIEMPO NEGATIVO
    setcookie("prueba", "Esta es la informacion de la cookie jeje.", time() - 1, "/cursoPhp/cookies/contenidos/");


    ?>
</body>

</html>