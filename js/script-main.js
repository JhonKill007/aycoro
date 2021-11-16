
document.querySelector('.message-btn').addEventListener('click', () => {
    document.querySelector(".bar-menu-rigth").classList.toggle("show")
    // console.log("hola");
})


document.querySelector('.menu-btn').addEventListener('click', () => {
    document.querySelector(".bar-menu").classList.toggle("showed")
    // console.log("hola");
})

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
        searchBar.classList.add("active");
    }
    else {
        searchBar.classList.remove("active");
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

window.onbeforeunload = function (e) {
    Swal.fire({
        title: 'ERROR!',
        text: 'La publicacion no pudo ser editada.',
        icon: 'error',
    }).then((result) => {
        location.reload();

    })
};

