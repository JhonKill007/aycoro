<?php
$time = $_POST['time'];
$mensaje = $_POST["mensaje"];
$id_sendner = $_POST["id_sendner"];
$id_disc = $_POST["id_disc"];
date_default_timezone_set($time);
$fecha = date('d-m-Y');
$hora = date('h:i a');

$eso = require("conection.php");

if ($mensaje != "") {
    $INSERT = "INSERT INTO chat_discusion (id_sendner,mensaje,id_discusion,day,hour)values('$id_sendner','$mensaje','$id_disc','$fecha','$hora')";
    $resultado = mysqli_query($conn, $INSERT);
    if ($resultado) {
        echo "enviado";
    } else {
        echo "Ha ocurrido un error!";
    }
}
