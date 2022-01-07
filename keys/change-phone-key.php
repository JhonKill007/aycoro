<?php
$id_per = $_POST['id_per'];
$number_new = $_POST['number_new'];
$number_old = $_POST['number_old'];

$datachange = "";

if (!empty($id_per) || !empty($number_new)) {
    $eso =  require('conection.php');
    if ($eso) {
        if (preg_match("/^[0-9]{3}[0-9]{3}[0-9]{4}$/", $number_new)) {
            if ($number_new != $number_old) {
                $SELECT = "SELECT * FROM registro WHERE numero = '$number_new'";
                $resultado = mysqli_query($conn, $SELECT);
                $cant_user = $resultado->num_rows;
                if ($cant_user < 1) {
                    $UPDATE = "UPDATE registro SET numero ='$number_new' Where id_registro='$id_per'";
                    $resultado = mysqli_query($conn, $UPDATE);
                    if ($resultado) {
                        $INSERT = "INSERT INTO edits (campo,new,old,id_user,date_edit)values('Phone','$number_new','$number_old','$id_per',NOW())";
                        $resultado = mysqli_query($conn, $INSERT);
                        if ($resultado) {
                            echo "success";
                        }
                    }
                } else {
                    $datachange .= "<div class='error-txt  error'>Este Numero ya se usa en otra cuenta.</div>";
                    echo $datachange;
                }
            } else {
                echo "success";
            }
        } else {
            $datachange .= "<div class='error-txt  error'>'" . $number_new . "' Este Numero no es valido</div>";
            echo $datachange;
        }
    } else {
        echo "fallo la coneccion";
    }
} else {
    $datachange .= "<div class='error-txt  error'>Ingresa el nuevo Email.</div>";
    echo $datachange;
}
