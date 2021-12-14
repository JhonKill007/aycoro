<?php

require("metadate/imagecreate.php");
$ancho_origin = imagesx($img_origin);
$alto_origin = imagesy($img_origin);
$ancho_limit = 720;
$alto_limit = 1080;

if ($opcion == 1 || $opcion == 4) {

    $ancho_origin = 750;
    $alto_origin = 750;

} else if ($opcion == 2) {

    $ancho_origin = 647;
    $alto_origin = 1080;
}
else if ($opcion == 5) {

    $ancho_origin = 1440;
    $alto_origin = 454;
}

$img_destino = imagecreatetruecolor($ancho_origin, $alto_origin);
imagecopyresized($img_destino, $img_origin, 0, 0, 0, 0, $ancho_origin, $alto_origin, imagesx($img_origin), imagesy($img_origin));
require("metadate/imagefomate_and.php");
