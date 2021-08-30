<?php
session_start();
require('identification.php');

$id_registro = $registro['id_registro'];
$longpas = 10;


$opcion = $_POST['opcion'];
if ($opcion == 1) {

    
    $filename = $_FILES['photo_post']['name'];
    $lognstring = substr(md5(microtime()), 1, $longpas);
    $new_name = $id_registro . '-' . $lognstring;


    $xplode = explode('.', $filename);
    $extencion = array_pop($xplode);
    $apply_name = $new_name . '.' . $extencion;

    $ruta = '../photo_post/' . $apply_name;
    $ruta_send = 'photo_post/' . $apply_name;
    move_uploaded_file($_FILES['photo_post']['tmp_name'], $ruta);

    $estado = $_POST['estado_post'];



} else if ($opcion == 2) {

    $filename = $_FILES['evento']['name'];
    $lognstring = substr(md5(microtime()), 1, $longpas);
    $new_name = $id_registro . '-' . $lognstring;


    $xplode = explode('.', $filename);
    $extencion = array_pop($xplode);
    $apply_name = $new_name . '.' . $extencion;

    $ruta = '../event/' . $apply_name;
    $ruta_send = 'event/' . $apply_name;
    move_uploaded_file($_FILES['evento']['tmp_name'], $ruta);



} else if ($opcion == 3) {
    $estado = $_POST['estado_post'];
    $ruta_send = "";
} else {
    echo "<script>
    alert('algo salio mal.');
    window.location='../index.php';
    </script>";
}

$eso = require("conection.php");



if ($opcion == 1 || $opcion == 3) {
    if ($eso) {
        $INSERT = "INSERT INTO post (photo_post,estado_post,owner)values('$ruta_send','$estado','$id_registro')";
        $resultado = mysqli_query($conn, $INSERT);
        if ($resultado) {
            // echo "posteado";
            header("Location: ../index");
        } else {
            echo "<script>
                alert('algo salio mal.');
                window.location='../index';
                </script>";
        }
    } else {
        echo "<script>
                alert('la connecion fallo.');
                window.location='../index';
                </script>";
    }
} else if ($opcion == 2) {
    if ($ruta_send == 'event/') {

        echo "<script>
        alert('Debe seleccionar una imagen.');
        window.location='../index';
        </script>";
    } else {
        if ($eso) {
            $SELECT = "SELECT * FROM event where id_owner = $id_registro";
            $resultado = mysqli_query($conn, $SELECT);
            $num = $resultado->num_rows;
            if ($num == 0) {
                $INSERT = "INSERT INTO event (photo,id_owner)values('$ruta_send','$id_registro')";
                $resultado = mysqli_query($conn, $INSERT);
                if ($resultado) {
                    header("Location: ../index");
                } else {
                    echo "<script>
                            alert('algo salio mal.');
                            window.location='../index';
                            </script>";
                }
            } else {
                echo "<script>
                    alert('Ya tiene una discucion creada, solo puede tener una discucion por dia.');
                    window.location='../index';
                    </script>";
            }
        } else {
            echo "<script>
                alert('la connecion fallo.');
                window.location='../index';
                </script>";
        }
    }
} else {
    echo "<script>
    alert('algo salio con e insert.');
    window.location='../index';
    </script>";
}
