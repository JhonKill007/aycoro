<?php
$id = $_SESSION['id'];

if(!empty($id)){
    $eso =  require('conection.php');
    if($eso){
        $SELECT = "SELECT * FROM registro WHERE id_registro=$id";
        $resultado = mysqli_query($conn,$SELECT);
        if($resultado){
        
            $registro = $resultado->fetch_array();
            $id = $registro['id_registro'];
            $id_registro = $registro['id_registro'];
            $nombre = $registro['nombre'];
            $numero = $registro['numero'];
            $usuario = $registro['usuario'];
            $email = $registro['email'];
            $password = $registro['password'];
            $birthday = $registro['birthday'];
            $genero = $registro['genero'];
            $usuario = $registro['usuario'];
            $foto = $registro['foto'];
            $portada = $registro['portada'];
            $presentacion = $registro['presentacion'];
        }
    }
}
else{
    header("Location:../login");
}

?>

