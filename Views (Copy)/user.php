<?php
session_start();
var_dump($_POST);
require_once "../Controller/login_controller.php";
if (!empty($_GET['p']))
{
    if(!isset($_SESSION['id_user']))
        $p="session-expired";
    else
        $p = $_GET['p'];
}
else
    $p = "";

function getPage($page){
    require_once "../Controller/user_controller.php";
        $userController = new userController();
    switch ($page)
    {
        case "home":
            $userController->homepage();
            break;
        case "session-expired":
            $userController->sessionExpired();
            break;
        case "complete-profile":
            $userController->completeProfile();
            break;
        case "update-password":
            $userController->updatePassword();
            break;
        case "update-profile":
            $userController->updateProfile();
            break;
        case "user-profile-page":
            $userController->userProfilePage();
            break;
        case "profile-page":
            $userController->ProfilePage();
            break;
        case "send-profile":
            $user->setUserProfile($_SESSION['id_user'], $_POST['game_name'], $_POST['interest']);
            $userController->waitingScreen();
            break;
        default:
    }
}

getPage($p);