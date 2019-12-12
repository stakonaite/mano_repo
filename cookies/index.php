<?php

if (isset($_POST['siusti'])) {
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    setcookie("user_data[name]", "$user_name");
    setcookie("user_data[email]", "$user_email");
    setcookie("user_data[role]", "0");
}
if ($_COOKIE['user_data']['role'] == 1){
    print "<br><br>";
    include_once('app/Views/darbuotojas.php');
}elseif ($_COOKIE['user_data']['role'] == 0){
    print "<br><br>";
    include_once('app/Views/administratorius.php');
}elseif ($_COOKIE['user_data']['role'] == 2){
    print "<br><br>";
    include_once('app/Views/komandosLyderio.php');
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <input type="text" placeholder="Name:" name="user_name">
    <input type="email" placeholder="Email:" name="user_email">
    <input type="submit" value="Siusti" name="siusti">
</form>

</body>
</html>