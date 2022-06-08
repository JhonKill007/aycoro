<?php
session_start();
$id = $_SESSION['id'];
$eso =  require('conection.php');
if ($eso) {
    $SELECT_TWO = "SELECT COUNT(*) FROM chat where id_reciver = $id and readdate = 0";
    $resultado_num = mysqli_query($conn, $SELECT_TWO);
    $num = $resultado_num->num_rows;
    if ($resultado_num) {
        echo $num;
    } else {
        echo "";
    }
} else {
    echo "la coneccion fallo";
}
