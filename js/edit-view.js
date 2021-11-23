var URL = window.URL || window.webkitURL;
var inputprueve = document.getElementById('inputprueve');
// index
var inputImage1 = document.getElementById('inputImage1');
var inputImagehistory1 = document.getElementById('inputImagehistory1');

// nav
var inputImage = document.getElementById('inputImage');
var inputImagehistory = document.getElementById('inputImagehistory');

// perfil
var inputImageperfil = document.getElementById('inputImageperfil');
var inputImageportada = document.getElementById('inputImageportada');


let extencion;

if (URL) {

    if (identity_page_post == 1) {
        // inputs index
        // post images
        inputImage1.onchange = function () {
            var files = this.files;
            var file;


            if (files && files.length) {
                file = files[0];
                extencion = file.name;
                let opt = 1;
                document.getElementById("option_view_opt").value = opt;
                getBase64(file);


            }
        };
        // post history
        inputImagehistory1.onchange = function () {
            var files = this.files;
            var file;


            if (files && files.length) {
                file = files[0];
                extencion = file.name;
                let opt = 2;
                document.getElementById("option_view_opt").value = opt;
                getBase64(file);
            }
        };
    }




    // inputs nav
    // post images
    inputImage.onchange = function () {

        var files = this.files;
        var file;


        if (files && files.length) {
            file = files[0];
            extencion = file.name;
            let opt = 1;
            document.getElementById("option_view_opt").value = opt;
            getBase64(file);
        }
    };

    // post history
    inputImagehistory.onchange = function () {
        var files = this.files;
        var file;


        if (files && files.length) {
            file = files[0];
            extencion = file.name;
            let opt = 2;
            document.getElementById("option_view_opt").value = opt;
            getBase64(file);
        }
    };

    if (identity_page_post == 2) {
        //   image perfil
        inputImageperfil.onchange = function () {
            var files = this.files;
            var file;


            if (files && files.length) {
                file = files[0];
                extencion = file.name;
                let opt = 4;
                document.getElementById("option_view_opt").value = opt;
                getBase64(file);
            }
        };

        //   image portada
        inputImageportada.onchange = function () {
            var files = this.files;
            var file;


            if (files && files.length) {
                file = files[0];
                extencion = file.name;
                let opt = 5;
                document.getElementById("option_view_opt").value = opt;
                getBase64(file);

            }
        };
    }
    if (identity_page_post == 3) {
        
        // post history page
        inputHistoryPage.onchange = function () {
            var files = this.files;
            var file;


            if (files && files.length) {
                file = files[0];
                extencion = file.name;
                let opt = 2;
                document.getElementById("option_view_opt").value = opt;
                getBase64(file);
            }
        };
    }
} else {
    inputImage.disabled = true;
    inputImage.parentNode.className += ' disabled';
}



function getBase64(file) {
    var reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = function () {
        var base64 = reader.result;
        document.getElementById("base64_ui").value = base64;
        document.getElementById("extencion_view_opt").value = extencion;
        const timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
        document.getElementById("time_view_opt").value = timezone;
        tu_funcion();
        // window.location = 'editor-view?files=' + base64 + '';
        // console.log(extencion);
    };
    // reader.onerror = function (error) {
    //     console.log('Error: ', error);
    // };
}

function tu_funcion() {
    document.all["thegodform"].submit();
    // console.log('Error: ', error);
}




