<?php

include_once 'Users.php';
use user\Users;
$allUsersDateArray = New Users();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            padding: 0;
            margin: 0;
        }
        table, th, td {
            border: 3px solid black;
            border-collapse: collapse;
            padding: 15px;
            margin: 10px;
            text-align: center;
        }
        form {
            background-color: beige;
            height: 200px;
            width: 200px;
            display: flex;
            flex-direction: column;
        }
        input {
            background-color: mediumspringgreen;
            color: black;
            height: 30px;
            margin: 10px;
        }
        section{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }
    </style>
</head>
<body>
<section>
    <?php
    $allUsersDateArray->deleteData('DELETE FROM `users` WHERE `name` = :name');
    $allUsersDateArray->insertUserData("INSERT INTO `users`(`name`, `lastname`) VALUES (:name, :lastname)");

    ?>
</section>
<section>
    <?php
    $allUsersDateArray->getNameLastnameCarCostFromUsersAndCarsInTable();
    $allUsersDateArray->getAllUsersNameAndDateInTable();
    $allUsersDateArray->getAllFromDarbovietesAndUsers();
    ?>
</section>
</body>
</html>