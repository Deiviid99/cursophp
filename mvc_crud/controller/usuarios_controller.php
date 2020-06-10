<?php
//PARTE DESDE LA RAIZ INDEX
require_once("model/usuarios_model.php");
//INSTANCIAR A LA CLASE DEL MODELO
$usuarios = new Usuarios_model();
//ALMACENO EN UNA VARIABLE LO QUE DEVUELVE EL ARRAY CON LOS USUARIOS 
$listausuarios = $usuarios->getUsuarios();
//ACCEDE HACIA LA VISTA DEL USUARIO
require_once("view/usuarios_view.php");
