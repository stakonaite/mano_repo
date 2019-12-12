<?php

namespace login;
include_once 'Frame/Database.php';
include_once 'Forms.php';
use database\Database;
use form\Forms;

class Login
{
    public function login()
    {
        $db = New Database();
        $form = New Forms();
        $form->loginForm();
        if (isset($_POST['login'])) {
            $userEmailPOST = $_POST['user_email'];
            $sql = "SELECT `id`, `user_name`, `user_email`, `user_psw`, `user_role` FROM `users` WHERE `user_email` = '$userEmailPOST'";
            $dataFromArray = $db->select($sql);

            foreach ($dataFromArray as $user) {
                if ($user->user_email === $_POST['user_email'] && $user->user_psw === $_POST['user_psw']) {
                    session_start();
                    $_SESSION = [
                        'id' => $user->id,
                        'user_name' => $user->user_name,
                        'user_email' => $user->user_email,
                        'user_psw' => $user->user_psw,
                        'user_role' => $user->user_role,
                    ];
                    print 'Sekmingai prisijungete.';
                } elseif ($user->user_psw !== $_POST['user_psw']) {
                    print 'Neteisingas slaptazodis';
                }
            }
            if (empty($dataFromArray)) {
                print 'Toks vartotojas neegzistuoja';
            }
        }
        if (isset($_SESSION)) {
            if ($_SESSION['user_role'] == 1) {
                header('Location: http://localhost/DB_TEST/app/Views/User/darbuotojas.php');
            } elseif ($_SESSION['user_role'] == 0) {
                header('Location: http://localhost/DB_TEST/app/Views/Admin/Admin.php');
            } elseif ($_SESSION['user_role'] == 2) {
                header('Location: http://localhost/DB_TEST/app/Views/Teamlead/Teamlead.php');
            } else {
            header('Location: http://localhost/DB_TEST/app/Views/Models/Error.php');
            }
        }
    }
}
$login = New Login();