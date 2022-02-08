<style>
    .footer_login {
        width: 600px;
        margin: auto;
        text-align: center;
    }

    .footer_login ul {
        list-style: none;
        display: flex;
        justify-content: space-around;
    }

    .footer_login ul li {
        margin-right: 10px;
        font-size: 12px;
        text-align: center;
        margin: auto;
    }

    #ul4 {
        display: none;
    }


    @media (max-width: 700px) {
        .footer_login {
            width: 300px;
        }

        #ul1 {
            display: none;
        }

        #ul2 {
            display: flex;
            margin-bottom: 0;
        }

        #ul3 {
            display: flex;
            margin-top: 0;
            margin-bottom: 0;
        }

        #ul4 {
            display: flex;
            margin-top: 0;
        }
    }
</style>
<div class="footer_login">
    <ul id="ul1">
        <li><a href="aycoro"><span>Aycoro</span></a></li>
        <li><a href="historia"><span>Historia</span></a></li>
        <li><a href="ayuda"><span>Ayuda</span></a></li>
        <!-- <li><a href=""><span>Patreon</span></a></li> -->
        <li><a href="contribuciones"><span>Contribuciónes</span></a></li>
        <li><a href="perfiles"><span>Perfiles</span></a></li>
        <li><a href="contactos"><span>Contactos</span></a></li>
        <li><a href="terminos"><span>Terminos y condiciones</span></a></li>
        <?php
        if (!isset($_SESSION['id'])) {
        ?>
            <li><a href="../login.php"><span>Iniciar Sesion</span></a></li>
            <li><a href="../signup.php"><span>Registrate</span></a></li>
        <?php
        }
        ?>

    </ul>
    <ul id="ul2">
        <li><a href="aycoro"><span>Aycoro</span></a></li>
        <li><a href="historia"><span>Historia</span></a></li>
        <li><a href="ayuda"><span>Ayuda</span></a></li>
        <!-- <li><a href=""><span>Patreon</span></a></li> -->
        <li><a href="contribuciones"><span>Contribuciónes</span></a></li>

    </ul>
    <ul id="ul3">
        <li><a href="perfiles"><span>Perfiles</span></a></li>
        <li><a href="contactos"><span>Contactos</span></a></li>
        <li><a href="terminos"><span>Terminos y condiciones</span></a></li>
    </ul>
    <?php
    if (!isset($_SESSION['id'])) {
    ?>
        <ul id="ul4">
            <li><a href="../login.php"><span>Iniciar Sesion</span></a></li>
            <li><a href="../signup.php"><span>Registrate</span></a></li>
        </ul>
    <?php
    }
    ?>

    <span class="copy-version">©Aycoro 2022</span>
    <span class="copy-version">Version <?php echo $version; ?></span>
</div>
<br>
<br>
<?php require("../ads/sugerencias_ayudas_Ads.php") ?>