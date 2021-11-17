
const formulario = document.querySelector(".formu"),
    errorText = document.querySelector(".error");

formulario.onsubmit = (e) => {
    e.preventDefault(); //previene el recargo de la pagina
}

document.querySelector('.button-log').addEventListener('click', () => {




    document.querySelector(".charger").classList.toggle("watch")
    document.querySelector(".conteiner-login").classList.toggle("hidde")

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "keys/log-in-key.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                // console.log(data);
                if (data == "success") {
                    location.href = "index"
                }
                else {
                    document.querySelector(".conteiner-login").classList.toggle("hidde")
                    document.querySelector(".charger").classList.toggle("watch")
                    errorText.innerHTML = data;
                }
            }
        }
    }
    // // vamos a mandar el formu data atraves de ajax a php
    let formData = new FormData(formulario); //creando el objeto formData
    xhr.send(formData); //enviando el formData a php



});