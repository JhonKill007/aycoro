
const formulario_email = document.querySelector(".formulario_email"),
    errorText_email = document.querySelector(".error");

formulario_email.onsubmit = (e) => {
    e.preventDefault(); //previene el recargo de la pagina
}

document.querySelector('.button-change-email').addEventListener('click', () => {


    let xhr = new XMLHttpRequest();
    xhr.open("POST", "keys/change-email-key.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                // console.log(data);
                if (data == "success") {
                    location.href = "perfil"
                }
                else {
                    // errorText_email.textContent = data;
                    errorText_email.innerHTML = data;
                    // console.log(data);
                    // errorText_email.style.display = "block";
                }
                // errorText_email.innerHTML = data;
            }
        }
    }
    // // vamos a mandar el formu data atraves de ajax a php
    let formData = new FormData(formulario_email); //creando el objeto formData
    xhr.send(formData); //enviando el formData a php



});