<?php
    session_start();

    if (!empty($_GET['p']))
    {
        $p = $_GET['p'];
    }
    else
        $p = "home";
function getPage($page){
    require_once "../Controller/controller.php";

    switch ($page)
    {
        case "disconnect":
            session_unset();
            header('location: index.php');
            break;
        case "home";
            $controller->homepage();
            break;
        default:
    }
}

getPage($p);
