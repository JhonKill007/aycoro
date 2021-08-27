<?php
$mensaje = $_POST["mensaje"];
$id_sendner = $_POST["id_sendner"];
$id_disc = $_POST["id_disc"];

$eso = require("conection.php");

$INSERT = "INSERT INTO chat_discusion (id_sendner,mensaje,id_discusion)values('$id_sendner','$mensaje','$id_disc')";
$resultado = mysqli_query($conn, $INSERT);
if ($resultado) {
    echo "enviado";
} else {
    echo "valio verga";
}
