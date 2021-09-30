

// botones post responsive


// primera barra
document.querySelector('.box-i-photo-a').addEventListener('click',() => {
    document.querySelector(".create-box-two-a").classList.toggle("watch")
    document.querySelector(".create-box-two-b").classList.toggle("watch")
})

document.querySelector('.box-i-event-a').addEventListener('click',() => {
    document.querySelector(".create-box-two-a").classList.toggle("watch")
    document.querySelector(".create-box-two-c").classList.toggle("watch")
})

document.querySelector('.box-i-stat-a').addEventListener('click',() => {
    document.querySelector(".create-box-two-a").classList.toggle("watch")
    document.querySelector(".create-box-two-d").classList.toggle("watch")
})

// barra de  post photo

document.querySelector('.box-i-photo-b').addEventListener('click',() => {
    document.querySelector(".create-box-two-b").classList.toggle("watch")
    document.querySelector(".create-box-two-a").classList.toggle("watch")
})

document.querySelector('.box-i-event-b').addEventListener('click',() => {
    document.querySelector(".create-box-two-b").classList.toggle("watch")
    document.querySelector(".create-box-two-c").classList.toggle("watch")
})

document.querySelector('.box-i-stat-b').addEventListener('click',() => {
    document.querySelector(".create-box-two-b").classList.toggle("watch")
    document.querySelector(".create-box-two-d").classList.toggle("watch")
})

// barra de evento

document.querySelector('.box-i-photo-c').addEventListener('click',() => {
    document.querySelector(".create-box-two-c").classList.toggle("watch")
    document.querySelector(".create-box-two-b").classList.toggle("watch")
})


document.querySelector('.box-i-event-c').addEventListener('click',() => {
    document.querySelector(".create-box-two-c").classList.toggle("watch")
    document.querySelector(".create-box-two-a").classList.toggle("watch")
})

document.querySelector('.box-i-stat-c').addEventListener('click',() => {
    document.querySelector(".create-box-two-c").classList.toggle("watch")
    document.querySelector(".create-box-two-d").classList.toggle("watch")
})

// barra de estados

document.querySelector('.box-i-photo-d').addEventListener('click',() => {
    document.querySelector(".create-box-two-d").classList.toggle("watch")
    document.querySelector(".create-box-two-b").classList.toggle("watch")
})

document.querySelector('.box-i-event-d').addEventListener('click',() => {
    document.querySelector(".create-box-two-d").classList.toggle("watch")
    document.querySelector(".create-box-two-c").classList.toggle("watch")
})

document.querySelector('.box-i-stat-d').addEventListener('click',() => {
    document.querySelector(".create-box-two-d").classList.toggle("watch")
    document.querySelector(".create-box-two-a").classList.toggle("watch")
})






document.querySelector('.message-btn').addEventListener('click',() => {
    document.querySelector(".bar-menu-rigth").classList.toggle("show")
    // console.log("hola");
})


document.querySelector('.menu-btn').addEventListener('click',() => {
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




//botones post
let ciclo=0;
document.querySelector('.photo-post').addEventListener('click',() => {
    document.querySelector(".box-up-two").classList.toggle("show")
    document.querySelector(".box-up-one").classList.toggle("show")
})

document.querySelector('.photo-post-two').addEventListener('click',() => {
    document.querySelector(".box-up-three").classList.toggle("show")
    document.querySelector(".box-up-one").classList.toggle("show")
})


document.querySelector('.event-post').addEventListener('click',() => {
    document.querySelector(".box-up-one").classList.toggle("show")
    document.querySelector(".box-up-two").classList.toggle("show")
    
    // console.log("hola");
})

document.querySelector('.event-post-two').addEventListener('click',() => {
    document.querySelector(".box-up-three").classList.toggle("show")
    document.querySelector(".box-up-two").classList.toggle("show")
    
    // console.log("hola");
})

document.querySelector('.post-write').addEventListener('click',() => {
    document.querySelector(".box-up-one").classList.toggle("show")
    document.querySelector(".box-up-three").classList.toggle("show")
    
    // console.log("hola");
})

document.querySelector('.post-write-two').addEventListener('click',() => {
    document.querySelector(".box-up-two").classList.toggle("show")
    document.querySelector(".box-up-three").classList.toggle("show")
    
    // console.log("hola");
})


const time = Intl.DateTimeFormat().resolvedOptions().timeZone;
document.getElementById("time1").value = time;
document.getElementById("time2").value = time;
document.getElementById("time3").value = time;
document.getElementById("time4").value = time;
document.getElementById("time5").value = time;
document.getElementById("time6").value = time;
