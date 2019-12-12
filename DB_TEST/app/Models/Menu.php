<?php

namespace menu;

class Menu
{
    public function getLinks()
    {
        $menu = [
            ["name" => "Home", "link" => "/"],
            ["name" => "Select Post", "link" => "/app/Views/User/darbuotojas.php"],
            ["name" => "edit Post", "link" => "/app/Views/User/editPost.php"],

        ];
        return $menu;
    }
}
    $menu = New Menu();
