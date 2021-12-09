<?php

$id_post = $_POST["id_post"];
$liker = $_POST["liker"];
$data = "";


if (!empty($id_post) || !empty($liker)) {
    $eso = require("conection.php");
    if ($eso) {
        $SELECT = "SELECT * FROM likes WHERE id_post ='$id_post' and id_liker ='$liker'";
        $resultado_like1 = mysqli_query($conn, $SELECT);
        $nume = $resultado_like1->num_rows;
        if ($nume == 0) {
            $INSERT = "INSERT INTO likes (id_post,id_liker,date_like)values('$id_post','$liker',NOW())";
            $resultado = mysqli_query($conn, $INSERT);
            if ($resultado) {
                $SELECT = "SELECT * FROM likes WHERE id_post ='$id_post'";
                $resultado_like2 = mysqli_query($conn, $SELECT);
                $num_like = $resultado_like2->num_rows;
                $data .= "<div class='buton_like'><i class='fas fa-heart like-red'></i><b>" . $num_like . " Like</b></div>";
            } else {
                echo "Ha ocurrido un error!";
            }
            echo $data;
        } else {
            $DELETE = "DELETE FROM likes WHERE id_post = $id_post and id_liker = $liker";
            $resultado = mysqli_query($conn, $DELETE);
            if ($resultado) {
                $SELECT = "SELECT * FROM likes WHERE id_post ='$id_post'";
                $resultado_like2 = mysqli_query($conn, $SELECT);
                $num_like = $resultado_like2->num_rows;
                $data .= "<div class='buton_like'><i class='far fa-heart like-wait'></i><b>" . $num_like . " Like</b></div>";
            } else {
                echo "Ha ocurrido un error!";
            }
            echo $data;
        }
    } else {
        echo "la connecion fallo";
    }
}
