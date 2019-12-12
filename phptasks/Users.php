<?php
namespace user;
include_once 'Database.php';
include_once 'Tables.php';
include_once 'Forms.php';

use datatable\Tables;
use db\Database;
use form\Forms;
class Users extends Database
{
//    metodas nr1
    public function getAllUsersDate()
    {
        $db = New Database();
        $sql = "SELECT * FROM `users` WHERE 1";
        $allUsersDateArray = $db->select($sql);

        $table = New Tables();
        $table->table($allUsersDateArray);
    }

//    metodas nr2

    public function deleteData($sql)
    {
        $form = New Forms();
        $form->deleteForm();
        if (isset($_POST['delete'])) {
            $name = ['name' => $_POST['user_name']];
            $db = New Database();
            $db->deleteInsert($sql, $name);
        }
    }

    public function insertUserData($sql)
    {
        $form = New Forms();
        $form->insertUserForm();
        if (isset($_POST['insert'])) {
            $name = [
                'name' => $_POST['name'],
                'lastname' => $_POST['lastname'],
            ];
            $db = New Database();
            $db->deleteInsertEdit($sql, $name);
        }
    }
?>