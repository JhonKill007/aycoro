
const form = document.querySelector(".typing-area"),
    inputField = form.querySelector(".input-field"),
    sendBtn = form.querySelector("button"),
    chatBox = document.querySelector(".chat-box");



form.onsubmit = (e) => {
    e.preventDefault(); //previene el recargo de la pagina
}


sendBtn.onclick = () => {
    // console.log("hello");
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "keys/send-mensaje-discusion-key.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                inputField.value = "";
                scrollToBottom();
            }
        }
    }
    // vamos a mandar el form data atraves de ajax a php
    let formData = new FormData(form); //creando el objeto formData
    xhr.send(formData);  //enviando el formData a php

}

chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}
chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}


setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "keys/get-chat-discusion.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                chatBox.innerHTML = data;
                if(!chatBox.classList.contains("active")){
                    scrollToBottom();
                }
            }
        }
    }
    // vamos a mandar el form data atraves de ajax a php
    let formData = new FormData(form); //creando el objeto formData
    xhr.send(formData);  //enviando el formData a php
}, 500);

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;

    // var objDiv = document.getElementById("chat-box");
    // objDiv.scrollTop = objDiv.scrollHeight;
}
