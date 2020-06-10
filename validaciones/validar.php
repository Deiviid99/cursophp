<?php
    if (isset($_POST["btnEnviar"])) {
        $nombreUsu = $_POST["txtNombre"];
        $edadUsu = $_POST["txtEdad"];

        if ($nombreUsu == "David Heredia" && $edadUsu=20) {
            echo "<script>alert('Es correcto');location='../ejemplos/operadoresComparacion.php';</script>";
        } else {
            echo "<script>alert('Es incorrecto');location='../ejemplos/operadoresComparacion.php';</script>";
        }
    }
    ?>