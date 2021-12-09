<?php
$id_per = $_POST['id_per'];
$nueva = $_POST['nueva'];
$confirm = $_POST['confirm'];

$datachange = "";

if (!empty($id_per) || !empty($nueva) || !empty($confirm)) {
    $eso =  require('conection.php');
    if ($eso) {
        if ($nueva == $confirm) {
            $script_password = password_hash($nueva, PASSWORD_DEFAULT);
            $UPDATE = "UPDATE registro SET password ='$script_password' Where id_registro='$id_per'";
            $resultado = mysqli_query($conn, $UPDATE);
            if ($resultado) {
                echo "success";
            }
        } else {
            $datachange .= "<div class='error-txt  error'>La Contraseña nueva y la confirmacion no coinsiden.</div>";
            echo $datachange;
        }
    } else {
        echo "fallo la coneccion";
    }
} else {
    $datachange .= "<div class='error-txt  error'>Complete todos los campos.</div>";
    echo $datachange;
}
