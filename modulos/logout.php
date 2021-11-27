<?php
session_start();
require("../keys/conection.php");
if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    $UPDATE = "UPDATE registro SET status='Offline' Where id_registro ='$id'";
    $resultado = mysqli_query($conn, $UPDATE);
    if ($resultado) {
        setcookie("IgtX9000",$id,time()-1,"/");
        session_unset();
        session_destroy();
        header("Location:../login");
    }
}
else{
    header("Location:../login");
}
?>