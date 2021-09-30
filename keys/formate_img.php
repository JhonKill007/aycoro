<?php

require("metadate/imagecreate.php");
$ancho_origin = imagesx($img_origin);
$alto_origin = imagesy($img_origin);
$ancho_limit = 720;
$alto_limit = 1080;

if ($ancho_origin > $alto_origin) {

    $ancho_origin = $ancho_limit;
    $alto_origin = $ancho_limit * imagesy($img_origin) / imagesx($img_origin);
    echo $alto_origin;
} else if ($ancho_origin == $alto_origin) {

    $ancho_origin = $ancho_limit;
    $alto_origin = $ancho_limit;
} else {
    if ($alto_origin > 2000) {
        $alto_origin = $alto_limit;
        $ancho_origin = $alto_limit * imagesx($img_origin) / imagesy($img_origin);
        echo $ancho_origin;
    } else {
        $alto_origin = $ancho_origin;
        $ancho_origin = $ancho_limit * imagesx($img_origin) / imagesy($img_origin);
        echo $ancho_origin;
    }
}

$img_destino = imagecreatetruecolor($ancho_origin, $alto_origin);
imagecopyresized($img_destino, $img_origin, 0, 0, 0, 0, $ancho_origin, $alto_origin, imagesx($img_origin), imagesy($img_origin));
require("metadate/imagefomate_and.php");
