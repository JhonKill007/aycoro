<?php
session_start();
if (isset($_SESSION['id'])) {
    require("conection.php");
    $id_sendner = $_POST["id_sendner"];
    $id_disc = $_POST["id_disc"];

    $output = "";


    $SELECT = "SELECT * FROM chat_discusion inner join registro on chat_discusion.id_sendner=registro.id_registro WHERE chat_discusion.id_discusion = '$id_disc'";
    $resultado = mysqli_query($conn, $SELECT);
    $nume  = $resultado->num_rows;
    if ($resultado->num_rows > 0) {
        while ($ms = $resultado->fetch_array()) {
            $idsendner = $ms['id_sendner'];
            $nom = $ms['nombre'];
            $ape = $ms['apellido'];
            if ($ms['id_sendner'] == $id_sendner) {
                $output .= '<div class="chat outgoing">
                                    <div class="details">
                                        <p>' . $ms['mensaje'] . '</p>
                                    </div>
                                </div>';
            } else {
                $output .= '<div class="chat incoming">
                                    <a href="perfil-reciver.php?usu='.$idsendner.'">
                                        <img src="' . $ms['foto'] . '" alt="">
                                    </a>
                                    <div class="details">
                                        <a href="perfil-reciver.php?usu='.$idsendner.'">
                                            <b>'.$nom.' '.$ape.'</b>
                                        </a>
                                        <p>' . $ms['mensaje'] . '</p>
                                    </div>
                                </div>';
            }
        }
        // echo $output;
    }
    if ($output == '') {
        $output .= '<div class="details letter-comver">
                        <h3>No hay conversacion!</h3>
                   </div>';
    }
    echo $output;
} else {
    header("Location: ../login");
}
