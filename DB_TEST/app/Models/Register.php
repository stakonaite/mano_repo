<?php

namespace reg;
include_once 'Frame/Database.php';
include_once 'Forms.php';
use database\Database;
use form\Forms;

class Register
{

    public function register()
    {
        $form = new Forms();
        $form->registerForm();
        $userEmailData = '';

        if (isset($_POST['register'])) {
        $db = New Database;
            $userEmailPOST = $_POST['user_email'];
            $sql = "SELECT `user_email` FROM `users` WHERE `user_email` = '$userEmailPOST'";
            $dataFromArray = $db->select($sql);
            foreach ($dataFromArray as $user) {
                $userEmailData = $user->user_email;
            }
            if ($userEmailData === $_POST['user_email']) {
                print 'Toks user jau egzistuoja, iveskite kita @ pasta.';
            } else {
                $sql = 'INSERT INTO `users`(`user_name`, `user_psw`, `user_email`) VALUES (:User_name, :User_password, :User_email)';
                $name = [
                    'User_name' => $_POST['user_name'],
                    'User_password' => $_POST['user_psw'],
                    'User_email' => $_POST['user_email'],
                ];
                $db->deleteInsertEdit($sql, $name);
                print 'Registracija sekminga';
            }
        }
    }
}
