<?php
if ($owner_post == $_SESSION['id']) {
?>
    <script>
        let optix<?php echo $id_post; ?> = 1;
        const Opt<?php echo $id_post; ?> = document.querySelector(".options-edit-post<?php echo $id_post; ?>");
        document.querySelector('.box_setting<?php echo $id_post; ?>').addEventListener('click', () => {
            if (optix<?php echo $id_post; ?> == 1) {
                Opt<?php echo $id_post; ?>.innerHTML = '<div class="options-edit-post"><br><ul><li onclick="EditPost<?php echo $id_post; ?>()"><b class="text-gren">Editar</b></li><li onclick="options<?php echo $id_post; ?>()"><b class="text-red">Eliminar</b></li></ul></div>';
                optix<?php echo $id_post; ?> = 2;
            } else {
                Opt<?php echo $id_post; ?>.innerHTML = "";
                optix<?php echo $id_post; ?> = 1;
            }
        })




        function EditPost<?php echo $id_post; ?>() {
            let txt = document.getElementById("stado<?php echo $id_post; ?>");
            Swal.fire({
                    input: 'textarea',
                    inputLabel: 'Message',
                    inputPlaceholder: 'Type your message here...',
                    inputValue: txt.innerHTML,
                    showCancelButton: true
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        let string = result.value;
                        document.getElementById("status_edit<?php echo $id_post; ?>").value = string;
                        let xhrst<?php echo $id_post; ?> = new XMLHttpRequest();
                        xhrst<?php echo $id_post; ?>.open("POST", "keys/edit_post.php", true);
                        xhrst<?php echo $id_post; ?>.onload = () => {
                            if (xhrst<?php echo $id_post; ?>.readyState === XMLHttpRequest.DONE) {
                                if (xhrst<?php echo $id_post; ?>.status === 200) {
                                    let datast<?php echo $id_post; ?> = xhrst<?php echo $id_post; ?>.response;
                                    // console.log(datast<?php echo $id_post; ?>);
                                    if (datast<?php echo $id_post; ?> == "success") {
                                        Swal.fire({
                                            title: 'Editado',
                                            icon: 'success',
                                        }).then((result) => {
                                            location.reload();

                                        })
                                    }

                                }
                            }
                        }
                        let formDatast<?php echo $id_post; ?> = new FormData(formu<?php echo $id_post; ?>); //creando el objeto formData
                        xhrst<?php echo $id_post; ?>.send(formDatast<?php echo $id_post; ?>); //enviando el formData a php
                    }
                })
        }

        function options<?php echo $id_post; ?>() {
            Swal.fire({
                title: 'Eliminar',
                text: "Deseas eliminar esta publicacion?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    let xhrs<?php echo $id_post; ?> = new XMLHttpRequest();
                    xhrs<?php echo $id_post; ?>.open("POST", "keys/delete_post.php", true);
                    xhrs<?php echo $id_post; ?>.onload = () => {
                        if (xhrs<?php echo $id_post; ?>.readyState === XMLHttpRequest.DONE) {
                            if (xhrs<?php echo $id_post; ?>.status === 200) {
                                let datas<?php echo $id_post; ?> = xhrs<?php echo $id_post; ?>.response;
                                // console.log(datas<?php echo $id_post; ?>);
                                if (datas<?php echo $id_post; ?> == "success") {

                                    Swal.fire({
                                        title: 'Eliminado',
                                        icon: 'success'
                                    }).then((result) => {
                                        location.reload();

                                    })


                                }
                            }
                        }
                    }
                    // // vamos a mandar el formu data atraves de ajax a php
                    let formDatas<?php echo $id_post; ?> = new FormData(formu<?php echo $id_post; ?>); //creando el objeto formData
                    xhrs<?php echo $id_post; ?>.send(formDatas<?php echo $id_post; ?>); //enviando el formData a php


                }
            })
        }
    </script>
<?php
}
?>
<script>
    let cont_coment<?php echo $id_post; ?> = 1;
    const conteiner_input_coment<?php echo $id_post; ?> = document.querySelector(".conteiner_coment_input<?php echo $id_post; ?>");

    function OpenInputComent<?php echo $id_post; ?>() {
        if (cont_coment<?php echo $id_post; ?> == 1) {

            conteiner_input_coment<?php echo $id_post; ?>.innerHTML = '<div class="coment_add_box_send"><div class ="coment_add_box_center"><div class="coment_add_input"><input class="form-control" id="coment_value<?php echo $id_post; ?>" maxlength="900" autocomplete="off" placeholder="Agrega un comentario..." type="text"></div><div class="coment_add_buttons"><button class="btn btn-success" onclick="SendComent<?php echo $id_post; ?>()">Publicar</button></div></div></div>';
            cont_coment<?php echo $id_post; ?> = 2;

        } else {
            conteiner_input_coment<?php echo $id_post; ?>.innerHTML = "";
            cont_coment<?php echo $id_post; ?> = 1;
        }
    }


    function SendComent<?php echo $id_post; ?>() {
        document.getElementById("status_input_hiden<?php echo $id_post; ?>").value = document.getElementById("coment_value<?php echo $id_post; ?>").value;
        document.getElementById("coment_value<?php echo $id_post; ?>").value = "";
        let xhrts_add_coment<?php echo $id_post; ?> = new XMLHttpRequest();
        xhrts_add_coment<?php echo $id_post; ?>.open("POST", "keys/add-coments-key.php", true);
        xhrts_add_coment<?php echo $id_post; ?>.onload = () => {
            if (xhrts_add_coment<?php echo $id_post; ?>.readyState === XMLHttpRequest.DONE) {
                if (xhrts_add_coment<?php echo $id_post; ?>.status === 200) {
                    let data_add_coment<?php echo $id_post; ?> = xhrts_add_coment<?php echo $id_post; ?>.response;

                    if (data_add_coment<?php echo $id_post; ?> == "successfull") {
                        document.getElementById("coment_value<?php echo $id_post; ?>").value = "";
                        ViewComentCant<?php echo $id_post; ?>();
                    }

                }
            }
        }
        let formDatats_add_coment<?php echo $id_post; ?> = new FormData(formu<?php echo $id_post; ?>);
        xhrts_add_coment<?php echo $id_post; ?>.send(formDatats_add_coment<?php echo $id_post; ?>);
    }
</script>