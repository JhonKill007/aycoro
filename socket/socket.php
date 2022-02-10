<script>
    // const pathOne = '/aycoro/aycoro/dm';
    // const pathTwo = '/aycoro/aycoro/dm-secrete';
    // const pathTree = '/aycoro/aycoro/dm_';
    // const pathFour = '/aycoro/aycoro/message';

    const pathOne = '/dm';
    const pathTwo = '/dm-secrete';
    const pathTree = '/dm_';
    const pathFour = '/message';
    var LocationPath = location.pathname;

    const MonViewTwo = document.querySelector(".num-message-bar-Two");
    const MonView = document.querySelector(".num-message");
    var hoy = new Date();
    var fecha = hoy.getDate() + '-' + (hoy.getMonth() + 1) + '-' + hoy.getFullYear();






    $(document).ready(function(e) {
        chatCount();
        getData();

        var conn = new WebSocket('ws://localhost:8080');
        conn.onopen = function(e) {
            // console.log("Connection established!");
        };

        conn.onmessage = function(e) {
            var obj = JSON.parse(e.data);
            const id_registro = <?php echo $registro['id_registro']; ?>;


            console.log('id_sendner: ' + obj.id_sendner +
                ' id_reciver: ' + obj.id_reciver +
                ' mensaje: ' + obj.mensaje +
                ' foto: ' + obj.foto);


            if (id_registro == obj.id_reciver) {
                chatCount();
                MsjBarRigthNav();
                if (LocationPath == pathFour) {
                    getdataPage();
                }
                if (obj.createdms == 1 || obj.createdms == 2) {
                    $('#chat-boox').append('<div class="chat incoming"><img src="' + obj.foto + '" alt=""><div class="details"><p>' + obj.mensaje + '<br> <span class="time_date intime">' + obj.hora + ' ' + obj.dia + '</span></p></div></div>');
                }
                if (obj.createdms == 0) {
                    $('#chat-boox').append('<div class="chat incoming"><img src="img/usuario.png" alt=""><div class="details"><p>' + obj.mensaje + '<br> <span class="time_date intime">' + obj.hora + ' ' + obj.dia + '</span></p></div></div>');
                }
                scrollToBottom();
            }
        };

        $('#btn').click(function(e) {
            var id_sendner = $('#id_sendner').val();
            var id_reciver = $('#id_reciver').val();
            var mgsprivate = $('#mgsprivate').val();
            var time_mjs = $('#time_mjs').val();
            var vista = $('#vista').val();
            var createdms = $('#createdms').val();
            var mensaje = $('#mensaje').val();
            var foto = $('#foto_user').val();
            var day = hoy.getDate();
            var month = hoy.getMonth() + 1;
            var year = hoy.getFullYear();
            var newDay = hoy.getDate();
            var newMonth = hoy.getMonth() + 1;
            if (day < 10) {
                var newDay = '0' + day;
            }
            if (month < 10) {
                var newMonth = '0' + month;
            }
            var dia = newDay + '-' + newMonth + '-' + hoy.getFullYear();
            var justHour = hoy.getHours();
            if (justHour > 12) {
                var NewHour = justHour - 12;
                if (NewHour < 10) {
                    if (hoy.getMinutes() < 10) {
                        var hora = '0' + NewHour + ':' + '0' + hoy.getMinutes() + ' pm';
                    } else {
                        var hora = '0' + NewHour + ':' + hoy.getMinutes() + ' pm';
                    }
                } else {
                    if (hoy.getMinutes() < 10) {
                        var hora = NewHour + ':' + '0' + hoy.getMinutes() + ' pm';
                    } else {
                        var hora = NewHour + ':' + hoy.getMinutes() + ' pm';
                    }
                }
            } else {
                if (justHour < 10) {
                    if (hoy.getMinutes() < 10) {
                        var hora = '0' + hoy.getHours() + ':' + '0' + hoy.getMinutes() + ' am';
                    } else {
                        var hora = '0' + hoy.getHours() + ':' + hoy.getMinutes() + ' am';
                    }
                } else {
                    if (hoy.getMinutes() < 10) {
                        var hora = hoy.getHours() + ':' + '0' + hoy.getMinutes() + ' am';
                    } else {
                        var hora = hoy.getHours() + ':' + hoy.getMinutes() + ' am';
                    }
                }
            }

            var enviar = {
                'id_sendner': id_sendner,
                'id_reciver': id_reciver,
                'mgsprivate': mgsprivate,
                'time_mjs': time_mjs,
                'vista': vista,
                'createdms': createdms,
                'mensaje': mensaje,
                'dia': dia,
                'hora': hora,
                'foto': foto
            };


            // console.log(enviar);


            $("#tittleOfEmpty").html("");
            $('#chat-boox').append('<div class="chat outgoing"><div class="details"><p>' + mensaje + '<br>  <span class = "time_date outtime" > ' + hora +
                ' ' + dia +
                '</span></p></div></div>');
            var sendMensaje = SaveMessaje();

            // console.log(sendMensaje);

            var sendDAta = conn.send(JSON.stringify(enviar));
            MsjBarRigthNav();
        });
    });





    function SaveMessaje() {
        var status = true;
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "keys/send-mensaje-key.php", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    inputField.value = "";
                    scrollToBottom();
                } else {
                    status = false;
                }
            }
        }
        let formData = new FormData(form);
        xhr.send(formData);
        return status;
    }

    function chatCount() {
        let xhrz = new XMLHttpRequest();
        xhrz.open("GET", "keys/num-onview-key.php", true);
        xhrz.onload = () => {
            if (xhrz.readyState === XMLHttpRequest.DONE) {
                if (xhrz.status === 200) {
                    let datoview = xhrz.response;
                    MonView.innerHTML = datoview;
                    MonViewTwo.innerHTML = datoview;
                    MonViewone.innerHTML = datoview;
                }
            }
        }
        xhrz.send();
    }

    function getData() {
        if (LocationPath == pathOne || LocationPath == pathTwo || LocationPath == pathTree) {

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "keys/get-chat.php", true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        let data = xhr.response;
                        $('#chat-boox').append(data);
                        scrollToBottom();
                    }
                }
            }
            let formData = new FormData(form);
            xhr.send(formData);
        }
    }
</script>