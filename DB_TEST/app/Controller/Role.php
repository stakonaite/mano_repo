<?php
//
//namespace role;
//
//use form\Forms;
//
//class Role
//{
//    public function __construct()
//    {
//        $form = New Forms();
//        $form->insertEditUserForm();
//        if (isset($_POST['register'])) {
//            $user_name = $_POST['user_name'];
//            $user_email = $_POST['user_email'];
//            $user_psw = $_POST['user_psw'];
//            setcookie("user_data[name]", "$user_name");
//            setcookie("user_data[email]", "$user_email");
//            setcookie("user_data[psw]", "$user_psw");
//            setcookie("user_data[role]", "0");
//        }
//        if ($_COOKIE['user_data']['role'] == 1) {
//            print "<br><br>";
//            include_once('app/Views/User/User.php');
//        } elseif ($_COOKIE['user_data']['role'] == 0) {
//            print "<br><br>";
//            include_once('app/Views/Admin/Admin.php');
//        } elseif ($_COOKIE['user_data']['role'] == 2) {
//            print "<br><br>";
//            include_once('app/Views/Teamlead/Teamlead.php');
//        }
//    }
//}
//?>