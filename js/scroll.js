function sinjQuery()
{
    //Obtengo el div
    // var e = document.getElementById('dm-letter');
    //Le añado otro mensaje
    // e.innerHTML += '<div class="chatMessage"></div>';
    //Llevo el scroll al fondo
    var objDiv = document.getElementById("dm-letter");
    objDiv.scrollTop = objDiv.scrollHeight;
}