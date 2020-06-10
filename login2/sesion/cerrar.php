<?php
//REANUDO LA SESION
session_start();
//CIERRO LA SESION
session_destroy();
header("location:../login.php");
