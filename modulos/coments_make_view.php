<script>
    const conteiner_view_cant_coment<?php echo $id_post; ?> = document.querySelector(".conteiner_cant_coments_view<?php echo $id_post; ?>");
    var comentariosInitLoad = ViewComentCant<?php echo $id_post; ?>();

    function ViewComentCant<?php echo $id_post; ?>() {
        let xhrts_view_cant_coment<?php echo $id_post; ?> = new XMLHttpRequest();
        xhrts_view_cant_coment<?php echo $id_post; ?>.open("POST", "keys/cant_of_coment-key.php", true);
        xhrts_view_cant_coment<?php echo $id_post; ?>.onload = () => {
            if (xhrts_view_cant_coment<?php echo $id_post; ?>.readyState === XMLHttpRequest.DONE) {
                if (xhrts_view_cant_coment<?php echo $id_post; ?>.status === 200) {
                    let data_view_cant_coment<?php echo $id_post; ?> = xhrts_view_cant_coment<?php echo $id_post; ?>.response;
                    if (data_view_cant_coment<?php echo $id_post; ?> != "") {
                        conteiner_view_cant_coment<?php echo $id_post; ?>.innerHTML = data_view_cant_coment<?php echo $id_post; ?>;
                    }

                }
            }
        }
        let formDatats_view_cant_coment<?php echo $id_post; ?> = new FormData(formu<?php echo $id_post; ?>);
        xhrts_view_cant_coment<?php echo $id_post; ?>.send(formDatats_view_cant_coment<?php echo $id_post; ?>);
    }






    let cont_coment_view<?php echo $id_post; ?> = 1;
    const conteiner_view_coment<?php echo $id_post; ?> = document.querySelector(".coment-text-box<?php echo $id_post; ?>");

    var myVar<?php echo $id_post; ?>;

    function myStopFunction<?php echo $id_post; ?>() {
        clearInterval(myVar<?php echo $id_post; ?>);
    }

    function ViewComents<?php echo $id_post; ?>() {
        if (cont_coment_view<?php echo $id_post; ?> == 1) {
            let xhrts_view_coment<?php echo $id_post; ?> = new XMLHttpRequest();
            xhrts_view_coment<?php echo $id_post; ?>.open("POST", "keys/view-coments-key.php", true);
            xhrts_view_coment<?php echo $id_post; ?>.onload = () => {
                if (xhrts_view_coment<?php echo $id_post; ?>.readyState === XMLHttpRequest.DONE) {
                    if (xhrts_view_coment<?php echo $id_post; ?>.status === 200) {
                        let data_view_coment<?php echo $id_post; ?> = xhrts_view_coment<?php echo $id_post; ?>.response;
                        conteiner_view_coment<?php echo $id_post; ?>.innerHTML = data_view_coment<?php echo $id_post; ?>;
                        cont_coment_view<?php echo $id_post; ?> = 2;
                        myVar<?php echo $id_post; ?> = setInterval(reload<?php echo $id_post; ?>, 1000);

                    }
                }
            }
            let formDatats_view_coment<?php echo $id_post; ?> = new FormData(formu<?php echo $id_post; ?>);
            xhrts_view_coment<?php echo $id_post; ?>.send(formDatats_view_coment<?php echo $id_post; ?>);
        } else {
            myStopFunction<?php echo $id_post; ?>();
            conteiner_view_coment<?php echo $id_post; ?>.innerHTML = "";
            cont_coment_view<?php echo $id_post; ?> = 1;
        }
    }

    function reload<?php echo $id_post; ?>() {
        let xhrts_view_coment<?php echo $id_post; ?> = new XMLHttpRequest();
        xhrts_view_coment<?php echo $id_post; ?>.open("POST", "keys/view-coments-key.php", true);
        xhrts_view_coment<?php echo $id_post; ?>.onload = () => {
            if (xhrts_view_coment<?php echo $id_post; ?>.readyState === XMLHttpRequest.DONE) {
                if (xhrts_view_coment<?php echo $id_post; ?>.status === 200) {
                    let data_view_coment<?php echo $id_post; ?> = xhrts_view_coment<?php echo $id_post; ?>.response;
                    conteiner_view_coment<?php echo $id_post; ?>.innerHTML = data_view_coment<?php echo $id_post; ?>;
                    cont_coment_view<?php echo $id_post; ?> = 2;

                }
            }
        }
        let formDatats_view_coment<?php echo $id_post; ?> = new FormData(formu<?php echo $id_post; ?>);
        xhrts_view_coment<?php echo $id_post; ?>.send(formDatats_view_coment<?php echo $id_post; ?>);

    }
</script>