<?php

$email = $_POST['email'];
$datalog = "";


if (!empty($email)) {

    $eso =  require('conection.php');
    if ($eso) {
        $SELECT = "SELECT * from registro where email='$email'";
        $resultado = mysqli_query($conn, $SELECT);

        if ($resultado->num_rows == 1) {
            $identity = $resultado->fetch_array();
            $id_identity = $identity['id_registro'];
            $name_identity = $identity['nombre'];
            $email_identity = $identity['email'];



            include "metadate/mcript.php";
            $dato = $email_identity;
            $date = time() + 86400;


            $dato_encriptado = $encriptar($dato);
            $date_encryp = $encriptar($date);



            $asunto = "Restablecer Contraseña";
            $mensaje = "" . $name_identity . ", alguien a tratado de Restablecer tu contraseña. 
            Si has sido tú solo has click en este link http://aycoro.com/rest?fditer=" . $dato_encriptado . "&hfdar=" . $date_encryp . "";


            $header = "From: Aycoro <no-reply@aycoro.com>" . "\r\n";
            $header .= "Reply-To: NoReplay@aycoro.com" . "\r\n";
            $header .= "X-Mailer: PHP/" . phpversion();
            $mail = mail($email_identity, $asunto, $mensaje, $header);
            if ($mail) {
                echo "success";
            } else {
                $datalog .= "<div class='error-txt  error'>No se pudo enviar el Email.</div>";
            }
        } else {
            $datalog .= "<div class='error-txt  error'>El Email ingresado no coincide con ninguna cuenta</div>";
        }
    } else {
        $datalog .= "<div class='error-txt  error'>Fallo la coneccion</div>";
    }
} else {
    $datalog .= "<div class='error-txt  error'>Debes introducir un correo valido</div>";
}
echo $datalog;
