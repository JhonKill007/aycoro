var segonload;
segonload = setInterval(awitload, 2000);

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


function scrollToBottom() {
    chatBox.scrollTop = chatBox.scrollHeight;
}




