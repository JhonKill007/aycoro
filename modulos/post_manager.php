<?php
if ($owner_post == $_SESSION['id']) {
?>
    <script>
        let optix<?php echo $id_post; ?> = 1;
        const Opt<?php echo $id_post; ?> = document.querySelector(".options-edit-post<?php echo $id_post; ?>");
        document.querySelector('.box_setting<?php echo $id_post; ?>').addEventListener('click', () => {
            if (optix<?php echo $id_post; ?> == 1) {
                let xhrts<?php echo $id_post; ?> = new XMLHttpRequest();
                xhrts<?php echo $id_post; ?>.open("POST", "modulos/options_edit.php", true);
                xhrts<?php echo $id_post; ?>.onload = () => {
                    if (xhrts<?php echo $id_post; ?>.readyState === XMLHttpRequest.DONE) {
                        if (xhrts<?php echo $id_post; ?>.status === 200) {
                            let datats<?php echo $id_post; ?> = xhrts<?php echo $id_post; ?>.response;
                            Opt<?php echo $id_post; ?>.innerHTML = datats<?php echo $id_post; ?>;
                            optix<?php echo $id_post; ?> = 2;
                        }
                    }
                }
                // vamos a mandar el form data atraves de ajax a php
                let formDatats<?php echo $id_post; ?> = new FormData(formu<?php echo $id_post; ?>); //creando el objeto formData
                xhrts<?php echo $id_post; ?>.send(formDatats<?php echo $id_post; ?>); //enviando el formData a php
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
                                    } else {
                                        Swal.fire({
                                            title: 'ERROR!',
                                            text: 'La publicacion no pudo ser editada.',
                                            icon: 'error',
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
            let xhrts_coment<?php echo $id_post; ?> = new XMLHttpRequest();
            xhrts_coment<?php echo $id_post; ?>.open("POST", "modulos/coment_input.php", true);
            xhrts_coment<?php echo $id_post; ?>.onload = () => {
                if (xhrts_coment<?php echo $id_post; ?>.readyState === XMLHttpRequest.DONE) {
                    if (xhrts_coment<?php echo $id_post; ?>.status === 200) {
                        let data_coment<?php echo $id_post; ?> = xhrts_coment<?php echo $id_post; ?>.response;
                        conteiner_input_coment<?php echo $id_post; ?>.innerHTML = data_coment<?php echo $id_post; ?>;
                        cont_coment<?php echo $id_post; ?> = 2;
                    }
                }
            }
            let formDatats_coment<?php echo $id_post; ?> = new FormData(formu<?php echo $id_post; ?>);
            xhrts_coment<?php echo $id_post; ?>.send(formDatats_coment<?php echo $id_post; ?>);
        } else {
            conteiner_input_coment<?php echo $id_post; ?>.innerHTML = "";
            cont_coment<?php echo $id_post; ?> = 1;
        }
    }


    function SendComent<?php echo $id_post; ?>() {
        let xhrts_add_coment<?php echo $id_post; ?> = new XMLHttpRequest();
        xhrts_add_coment<?php echo $id_post; ?>.open("POST", "keys/add-coments-key.php", true);
        xhrts_add_coment<?php echo $id_post; ?>.onload = () => {
            if (xhrts_add_coment<?php echo $id_post; ?>.readyState === XMLHttpRequest.DONE) {
                if (xhrts_add_coment<?php echo $id_post; ?>.status === 200) {
                    let data_add_coment<?php echo $id_post; ?> = xhrts_add_coment<?php echo $id_post; ?>.response;
                    
                    if(data_add_coment<?php echo $id_post; ?> == "successfull"){
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