<?php

require_once("model/proveedores_model.php");
$proveedores = new Proveedores_model();
$listaproveedores = $proveedores->getProveedores();
require_once("view/proveedores_view.php");
