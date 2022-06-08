
async function LoadFollows(id, user) {
    const data = await getFollows(id, user);
    const response = data[0];
    if (data[1].response === '200') {
        showInfo(response);
    }
}


function getFollows(n, m) {
    const url = conn + '/keys/apifollow.php?follows=more&id=' + n + '&user=' + m;
    const response = this.fetch(url)
        .then(res => res.json())
        .then(data => data);
    return response;
}


function setFollow(n, m) {
    const url = conn + '/keys/apifollow.php?setfollow=more&id=' + n + '&user=' + m;
    const response = this.fetch(url)
        .then(res => res.json())
        .then(data => data);
    return response;
}



function showInfo(data) {
    var queryString = window.location.search;
    var urlParams = new URLSearchParams(queryString);
    var username = urlParams.get('user');
    let button = ``;
    let info_box = document.querySelector('#info-perfil-user');

    if (data.is_followed == 1) {
        button = `<div class="button_follow" onclick="ToFollow(${data.id}, ${data.user})">
                        <div class="icon_follow">
                            <i class="fas fa-user-check"></i>
                        </div>
                    </div>
                    <div class="message-icon-box">
                        <a href="dm?user=${username}">
                            <i class="fas fa-comment"></i>
                        </a>
                    </div>`
    }
    else {
        button = `<div class="button_follow" onclick="ToFollow(${data.id}, ${data.user})">
                        <div class="lettle-button-follow">
                            <b>Seguir</b>
                        </div>
                    </div>`
    }
    info_box.innerHTML = `
        <div class="buttons-box">
            ${button}
        </div>
        <div>
            <div class="cant_follow_conteiner"><a id="folowers_perfil" href="folows?o=2&user=${data.user}"><b>${data.folowers} Seguidores </b></a><span> | </span><a id="folowers_perfil" href="folows?o=1&user=${data.user}"><b> ${data.followings} Seguidos</b></a></div>
        </div>
        `;

}


function ToFollow(id, user) {
    const follow = setFollow(id, user);
    follow.then(e => {
        if(e[0].response == 200){
            LoadFollows(id, user);
        }
        
    });
}