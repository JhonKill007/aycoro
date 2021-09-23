<?php
if ($owner_post == $_SESSION['id']) {
?>
    <div class="post_setting">
        <div onclick="setting_post<?php echo $id_post; ?>()" class="box_setting">
            <i class="fas fa-ellipsis-h"></i>
        </div>
    </div>





    <div class="options-edit-post<?php echo $id_post; ?>">

    </div>
    <script>
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
                                        location.href = "index"

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



        function EditPost<?php echo $id_post; ?>() {

            (async () => {
                const inputValue = "<?php echo $estado_post; ?>";
                const {
                    value: ipAddress
                } = await Swal.fire({
                    title: 'Editar',
                    input: 'textarea',
                    inputLabel: 'Edita tu publicacion',
                    inputValue: inputValue,
                    showCancelButton: true,
                    inputValidator: (value) => {
                        if (!value) {
                            // Swal.fire(
                            //     'Editado!',
                            //     'Tu publicacion fue editada.',
                            //     'success'
                            // )

                            console.log(value);
                            document.getElementById("status_edit").value = value;

                            let xhrs<?php echo $id_post; ?> = new XMLHttpRequest();
                            xhrs<?php echo $id_post; ?>.open("POST", "keys/edit_post.php", true);
                            xhrs<?php echo $id_post; ?>.onload = () => {
                                if (xhrs<?php echo $id_post; ?>.readyState === XMLHttpRequest.DONE) {
                                    if (xhrs<?php echo $id_post; ?>.status === 200) {
                                        let datas<?php echo $id_post; ?> = xhrs<?php echo $id_post; ?>.response;
                                        // console.log(datas<?php echo $id_post; ?>);
                                        if (datas<?php echo $id_post; ?> == "success") {

                                            Swal.fire({
                                                title: 'Editado',
                                                icon: 'success',
                                                // text: datas<?php echo $id_post; ?>,
                                            }).then((result) => {
                                                location.href = "index"

                                            })


                                        } else {
                                            Swal.fire({
                                                title: 'ERROR!',
                                                text: 'La publicacion no pudo ser editada.',
                                                icon: 'error',
                                            }).then((result) => {
                                                location.href = "index"

                                            })
                                        }
                                    }
                                }
                            }
                            // // vamos a mandar el formu data atraves de ajax a php
                            let formDatas<?php echo $id_post; ?> = new FormData(formu<?php echo $id_post; ?>); //creando el objeto formData
                            xhrs<?php echo $id_post; ?>.send(formDatas<?php echo $id_post; ?>); //enviando el formData a php

                            // Swal.fire({
                            //     title: 'Eliminado',
                            //     icon: 'success',
                            //     text: value,
                            // }).then((result) => {
                            //     // location.href = "index"

                            // })
                        } else {
                            console.log(value);
                            document.getElementById("status_edit").value = value;

                            let xhrs<?php echo $id_post; ?> = new XMLHttpRequest();
                            xhrs<?php echo $id_post; ?>.open("POST", "keys/edit_post.php", true);
                            xhrs<?php echo $id_post; ?>.onload = () => {
                                if (xhrs<?php echo $id_post; ?>.readyState === XMLHttpRequest.DONE) {
                                    if (xhrs<?php echo $id_post; ?>.status === 200) {
                                        let datas<?php echo $id_post; ?> = xhrs<?php echo $id_post; ?>.response;
                                        // console.log(datas<?php echo $id_post; ?>);
                                        if (datas<?php echo $id_post; ?> == "success") {

                                            Swal.fire({
                                                title: 'Editado',
                                                icon: 'success',
                                            }).then((result) => {
                                                location.href = "index"

                                            })


                                        } else {
                                            Swal.fire({
                                                title: 'ERROR!',
                                                text: 'La publicacion no pudo ser editada.',
                                                icon: 'error',
                                            }).then((result) => {
                                                location.href = "index"

                                            })
                                        }
                                    }
                                }
                            }
                            // // vamos a mandar el formu data atraves de ajax a php
                            let formDatas<?php echo $id_post; ?> = new FormData(formu<?php echo $id_post; ?>); //creando el objeto formData
                            xhrs<?php echo $id_post; ?>.send(formDatas<?php echo $id_post; ?>); //enviando el formData a php

                            // Swal.fire({
                            //     title: 'Eliminado',
                            //     icon: 'success',
                            //     text: value,
                            // }).then((result) => {
                            //     // location.href = "index"

                            // })
                        }
                    }
                })

                // if (ipAddress) {
                //     Swal.fire(`Your IP address is ${ipAddress}`)
                // }

            })()
        }




        let optix<?php echo $id_post; ?> = 1;
        const Opt<?php echo $id_post; ?> = document.querySelector(".options-edit-post<?php echo $id_post; ?>");


        function setting_post<?php echo $id_post; ?>() {
            // document.querySelector(".options-edit-post").classList.toggle("show")
            // console.log("hola")

            if (optix<?php echo $id_post; ?> == 1) {
                let xhrt<?php echo $id_post; ?> = new XMLHttpRequest();
                xhrt<?php echo $id_post; ?>.open("POST", "modulos/options_edit.php", true);
                xhrt<?php echo $id_post; ?>.onload = () => {
                    if (xhrt<?php echo $id_post; ?>.readyState === XMLHttpRequest.DONE) {
                        if (xhrt<?php echo $id_post; ?>.status === 200) {
                            let datat<?php echo $id_post; ?> = xhrt<?php echo $id_post; ?>.response;
                            Opt<?php echo $id_post; ?>.innerHTML = datat<?php echo $id_post; ?>;
                            optix<?php echo $id_post; ?> = 2;
                        }
                    }
                }
                // vamos a mandar el form data atraves de ajax a php
                let formDatat<?php echo $id_post; ?> = new FormData(formu<?php echo $id_post; ?>); //creando el objeto formData
                xhrt<?php echo $id_post; ?>.send(formDatat<?php echo $id_post; ?>); //enviando el formData a php
            } else {
                Opt<?php echo $id_post; ?>.innerHTML = "";
                optix<?php echo $id_post; ?> = 1;
            }

        }
        // document.querySelector('.box_setting').addEventListener('click', () => {
        // })
    </script>
<?php
}
?>