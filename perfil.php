<?php
require("fund/head.php");
?>



<body>

<?php
require("modulos/nav.php");
require("modulos/nav-two.php");


                $eso = require("keys/conection.php");
                if($eso){
                    $SELECT = "SELECT * FROM folow WHERE id_folowing ='$id_registro'";
                    $resultado = mysqli_query($conn,$SELECT);
                    $nume = $resultado->num_rows;
                    
                }
                else{
                    echo "fallo la coneccion";
                }

require("modulos/perfil-bio.php");
require("modulos/post-view-mine.php");
require("modulos/footer.php");
require("fund/script.php");
?>
</body>
</html>