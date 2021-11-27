
const formulario_identity = document.querySelector(".formulario_identity"),
    errorText = document.querySelector(".error");

formulario_identity.onsubmit = (e) => {
    e.preventDefault(); //previene el recargo de la pagina
}

document.querySelector('.button-identity').addEventListener('click', () => {
    

    document.querySelector(".charger").classList.toggle("watch")
    document.querySelector(".conteiner-signup").classList.toggle("hidde")

    let xhr_identity = new XMLHttpRequest();
    xhr_identity.open("POST", "keys/identity-key.php", true);
    xhr_identity.onload = () => {
        if (xhr_identity.readyState === XMLHttpRequest.DONE) {
            if (xhr_identity.status === 200) {
                let data_identity = xhr_identity.response;
                // console.log(data);
                if (data_identity == "success") {
                    Swal.fire({
                        title: 'Enviado',
                        icon: 'success',
                        text: 'Email enviado revisa tu correo'
                    }).then((result) => {
                        location.href = "index";

                    })
                    
                }
                else {
                    document.querySelector(".conteiner-signup").classList.toggle("hidde")
                    document.querySelector(".charger").classList.toggle("watch")
                    errorText.innerHTML = data_identity;

                }
            }
        }
    }
    // // vamos a mandar el formu data atraves de ajax a php
    let formData_identity = new FormData(formulario_identity); //creando el objeto formData
    xhr_identity.send(formData_identity); //enviando el formData a php



});