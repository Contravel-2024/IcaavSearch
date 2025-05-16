<?php

use Funciones\SYBASE;

include_once "vendor/autoload.php";
include_once "cors.php";

// $data = "Hola";
// echo $data;
$data = SYBASE::obtenerFormasPagos();

echo $data;
