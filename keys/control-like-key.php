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
            $INSERT = "INSERT INTO likes (id_post,id_liker)values('$id_post','$liker')";
            $resultado = mysqli_query($conn, $INSERT);
            if ($resultado) {
                $SELECT = "SELECT * FROM likes WHERE id_post ='$id_post'";
                $resultado_like2 = mysqli_query($conn, $SELECT);
                $num_like = $resultado_like2->num_rows;
                $data .= "<button class='buton_like'><i class='fas fa-heart like-red like'></i><b>" . $num_like . " Like</b></button>";
            } else {
                echo "valio verga";
            }
            echo $data;
        } else {
            $DELETE = "DELETE FROM likes WHERE id_post = $id_post and id_liker = $liker";
            $resultado = mysqli_query($conn, $DELETE);
            if ($resultado) {
                $SELECT = "SELECT * FROM likes WHERE id_post ='$id_post'";
                $resultado_like2 = mysqli_query($conn, $SELECT);
                $num_like = $resultado_like2->num_rows;
                $data .= "<button class='buton_like'><i class='far fa-heart like-wait like'></i><b>" . $num_like . " Like</b></button>";
            } else {
                echo "valio verga";
            }
            echo $data;
        }
    } else {
        echo "la connecion fallo";
    }
}
