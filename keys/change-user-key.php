<?php
$id_per = $_POST['id_per'];
$usario_new = $_POST['usario_new'];

$datachange = "";

if (!empty($id_per) || !empty($nuevo)) {
    $eso =  require('conection.php');
    if ($eso) {
        $SELECT = "SELECT * FROM registro WHERE usuario = '$usario_new'";
        $resultado = mysqli_query($conn, $SELECT);
        $cant_user = $resultado->num_rows;
        if ($cant_user < 1) {
            $UPDATE = "UPDATE registro SET usuario ='$usario_new' Where id_registro='$id_per'";
            $resultado = mysqli_query($conn, $UPDATE);
            if ($resultado) {
                echo "success";
            }
        } else {
            $datachange .= "<div class='error-txt  error'>Este usuario no esta Disponible.</div>";
            echo $datachange;
        }
    } else {
        echo "fallo la coneccion";
    }
} else {
    $datachange .= "<div class='error-txt  error'>Ingresa el nuevo Usuario.</div>";
    echo $datachange;
}
