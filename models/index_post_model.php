<?php
$eso =  require('keys/conection.php');
if ($eso) {

    $SELECT = "SELECT * from folow inner join post on folow.id_folowing = post.owner inner join registro on post.owner=registro.id_registro where folow.id_folower='$id' ORDER BY id_post DESC";
    $resultado = mysqli_query($conn, $SELECT);
}
?>
