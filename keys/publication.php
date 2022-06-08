<?php
require "./db-config.php";


class Publication extends Database
{
    function __construct()
    {
    }

    function getFollowPost($section, $id)
    {
        $query = $this->connect()->prepare("SELECT * from folow inner join post on folow.id_folowing = post.owner inner join registro on post.owner=registro.id_registro where folow.id_folower= :id AND post.status = 'Active' ORDER BY id_post DESC limit :section, 5");
        $query->execute(['id' => $id, 'section' => $section]);
        $res = [];
        $items = [];
        $n = $query->rowCount();
        if ($n) {
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $likequery = $this->connect()->prepare("SELECT * FROM likes WHERE id_post = :idpost and id_liker = :idliker");
                $likequery->execute(['idpost' => $row['id_post'], 'idliker' => $id]);
                $u = $likequery->rowCount();

                $query_cantof_like = $this->connect()->prepare("SELECT * FROM likes WHERE id_post = :idpost");
                $query_cantof_like->execute(['idpost' => $row['id_post']]);
                $cant_of_like = $query_cantof_like->rowCount();

                $item = array(
                    'id' => $row['id_post'],
                    'username' => $row['usuario'],
                    'profile_photo' => $row['foto'],
                    'image' => $row['photo_post'],
                    'text' => $row['estado_post'],
                    'hour' => $row['hour'],
                    'date' => $row['day'],
                    'id_owner' => $row['owner'],
                    'id_log' => $id,
                    'id_user' => $id,
                    'knowlike' => $u,
                    'cant_of_likes' => $cant_of_like,
                );
                array_push($items, $item);
            }
            array_push($res, array('response' => "200"));
            array_push($res, $items);
            array_push($res, array('page' => ($section + $n)));
            return $res;
        } else {
            array_push($res, array('response' => "400"));
            return $res;
        }
    }

    function getExplorerPost($section, $id)
    {
        $query = $this->connect()->prepare("SELECT * FROM post inner join registro on post.owner=registro.id_registro WHERE post.status = 'Active' ORDER BY id_post DESC limit :section, 5");
        $query->execute(['section' => $section]);
        $res = [];
        $items = [];
        $n = $query->rowCount();
        if ($n) {
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $likequery = $this->connect()->prepare("SELECT * FROM likes WHERE id_post = :idpost and id_liker = :idliker");
                $likequery->execute(['idpost' => $row['id_post'], 'idliker' => $id]);
                $u = $likequery->rowCount();

                $query_cantof_like = $this->connect()->prepare("SELECT * FROM likes WHERE id_post = :idpost");
                $query_cantof_like->execute(['idpost' => $row['id_post']]);
                $cant_of_like = $query_cantof_like->rowCount();

                $item = array(
                    'id' => $row['id_post'],
                    'username' => $row['usuario'],
                    'profile_photo' => $row['foto'],
                    'image' => $row['photo_post'],
                    'text' => $row['estado_post'],
                    'hour' => $row['hour'],
                    'date' => $row['day'],
                    'id_owner' => $row['owner'],
                    'id_log' => $id,
                    'id_user' => $id,
                    'knowlike' => $u,
                    'cant_of_likes' => $cant_of_like,
                );
                array_push($items, $item);
            }
            array_push($res, array('response' => "200"));
            array_push($res, $items);
            array_push($res, array('page' => ($section + $n)));
            return $res;
        } else {
            array_push($res, array('response' => "400"));
            return $res;
        }
    }

    function getUserPost($section, $id, $iduser)
    {
        $query = $this->connect()->prepare("SELECT * FROM post inner join registro on post.owner=registro.id_registro where owner = :id AND post.status = 'Active' ORDER BY id_post DESC limit :section, 5");
        $query->execute(['id' => $iduser, 'section' => $section]);
        $res = [];
        $items = [];
        $n = $query->rowCount();
        if ($n) {
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $likequery = $this->connect()->prepare("SELECT * FROM likes WHERE id_post = :idpost and id_liker = :idliker");
                $likequery->execute(['idpost' => $row['id_post'], 'idliker' => $id]);
                $u = $likequery->rowCount();

                $query_cantof_like = $this->connect()->prepare("SELECT * FROM likes WHERE id_post = :idpost");
                $query_cantof_like->execute(['idpost' => $row['id_post']]);
                $cant_of_like = $query_cantof_like->rowCount();

                $item = array(
                    'id' => $row['id_post'],
                    'username' => $row['usuario'],
                    'profile_photo' => $row['foto'],
                    'image' => $row['photo_post'],
                    'text' => $row['estado_post'],
                    'hour' => $row['hour'],
                    'date' => $row['day'],
                    'id_owner' => $row['owner'],
                    'id_log' => $id,
                    'id_user' => $iduser,
                    'knowlike' => $u,
                    'cant_of_likes' => $cant_of_like,
                );
                array_push($items, $item);
            }
            array_push($res, array('response' => "200"));
            array_push($res, $items);
            array_push($res, array('page' => ($section + $n)));
            return $res;
        } else {
            array_push($res, array('response' => "400"));
            return $res;
        }
    }

    function setLike($idpost, $idliker)
    {
        $res = [];
        $query = $this->connect()->prepare("SELECT * FROM likes WHERE id_post = :idpost and id_liker = :idliker");
        $query->execute(['idpost' => $idpost, 'idliker' => $idliker]);
        $u = $query->rowCount();

        if ($u == 0) {
            $likequery = $this->connect()->prepare("INSERT INTO likes (id_post,id_liker,date_like)values(:idpost, :idliker, NOW())");
            $likequery->execute(['idpost' => $idpost, 'idliker' => $idliker]);
        } else {
            $likequery = $this->connect()->prepare("DELETE FROM likes WHERE id_post = :idpost and id_liker = :idliker");
            $likequery->execute(['idpost' => $idpost, 'idliker' => $idliker]);
        }

        $query_cantof_like = $this->connect()->prepare("SELECT * FROM likes WHERE id_post = :idpost");
        $query_cantof_like->execute(['idpost' => $idpost]);
        $cant_of_like = $query_cantof_like->rowCount();
        $item = array(
            'id_post' => $idpost,
            'id_liker' => $idliker,
            'cant_of_likes' => $cant_of_like,
        );
        array_push($res, $item);
        return $res;
    }

    function getCommets($idpost)
    {
        $res = [];
        $items = [];
        $query = $this->connect()->prepare("SELECT * FROM comentarios INNER JOIN registro ON comentarios.id_coment_owner = registro.id_registro WHERE id_publicacion = :idpost ORDER BY id_comentario DESC");
        $query->execute(['idpost' => $idpost]);
        $u = $query->rowCount();

        if ($u) {
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $item = array(
                    'id' => $row['id_comentario'],
                    'id_post' => $row['id_publicacion'],
                    'username' => $row['usuario'],
                    'profile_photo' => $row['foto'],
                    'text' => $row['comentario'],
                    'date' => $row['coment_date'],
                    'id_owner' => $row['id_coment_owner']
                );
                array_push($items, $item);
            }
            array_push($res, array('response' => "200"));
            array_push($res, $items);
            array_push($res, array('cant_of_comments' => ($u)));
            return $res;
        } else {
            array_push($res, array('response' => "400"));
            array_push($res, array('descrip' => "cero coments"));
            array_push($res, array('cant_of_comments' => ($u)));
            return $res;
        }
    }

    function setCommet($idpost, $idowner, $coment)
    {

        $res = [];
        $query = $this->connect()->prepare("INSERT INTO comentarios (id_coment_owner,id_publicacion,comentario,coment_date)values(:idowner, :idpost, :coment, NOW())");
        $query->execute(['idpost' => $idpost, 'idowner' => $idowner, 'coment' => $coment]);

        if ($query) {
            array_push($res, array('response' => "200"));
            return $res;
        } else {
            array_push($res, array('response' => "400"));
            return $res;
        }
    }

    function DeletePost($idpost)
    {
        $res = [];
        $query = $this->connect()->prepare("UPDATE post SET status = 'Deleted' , date_post_deteted = NOW() WHERE id_post = :idpost");
        $query->execute(['idpost' => $idpost]);

        if ($query) {
            array_push($res, array('response' => "200"));
            return $res;
        } else {
            array_push($res, array('response' => "400"));
            return $res;
        }
    }

    function EditePost($idpost, $new, $old)
    {
        $res = [];
        $update = $this->connect()->prepare("UPDATE post SET estado_post = :new WHERE id_post = :idpost");
        $update->execute(['idpost' => $idpost, 'new' => $new ]);

        if ($update) {
            $query = $this->connect()->prepare("INSERT INTO edit_post (id_post,new,old,date_editPost)values(:idpost, :new , :old, NOW())");
            $query->execute(['idpost' => $idpost, 'new' => $new, 'old' => $old]);
            if($query){
                array_push($res, array('response_i' => "200"));
            }
            array_push($res, array('response_u' => "200"));
            return $res;
        } else {
            array_push($res, array('response' => "400"));
            return $res;
        }
    }
}
