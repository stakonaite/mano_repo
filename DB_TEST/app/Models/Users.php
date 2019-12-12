<?php

namespace users;

include_once 'Tables.php';
include_once 'Forms.php';

use database\Database;
use datatable\Tables;
use form\Forms;

class Users
{

    public function viewPostsById($user_id)
    {
        $db = New Database();
        $sql = "SELECT `id_posts`, `u_id`, `title`, `text`, `date` FROM `posts` WHERE `u_id` = '$user_id'";
        $postsArrayById = $db->select($sql);

        $userPostTable = New Tables();
        $userPostTable->userPostsTable($postsArrayById);

        if(isset($_POST['update'])){
            $_SESSION = [
                'post_id' => $_POST['post_id'],
                ];
            header('Location: http://localhost/DB_TEST/app/Views/User/editPost.php');
        }
    }

    public function editPost($post_id)
    {
        $db = New Database();
        $sql = "SELECT `id_posts`, `u_id`, `title`, `text`, `date` FROM `posts` WHERE `id_posts` = '$post_id'";
        $postData = $db->select($sql);

        $title = $postData[0]->title;
        $text = $postData[0]->text;

//jei paspaudziam update i sql iraso title ir text, priskiriam lenteles namui duomenis
        if (isset($_POST['update'])) {
            $sqlPost = "UPDATE `posts` SET `title` = :title, `text` =:text, `updated_at` = :updated_at WHERE `id_posts` = '$post_id'";
            $name = [
                'title' => $_POST['title'],
                'text' => $_POST['text'],
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            //priskiriame nauja kintamaji kad reiksmes deliotu pagal ta funkcija
            $db->deleteInsertEdit($sqlPost, $name);
            header('Location: http://localhost/DB_TEST/app/Views/User/darbuotojas.php');
        }
            $updateForm = new Forms();
            $updateForm->editForm();
        }
    public function newPost($user_id)
    {
        if (isset($_POST['insert'])) {
            $db = New Database();
            $sqlPost = "";
            $name = [
                'title' => $_POST['title'],
                'text' => $_POST['text'],
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            //priskiriame nauja kintamaji kad reiksmes deliotu pagal ta funkcija
            $db->deleteInsertEdit($sqlPost, $name);
            header('Location: http://localhost/DB_TEST/app/Views/User/darbuotojas.php');
        }
        $updateForm = new Forms();
        $updateForm->editForm();
    }
}
    }

$users = new Users;

?>