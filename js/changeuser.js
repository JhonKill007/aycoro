
const formulario_user = document.querySelector(".formulario_user"),
    errorText_user = document.querySelector(".error");

formulario_user.onsubmit = (e) => {
    e.preventDefault(); //previene el recargo de la pagina
}

document.querySelector('.button-change-user').addEventListener('click', () => {


    let xhr = new XMLHttpRequest();
    xhr.open("POST", "keys/change-user-key.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                // console.log(data);
                if (data == "success") {
                    location.href = "perfil"
                }
                else {
                    // errorText_user.textContent = data;
                    errorText_user.innerHTML = data;
                    // console.log(data);
                    // errorText_user.style.display = "block";
                }
                // errorText_user.innerHTML = data;
            }
        }
    }
    // // vamos a mandar el formu data atraves de ajax a php
    let formData = new FormData(formulario_user); //creando el objeto formData
    xhr.send(formData); //enviando el formData a php



});