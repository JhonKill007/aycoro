<?php
$eso = require("conection.php");
if ($opcion == 1 || $opcion == 3) {
    if ($eso) {
        $INSERT = "INSERT INTO post (photo_post,estado_post,owner,day,hour)values('$ruta_send','$estado','$id_registro','$fecha','$hora')";
        $resultado = mysqli_query($conn, $INSERT);
        if ($resultado) {
            // echo "posteado";
            header("Location: ../index");
        } else {
            echo "<script>
                alert('la option de post 1 y 3 han fallado.');
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
    if ($ruta_send == 'historys/') {

        echo "<script>
        alert('Debe seleccionar una imagen.');
        window.location='../index';
        </script>";
    } else {
        if ($eso) {
            $INSERT = "INSERT INTO history (photo,id_owner,day,hour,date)values('$ruta_send','$id_registro','$fecha','$hora',NOW())";
            $resultado = mysqli_query($conn, $INSERT);
            if ($resultado) {
                header("Location: ../historias");
            } else {
                echo "<script>
                            alert('la option de post 2 ha fallado.');
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
} else if ($opcion == 4) {
    if ($eso) {
        $UPDATE = "UPDATE registro SET foto='$ruta_send' Where id_registro='$id_registro'";
        $resultado = mysqli_query($conn, $UPDATE);
        if ($resultado) {
            // echo"todo correcto";
            header("Location: ../perfil");
        } else {
            echo "Ha ocurrido un error!";
        }
    } else {
        echo "fallo la coneccion";
    }
} else if ($opcion == 5) {
    if ($eso) {
        $UPDATE = "UPDATE registro SET portada ='$ruta_send' Where id_registro='$id_registro'";
        $resultado = mysqli_query($conn, $UPDATE);
        if ($resultado) {
            // echo"todo correcto";
            header("Location: ../perfil");
        } else {
            echo "Ha ocurrido un error!";
        }
    } else {
        echo "fallo la coneccion";
    }
} else {
    echo "<script>
    alert('algo salio con e insert.');
    window.location='../index';
    </script>";
}
