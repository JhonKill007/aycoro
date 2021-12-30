<?php
session_start();
require('identification.php');

$id_registro = $registro['id_registro'];
$longpas = 10;
$time = $_POST['time'];
date_default_timezone_set($time);
$fecha = date('d-m-Y');
$hora = date('h:i a');
$date = date('Y-m-d')." ".date("H:i:s");  





$opcion = $_POST['opcion'];
if ($opcion == 1) {





    $base64 = $_POST["file_post"];
    // $path = $_POST["extencion"];

    $lognstring = substr(md5(microtime()), 1, $longpas);
    $new_name = $id_registro . '-' . $lognstring;


    // $extencion = pathinfo($path, PATHINFO_EXTENSION);
    // $extencion = "jpg";
    $extencion = "png";
    $apply_name = $new_name . '.' . $extencion;


    $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64));
    $ruta_send = 'photo_post/' . $apply_name;
    $ruta = "../photo_post/" . $apply_name;
    file_put_contents($ruta, $data);


    $estado = $_POST['estado_post'];
    require("formate_img.php");
} else if ($opcion == 2) {

    $base64 = $_POST["file_post"];
    // $path = $_POST["extencion"];

    // echo $base64;

    $lognstring = substr(md5(microtime()), 1, $longpas);
    $new_name = $id_registro . '-' . $lognstring;


    // $extencion = pathinfo($path, PATHINFO_EXTENSION);
    // $extencion = "jpg";
    $extencion = "png";
    // echo $extencion;
    $apply_name = $new_name . '.' . $extencion;


    $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64));
    $ruta = '../historys/' . $apply_name;
    $ruta_send = 'historys/' . $apply_name;
    file_put_contents($ruta, $data);

    require("formate_img.php");
} else if ($opcion == 3) {
    $estado = $_POST['estado_post'];
    $ruta_send = "";
} else if ($opcion == 4) {
    $base64 = $_POST["file_post"];
    $path = $_POST["extencion"];



    $lognstring = substr(md5(microtime()), 1, $longpas);
    $new_name = $id_registro . '-' . $lognstring;


    // $extencion = pathinfo($path, PATHINFO_EXTENSION);
    // $extencion = "jpg";
    $extencion = "png";
    $apply_name = $new_name . '.' . $extencion;


    $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64));
    $ruta = '../photo_perfil/' . $apply_name;
    $ruta_send = 'photo_perfil/' . $apply_name;
    file_put_contents($ruta, $data);


    require("formate_img.php");
} else if ($opcion == 5) {
    $base64 = $_POST["file_post"];

    // $path = $_POST["extencion"];

    $lognstring = substr(md5(microtime()), 1, $longpas);
    $new_name = $id_registro . '-' . $lognstring;


    // $extencion = pathinfo($path, PATHINFO_EXTENSION);
    // $extencion = "jpg";
    $extencion = "png";
    $apply_name = $new_name . '.' . $extencion;

    $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64));
    $ruta = '../photo_portada/' . $apply_name;
    $ruta_send = 'photo_portada/' . $apply_name;
    file_put_contents($ruta, $data);


    require("formate_img.php");
} else {
    echo "<script>
    alert('no selecciono una opcion.');
    window.location='../index.php';
    </script>";
}

require("../models/agregar_post_model.php");
?>
