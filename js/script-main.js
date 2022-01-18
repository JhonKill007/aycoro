

var bar_mjs_nav = 1;
var varstopIntervalMjs;

const chatListaNav = document.querySelector(".chat-list-nav");


function StopFunctionIntervalMjs() {
    clearInterval(varstopIntervalMjs);
}

document.querySelector('.message-btn').addEventListener('click', () => {
    document.querySelector(".bar-menu-rigth").classList.toggle("show")
    if (bar_mjs_nav == 1) {
        bar_mjs_nav = 2;

        varstopIntervalMjs = setInterval(MsjBarRigthNav, 1000);

    }
    else {
        StopFunctionIntervalMjs();
        bar_mjs_nav = 1;
    }



})

document.querySelector('.menu-btn').addEventListener('click', () => {
    document.querySelector(".bar-menu").classList.toggle("showed")
})



function MsjBarRigthNav() {
    let xhrz = new XMLHttpRequest();
    xhrz.open("GET", "keys/message-nav-key.php", true);
    xhrz.onload = () => {
        if (xhrz.readyState === XMLHttpRequest.DONE) {
            if (xhrz.status === 200) {
                let datanav = xhrz.response;
                chatListaNav.innerHTML = datanav;
            }
        }
    }
    xhrz.send();
}


$(document).ready(function () {
    var back = document.getElementById("caja_de_historias");
    document.querySelector('.back_buton_history').addEventListener('click', () => {
        back.scrollLeft -= 200;
    })
    document.querySelector('.come_buton_history').addEventListener('click', () => {
        back.scrollLeft += 200;
    })
});


// button search responsive

const searchBar = document.querySelector(".search input"),
    searchBtn = document.querySelector(".search button"),
    usersList = document.querySelector(".users-list");

searchBtn.onclick = () => {
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle("active");
}

searchBar.onkeyup = () => {
    let searchTerm = searchBar.value;
    if (searchTerm != "") {
        // searchBar.classList.add("active");
    }
    else {
        // searchBar.classList.remove("active");
    }
}



const time = Intl.DateTimeFormat().resolvedOptions().timeZone;
document.getElementById("time1").value = time;
document.getElementById("time2").value = time;
document.getElementById("time3").value = time;
document.getElementById("time4").value = time;
document.getElementById("time5").value = time;
document.getElementById("time6").value = time;


// window.onbeforeunload = confirmExit;
//   function confirmExit()
//   {
//     return "You have attempted to leave this page.  If you have made any changes to the fields without clicking the Save button, your changes will be lost.  Are you sure you want to exit this page?";
//   }

// window.onbeforeunload = function (e) {
//     Swal.fire({
//         title: 'ERROR!',
//         text: 'La publicacion no pudo ser editada.',
//         icon: 'error',
//     }).then((result) => {
//         location.reload();

//     })
// };

function send_form() {
    document.all["form_files"].submit();
}


function quitCloseWindow() { // Called when a user clicks on the close button.
    Swal.fire({
        title: 'ERROR!',
        text: 'La publicacion no pudo ser editada.',
        icon: 'error',
    }).then((result) => {
        location.reload();

    })
    // What to do just before closing the window.
    chrome.app.window.current().close(); // Closing the window.
}




