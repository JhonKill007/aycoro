<?php
require "./db-config.php";


class Follow extends Database
{
    function __construct()
    {
    }

    function getFollows($id, $user)
    {
        $res = [];
        $query = $this->connect()->prepare("SELECT * FROM folow WHERE id_folowing = :user and id_folower = :id");
        $query->execute(['id' => $id, 'user' => $user]);
        $is_followed = $query->rowCount();

        $query = $this->connect()->prepare("SELECT * FROM folow WHERE id_folowing = :user");
        $query->execute(['user' => $user]);
        $folowers = $query->rowCount();

        $query = $this->connect()->prepare("SELECT * FROM folow WHERE id_folower = :user");
        $query->execute(['user' => $user]);
        $followings = $query->rowCount();

        $item = array(
            'id' => $id,
            'user' => $user,
            'is_followed' => $is_followed,
            'folowers' => $folowers,
            'followings' => $followings
        );

        array_push($res, $item);
        array_push($res, array('response' => "200"));
        return $res;
    }

    function setFollows($id, $user)
    {
        $res = [];
        $query = $this->connect()->prepare("SELECT * FROM folow WHERE id_folowing = :user and id_folower = :id");
        $query->execute(['id' => $id, 'user' => $user]);
        $is_followed = $query->rowCount();
        if ($is_followed == 1) {
            $query = $this->connect()->prepare("DELETE FROM folow WHERE id_folowing = :user and id_folower = :id");
            $query->execute(['id' => $id, 'user' => $user]);
            if ($query) {
                array_push($res, array('response' => "200"));
                return $res;
            } else {
                array_push($res, array('response' => "400"));
                return $res;
            }
        } else {
            $query = $this->connect()->prepare("INSERT INTO folow (id_folowing,id_folower,date_follow)values(:user, :id, NOW())");
            $query->execute(['id' => $id, 'user' => $user]);
            if ($query) {
                array_push($res, array('response' => "200"));
                return $res;
            } else {
                array_push($res, array('response' => "400"));
                return $res;
            }
        }
    }
}
