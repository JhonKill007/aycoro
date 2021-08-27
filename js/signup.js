
const formulario = document.querySelector(".formulario"),
    errorText = document.querySelector(".error");

formulario.onsubmit = (e) => {
    e.preventDefault(); //previene el recargo de la pagina
}

document.querySelector('.button-sign').addEventListener('click', () => {


    let xhr = new XMLHttpRequest();
    xhr.open("POST", "keys/signup-key.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                // console.log(data);
                if (data == "success") {
                    location.href = "index"
                }
                else {
                    // errorText.textContent = data;
                    errorText.innerHTML = data;
                    // console.log(data);
                    // errorText.style.display = "block";
                }
                // errorText.innerHTML = data;
            }
        }
    }
    // // vamos a mandar el formu data atraves de ajax a php
    let formData = new FormData(formulario); //creando el objeto formData
    xhr.send(formData); //enviando el formData a php



});