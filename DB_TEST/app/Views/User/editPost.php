<?php

include_once '../../../Frame/Database.php';
include_once '../../Models/Users.php';
include_once '../../Models/Forms.php';

session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register form</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
<section>
    <?php
    $users->editPost($_SESSION['post_id']);
    ?>
</section>
</body>
</html>

