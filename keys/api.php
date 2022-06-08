<?php
require_once 'publication.php';

if (isset($_GET['action']) && isset($_GET['page']) && isset($_GET['id'])) {

    $publication = new Publication();
    $page = (int)$_GET['page'];
    $id = (int)$_GET['id'];
    $data = $publication->getFollowPost($page, $id);
    echo json_encode($data);
}

if (isset($_GET['explorer']) && isset($_GET['page']) && isset($_GET['id'])) {

    $publication = new Publication();
    $page = (int)$_GET['page'];
    $id = (int)$_GET['id'];
    $data = $publication->getExplorerPost($page, $id);
    echo json_encode($data);
}

if (isset($_GET['user']) && isset($_GET['page']) && isset($_GET['id']) && isset($_GET['iduser'])) {

    $publication = new Publication();
    $page = (int)$_GET['page'];
    $id = (int)$_GET['id'];
    $iduser = (int)$_GET['iduser'];
    $data = $publication->getUserPost($page, $id, $iduser);
    echo json_encode($data);
}

if (isset($_GET['idpost']) && isset($_GET['idliker'])) {

    $publication = new Publication();
    $idpost = (int)$_GET['idpost'];
    $idliker = (int)$_GET['idliker'];
    $data = $publication->setLike($idpost, $idliker);
    echo json_encode($data);
}

if (isset($_GET['idpostforcoments'])) {

    $publication = new Publication();
    $idpost = (int)$_GET['idpostforcoments'];
    $data = $publication->getCommets($idpost);
    echo json_encode($data);
}

if (isset($_GET['idpostsecoment']) && isset($_GET['owner']) && isset($_GET['coment'])) {

    $publication = new Publication();
    $idpost = (int)$_GET['idpostsecoment'];
    $idowner = (int)$_GET['owner'];
    $coment = $_GET['coment'];
    $data = $publication->setCommet($idpost, $idowner, $coment);
    echo json_encode($data);
}

if (isset($_GET['idpostdelete'])) {

    $publication = new Publication();
    $idpost = (int)$_GET['idpostdelete'];
    $data = $publication->DeletePost($idpost);
    echo json_encode($data);
}

if (isset($_GET['idpostedit']) && isset($_GET['old']) && isset($_GET['new'])) {

    $publication = new Publication();
    $idpost = (int)$_GET['idpostedit'];
    $old = $_GET['old'];
    $new = $_GET['new'];
    $data = $publication->EditePost($idpost, $new, $old);
    echo json_encode($data);
}
