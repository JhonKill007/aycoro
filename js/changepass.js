
const formulario_password = document.querySelector(".formulario_password"),
    errorText_password = document.querySelector(".error");

formulario_password.onsubmit = (e) => {
    e.preventDefault(); //previene el recargo de la pagina
}

document.querySelector('.button-change-pass').addEventListener('click', () => {


    let xhr = new XMLHttpRequest();
    xhr.open("POST", "keys/change-password-key.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                // console.log(data);
                if (data == "success") {
                    location.href = "perfil"
                }
                else {
                    // errorText_password.textContent = data;
                    errorText_password.innerHTML = data;
                    // console.log(data);
                    // errorText_password.style.display = "block";
                }
                // errorText_password.innerHTML = data;
            }
        }
    }
    // // vamos a mandar el formu data atraves de ajax a php
    let formData = new FormData(formulario_password); //creando el objeto formData
    xhr.send(formData); //enviando el formData a php



});