<?php
$eso =  require('keys/conection.php');
if ($eso) {

    $SELECT = "SELECT * FROM post inner join registro on post.owner=registro.id_registro where owner = $id_registro AND post.status = 'Active' ORDER BY id_post DESC";
    $resultado = mysqli_query($conn, $SELECT);
}
?>