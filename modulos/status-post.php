<form action="" method="post" class="formstatuspost">
    <input type="hidden" value="3" name="opcion">
    <input type="hidden" value="" name="time" id="time3">
    <input type="hidden" value="" name="estado_post" id="estado_post">
    <!-- <textarea class="form-control col-sm-12" name="estado_post" id="" cols="20" rows="2" maxlength="115" required></textarea> -->
    <!-- <label for="">Maximo 115 Caracteres</label> -->
</form>

<script>
    const formu<?php echo $registro['id_registro']; ?> = document.querySelector(".formstatuspost");
    document.querySelector('.post-write').addEventListener('click', () => {
        statuswrite();
    })
    
    document.querySelector('.post-write1').addEventListener('click', () => {
        statuswrite();
    })



    function statuswrite(){
        Swal.fire({
                title: 'Que Piensas?',
                input: 'textarea',
                inputLabel: 'Escribe lo que quieras',
                inputPlaceholder: 'Escribe aqui...',
                confirmButtonText: 'Publicar',
                showCancelButton: true
            })
            .then((result) => {
                if (result.isConfirmed) {
                    let string = result.value;
                    if (string == "") {

                    } else {
                        document.getElementById("estado_post").value = string;
                        const timeNow = Intl.DateTimeFormat().resolvedOptions().timeZone;
                        document.getElementById("time3").value = timeNow;
                        let xhrst<?php echo $registro['id_registro']; ?> = new XMLHttpRequest();
                        xhrst<?php echo $registro['id_registro']; ?>.open("POST", "keys/agregar-post-key.php", true);
                        xhrst<?php echo $registro['id_registro']; ?>.onload = () => {
                            if (xhrst<?php echo $registro['id_registro']; ?>.readyState === XMLHttpRequest.DONE) {
                                if (xhrst<?php echo $registro['id_registro']; ?>.status === 200) {
                                    let datast<?php echo $registro['id_registro']; ?> = xhrst<?php echo $registro['id_registro']; ?>.response;
                                    location.reload();
                                }
                            }
                        }
                        let formDatast<?php echo $registro['id_registro']; ?> = new FormData(formu<?php echo $registro['id_registro']; ?>); //creando el objeto formData
                        xhrst<?php echo $registro['id_registro']; ?>.send(formDatast<?php echo $registro['id_registro']; ?>); //enviando el formData a php
                    }
                }
            })
    }
</script>