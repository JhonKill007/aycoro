
const formulario_phone = document.querySelector(".formulario_phone"),
    errorText_phone = document.querySelector(".error");

formulario_phone.onsubmit = (e) => {
    e.preventDefault(); //previene el recargo de la pagina
}

document.querySelector('.button-change-phone').addEventListener('click', () => {


    let xhr = new XMLHttpRequest();
    xhr.open("POST", "keys/change-phone-key.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                // console.log(data);
                if (data == "success") {
                    location.href = "perfil"
                }
                else {
                    // errorText_phone.textContent = data;
                    errorText_phone.innerHTML = data;
                    // console.log(data);
                    // errorText_phone.style.display = "block";
                }
                // errorText_phone.innerHTML = data;
            }
        }
    }
    // // vamos a mandar el formu data atraves de ajax a php
    let formData = new FormData(formulario_phone); //creando el objeto formData
    xhr.send(formData); //enviando el formData a php



});