<?php
require_once 'follow.php';

if (isset($_GET['follows']) && isset($_GET['id']) && isset($_GET['user'])) {

    $follow = new Follow();
    $id = (int)$_GET['id'];
    $user = (int)$_GET['user'];
    $data = $follow->getFollows($id, $user);
    echo json_encode($data);
}

if (isset($_GET['setfollow']) && isset($_GET['id']) && isset($_GET['user'])) {

    $follow = new Follow();
    $id = (int)$_GET['id'];
    $user = (int)$_GET['user'];
    $data = $follow->setFollows($id, $user);
    echo json_encode($data);
}
