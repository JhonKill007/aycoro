<?php
$version = "1.3.2 FullStar";
?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $tittlePage; ?></title>

  <!-- meta etiquetas -->
  <meta name="description" content="La primera red social Dominicana. Crea una cuenta o inicia sesión en Aycoro y conéctate con amigos, familiares y otras personas que quieras conocer ademas comparte fotos y envía mensajes a quien quieras.">
  <meta name="keywords" content="aycoro, red social, social network, app, aplicacion, chat">
  <!-- <meta name="robots" content="noimageindex, noarchive"> -->


  <!-- icono -->
  <link rel="icon" type="imagen/png" href="img/Icon.jpg">

  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

  <!-- style bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <!-- stye nav -->
  <link rel="stylesheet" href="css/stylo-nav.css?<?php echo $version; ?>">

  <!-- stye nav-two -->
  <link rel="stylesheet" href="css/stylo-nav-two.css?<?php echo $version; ?>">

  <!-- stye main -->
  <link rel="stylesheet" href="css/stylo-main.css?<?php echo $version; ?>">

  <!-- slyle index-->
  <link rel="stylesheet" href="css/stylo-index.css?<?php echo $version; ?>">

  <!-- style publicaciones -->
  <link rel="stylesheet" href="css/stylo-publ.css?<?php echo $version; ?>">

  <!-- style message page -->
  <link rel="stylesheet" href="css/stylo-message-page.css?<?php echo $version; ?>">

  <!-- style dm -->
  <link rel="stylesheet" href="css/stylo-dm.css?<?php echo $version; ?>">

  <!-- style perfil -->
  <link rel="stylesheet" href="css/stylo-perfil.css?<?php echo $version; ?>">

  <!-- style log-in -->
  <link rel="stylesheet" href="css/stylo-login.css?<?php echo $version; ?>">

  <!-- style signup -->
  <link rel="stylesheet" href="css/stylo-signup.css?<?php echo $version; ?>">

  <!-- style busqueda -->
  <link rel="stylesheet" href="css/stylo-busqueda.css?<?php echo $version; ?>">

  <!-- style eventos -->
  <link rel="stylesheet" href="css/stylo-historys.css?<?php echo $version; ?>">

  <!-- nav three -->
  <link rel="stylesheet" href="css/stylo-nav-three.css?<?php echo $version; ?>">

  <!-- style de sugerencias -->
  <link rel="stylesheet" href="css/stylo-ayuday-suger.css?<?php echo $version; ?>">

  <!-- style de vista de historias -->
  <link rel="stylesheet" href="css/stylo-view-historys.css?<?php echo $version; ?>">

  <!-- style de editor de fotos -->
  <link rel="stylesheet" href="css/stylo-editor.css?<?php echo $version; ?>">

  <!-- icoon de carga -->
  <link rel="stylesheet" href="css/stylo-charger.css?<?php echo $version; ?>">
  
  <!-- folows page  -->
  <link rel="stylesheet" href="css/stylo-folows.css?<?php echo $version; ?>">

  <!-- publicidad -->
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6464187088568984" crossorigin="anonymous"></script>



  <!-- editor -->

  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
  <link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
  <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet" />
  <script src="https://unpkg.com/dropzone"></script>
  <script src="https://unpkg.com/cropperjs"></script>

  <script>
    let identity_page_post = 0;
  </script>
  <?php
  $identity_page_post = 0;
  ?>
</head>