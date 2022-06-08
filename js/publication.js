let block = false;
let page = 0;
let idsession = 0;
let idus = 0;
// const conn = 'http://localhost/aycoro';
// const conn = 'http://192.168.1.159/aycoro';
const conn = 'https://aycoro.com';



window.addEventListener("scroll", async function (event) {
    const scrollHeight = this.scrollY;
    const viewportHeight = document.documentElement.clientHeight;
    const moreScroll = document.getElementById('publications-end').offsetTop;
    const currentScroll = scrollHeight + viewportHeight;


    if ((currentScroll >= moreScroll) && block === false) {
        document.querySelector(".charger_post").classList.toggle("watch");
        block = true;

        this.setTimeout(() => {
            loadItems(idsession, idus);
            block = false;
            document.querySelector(".charger_post").classList.toggle("watch");
        }, 1000);
    }
});

async function loadItems(id, user) {
    switch (window.location.pathname) {
        // case '/aycoro/':
        case '/':
            const data = await getFollowPost(page, id);
            const response = data[0];

            if (response.response === '200') {
                const items = data[1];
                page = data[2].page;

                renderItems(items);
            }
            break;
        // case '/aycoro/index':
        case '/index':
            const data1 = await getFollowPost(page, id);
            const response1 = data1[0];

            if (response1.response === '200') {
                const items = data1[1];
                page = data1[2].page;

                renderItems(items);
            }
            break;
        // case '/aycoro/explorador':
        case '/explorador':
            const data2 = await getExplorerPost(page, id);
            const response2 = data2[0];

            if (response2.response === '200') {
                const items = data2[1];
                page = data2[2].page;

                renderItems(items);
            }
            break;
        // case '/aycoro/perfil':
        case '/perfil':
            const data3 = await getUserPost(page, id, user);
            const response3 = data3[0];

            if (response3.response === '200') {
                const items = data3[1];
                page = data3[2].page;

                renderItems(items);
            }
            break;
        // case '/aycoro/user':
        case '/user':
            const data4 = await getUserPost(page, id, user);
            const response4 = data4[0];

            if (response4.response === '200') {
                const items = data4[1];
                page = data4[2].page;

                renderItems(items);
            }
            break;
    }
}

function getFollowPost(n, m) {
    const url = conn + '/keys/api.php?action=more&page=' + n + '&id=' + m;
    const response = this.fetch(url)
        .then(res => res.json())
        .then(data => data);

    return response;
}


function getExplorerPost(n, m) {
    const url = conn + '/keys/api.php?explorer=more&page=' + n + '&id=' + m;
    const response = this.fetch(url)
        .then(res => res.json())
        .then(data => data);

    return response;
}

function getUserPost(n, m, o) {
    const url = conn + '/keys/api.php?user=more&page=' + n + '&id=' + m + '&iduser=' + o;
    const response = this.fetch(url)
        .then(res => res.json())
        .then(data => data);

    return response;
}


function setLike(n, m) {
    const url = conn + '/keys/api.php?idpost=' + n + '&idliker=' + m;
    const response = this.fetch(url)
        .then(res => res.json())
        .then(data => data);
    return response;
}


function setComent(n, m, o) {
    const url = conn + '/keys/api.php?idpostsecoment=' + n + '&owner=' + m + '&coment=' + o;
    const response = this.fetch(url)
        .then(res => res.json())
        .then(data => data);
    return response;
}

function getComments(id) {
    const url = conn + '/keys/api.php?idpostforcoments=' + id;
    const response = this.fetch(url)
        .then(res => res.json())
        .then(data => data);
    return response;
}

function Delete(id) {
    const url = conn + '/keys/api.php?idpostdelete=' + id;
    const response = this.fetch(url)
        .then(res => res.json())
        .then(data => data);
    return response;
}

function Edit(n, m, o) {
    const url = conn + '/keys/api.php?idpostedit=' + n + '&new=' + m + '&old=' + o;
    const response = this.fetch(url)
        .then(res => res.json())
        .then(data => data);
    return response;
}


function renderItems(data) {
    let publication = document.querySelector('#publication');
    data.forEach(element => {

        idsession = element.id_log;
        idus = element.id_user;

        let setting_string = ``;
        let ruta_perfil = ``;
        let like_isActive = ``;
        let cant_of_like = ``;



        if (element.id_owner == element.id_log) {
            setting_string = `<div class="post_setting">
                                    <div class="box_setting" onclick="watchSettings(${element.id})">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </div>
                                </div>`;
            ruta_perfil = `<a href="perfil"><b>${element.username}</b></a>`;
        }
        else {
            ruta_perfil = `<a href="user?user=${element.username}"><b>${element.username}</b></a>`;
        }


        if (element.knowlike == 1) {
            like_isActive = `<div class="buton_like" onclick="MakeLike(${element.id}, ${element.id_log})"><i class="fas fa-heart likeclass${element.id} like-heart red"></i></div>`;
        }
        else {
            like_isActive = `<div class="buton_like" onclick="MakeLike(${element.id}, ${element.id_log})"><i class="fas fa-heart likeclass${element.id} like-heart"></i></div>`;
        }


        if (element.cant_of_likes > 0) {
            cant_of_like = `<b>${element.cant_of_likes} Likes</b>`;
        }


        if (element.image) {
            publication.innerHTML += `


            <div class="publicacion" id="publicacion${element.id}">
                <div class="post_head">
                    <div class="profile_photo_post_box">
                        <div class="photobox_post"><img src="${element.profile_photo}" alt="" /></div>
                    </div>
                    <div class="name_text_post_container">
                        ${ruta_perfil}
                        <br/>
                        <div class="text_post">
                            <span id="stado${element.id}">${element.text}</span>
                        </div>
                    </div>
                    <div class="setting_post_container">
                        ${setting_string}
                        <div>
                            <div class="options-edit-post options-edit-post_space setting${element.id}">
                                <div class="options-edit-post"><br>
                                    <ul>
                                        <li onclick="EditPost(${element.id})"><b class="text-gren">Editar</b></li>
                                        <li onclick="DeletePost(${element.id})"><b class="text-red">Eliminar</b></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pub-img-box">
                    <img src="${element.image}" alt="">
                </div>
                <div class="display-form">
                    <div class="like">
                        ${like_isActive}
                    </div>
                    <div class="coment-box" onclick="OpenInputComent(${element.id})">
                        <div><i class="fas fa-comment conment-icon"></i></div>
                    </div>
                    <div class="date-box">
                        <div class="date-box-container">
                            <span class="fecha">${element.hour} ${element.date}</span>
                        </div>
                    </div>
                </div>
                <div class="cantoflikes" id="cantoflike${element.id}">
                    ${cant_of_like}
                </div>
                <div class="cantoflikes coment_sp" id="cantofcomment${element.id}">
                </div>
                <div class="piecera">
                        <div class="coment_add_box conteiner_coment_input${element.id}">
                            <div class="coment_add_box_send">
                                <div class="coment_add_box_center">
                                    <div class="coment_add_input"><input class="form-control" id="coment_value${element.id}" maxlength="900" autocomplete="off" placeholder="Agrega un comentario..." type="text"></div>
                                    <div class="coment_add_buttons"><button class="btn btn-success" onclick="SendComent(${element.id}, ${element.id_log})">Publicar</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="coment-text-box commets${element.id}" id="allcoments${element.id}">
                        </div>
    
                </div>
                <hr/>
            </div>`;
        }
        else {
            publication.innerHTML += `


            <div class="publicacion" id="publicacion${element.id}">
                <div class="post_head">
                    <div class="profile_photo_post_box">
                        <div class="photobox_post"><img src="${element.profile_photo}" alt="" /></div>
                    </div>
                    <div class="name_text_post_container">
                        ${ruta_perfil}
                        <br/>
                        <div class="text_post">
                            <span id="stado${element.id}">${element.text}</span>
                        </div>
                    </div>
                    <div class="setting_post_container">
                        ${setting_string}
                        <div>
                            <div class="options-edit-post options-edit-post_space setting${element.id}">
                                <div class="options-edit-post"><br>
                                    <ul>
                                        <li onclick="EditPost(${element.id})"><b class="text-gren">Editar</b></li>
                                        <li onclick="DeletePost(${element.id})"><b class="text-red">Eliminar</b></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
                <div class="display-form">
                    <div class="like">
                        ${like_isActive}
                    </div>
                    <div class="coment-box" onclick="OpenInputComent(${element.id})">
                        <div><i class="fas fa-comment conment-icon"></i></div>
                    </div>
                    <div class="date-box">
                        <div class="date-box-container">
                            <span class="fecha">${element.hour} ${element.date}</span>
                        </div>
                    </div>
                </div>
                <div class="cantoflikes" id="cantoflike${element.id}">
                    ${cant_of_like}
                </div>
                <div class="cantoflikes coment_sp" id="cantofcomment${element.id}">
                </div>
                <div class="piecera">
                        <div class="coment_add_box conteiner_coment_input${element.id}">
                            <div class="coment_add_box_send">
                                <div class="coment_add_box_center">
                                    <div class="coment_add_input"><input class="form-control" id="coment_value${element.id}" maxlength="900" autocomplete="off" placeholder="Agrega un comentario..." type="text"></div>
                                    <div class="coment_add_buttons"><button class="btn btn-success" onclick="SendComent(${element.id}, ${element.id_log})">Publicar</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="coment-text-box commets${element.id}" id="allcoments${element.id}">
                        </div>
    
                </div>
                <hr/>
            </div>`;
        }




        gettingComents(element.id);
    });

    publication.innerHTML += `<div class="publicacion">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6464187088568984"
         crossorigin="anonymous"></script>
    <ins class="adsbygoogle"
         style="display:block"
         data-ad-client="ca-pub-6464187088568984"
         data-ad-slot="8349709873"
         data-ad-format="auto"
         data-full-width-responsive="true"></ins>
    <script>
         (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    </div>
    `;



}
function watchSettings(w) {
    document.querySelector(`.setting${w}`).classList.toggle("show");
}

function OpenInputComent(w) {
    document.querySelector(`.conteiner_coment_input${w}`).classList.toggle("show");
}

function MakeLike(w, m) {
    let cantoflike_box = document.querySelector(`#cantoflike${w}`);
    document.querySelector(`.likeclass${w}`).classList.toggle("red");
    const data = setLike(w, m);
    data.then(e =>
        e.forEach(element => {
            if (element.cant_of_likes > 0) {
                cantoflike_box.innerHTML = `<b>${element.cant_of_likes} Likes</b>`;
            } else {
                cantoflike_box.innerHTML = ``;
            }
        }));


}

function gettingComents(idpost) {
    const coment_response = getComments(idpost);
    coment_response.then(a => {
        if (a[2].cant_of_comments > 0) {
            let cantofcomet_box = document.querySelector(`#cantofcomment${idpost}`);
            let allcomments = document.querySelector(`#allcoments${idpost}`);
            cantofcomet_box.innerHTML += `<span class="title-coment" onclick="seeComents(${idpost})">Ver ${a[2].cant_of_comments} comentarios</span>`;

            a[1].forEach(e => {
                if (e.id_owner == idsession) {
                    allcomments.innerHTML += `<div class="model-coment-view">
                                            <a href="perfil">
                                                <div class="head_coment_text_box">
                                                    <div class="img_perfil_coment">
                                                        <img src="${e.profile_photo}" alt="">
                                                    </div>
                                                    <div class="name_perfil_coment">
                                                        <b>${e.username}</b>
                                                    </div>
                                                </div>
                                            </a>
    
                                            <div class="coment_value">
                                                <p>${e.text} <span class="coment_date">${e.date}</span></p>
                                            </div>
                                        </div>`;
                } else {
                    allcomments.innerHTML += `<div class="model-coment-view">
                                            <a href="user?user=${e.username}">
                                                <div class="head_coment_text_box">
                                                    <div class="img_perfil_coment">
                                                        <img src="${e.profile_photo}" alt="">
                                                    </div>
                                                    <div class="name_perfil_coment">
                                                        <b>${e.username}</b>
                                                    </div>
                                                </div>
                                            </a>
    
                                            <div class="coment_value">
                                                <p>${e.text} <span class="coment_date">${e.date}</span></p>
                                            </div>
                                        </div>`;
                }
            });
        }
    });
}

function seeComents(idpost) {
    document.querySelector(`.commets${idpost}`).classList.toggle("show");
}


function SendComent(idpost, idowner) {
    let coment = document.getElementById(`coment_value${idpost}`).value;
    if (coment) {
        const makecoment = setComent(idpost, idowner, coment);
        makecoment.then(a => {
            if (a[0].response == 200) {
                document.getElementById(`coment_value${idpost}`).value = ``;
                let cantofcomet_box = document.querySelector(`#cantofcomment${idpost}`);
                let allcomments = document.querySelector(`#allcoments${idpost}`);
                cantofcomet_box.innerHTML = ``;
                allcomments.innerHTML = ``;
                gettingComents(idpost);
            }
        })
    }
}

function EditPost(idpost) {
    let txt = document.getElementById(`stado${idpost}`);
    Swal.fire({
        input: 'textarea',
        inputLabel: 'Message',
        inputPlaceholder: 'Type your message here...',
        inputValue: txt.innerHTML,
        showCancelButton: true
    })
        .then((result) => {
            if (result.isConfirmed) {
                let string = result.value;
                let editar = Edit(idpost, string, txt.innerHTML);
                editar.then(a => {
                    if (a[0].response_i == 200) {
                        txt.innerHTML = string;
                        if ("success") {
                            Swal.fire({
                                title: 'Editado',
                                icon: 'success',
                            }).then((result) => { })
                        }
                    }
                })

            }
        })
    document.querySelector(`.setting${idpost}`).classList.toggle("show");
}

function DeletePost(idpost) {
    Swal.fire({
        title: 'Eliminar',
        text: "Deseas eliminar esta publicacion?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {
            const delete_post = Delete(idpost);
            delete_post.then(a => {
                if (a[0].response == 200) {
                    $(`#publicacion${idpost}`).remove();
                    Swal.fire({
                        title: 'Eliminado',
                        icon: 'success'
                    }).then((result) => { })
                }
            })
        }
    })
}

