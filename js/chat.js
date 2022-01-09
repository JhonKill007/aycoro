var segonload;
segonload = setInterval(awitload, 1000);

function StopLoad() {
    clearInterval(segonload);
}

function awitload() {
    scrollToBottom();
}

var timeStop;
timeStop = window.setTimeout(clearLoad, 1000);

function clearLoad() {
    StopLoad();
}


const form = document.querySelector(".typing-area"),
    inputField = form.querySelector(".input-field"),
    sendBtn = form.querySelector("button"),
    chatBox = document.querySelector(".chat-box");



form.onsubmit = (e) => {
    e.preventDefault();
}


var cont = 1;
var save;




sendBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "keys/send-mensaje-key.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // console.log("enviado")
                inputField.value = "";
                scrollToBottom();
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}




chatBox.onmouseenter = () => {
    chatBox.classList.add("active");
}
chatBox.onmouseleave = () => {
    chatBox.classList.remove("active");
}


setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "keys/get-chat.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                chatBox.innerHTML = data;
                // if (!chatBox.classList.contains("active")) {
                // scrollToBottom();
                // }
                // timeIntervalID = window.setInterval(scrollToBottom, 3000);
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}, 500);




function scrollToBottom() {
    chatBox.scrollTop = chatBox.scrollHeight;
}


setInterval(() => {
    let xhrScroll = new XMLHttpRequest();
    xhrScroll.open("POST", "keys/get-date-scroll.php", true);
    xhrScroll.onload = () => {
        if (xhrScroll.readyState === XMLHttpRequest.DONE) {
            if (xhrScroll.status === 200) {
                let dataScroll = xhrScroll.response;

                if (cont == 1) {
                    scrollToBottom();
                    save = dataScroll;
                    cont += 1;
                }
                else {
                    if (save != dataScroll) {
                        scrollToBottom();
                        save = dataScroll;
                    }

                }
            }
        }
    }
    let formDataScroll = new FormData(form); 
    xhrScroll.send(formDataScroll);
}, 500);



