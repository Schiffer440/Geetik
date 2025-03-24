<?php
session_start();

if (!empty($_GET['p']))
{
    $p = $_GET['p'];
}
else
    $p = "";

function getPage($page){
        require_once "../Controller/register_controller.php";
        $registerController = new registerController();
        switch ($page)
        {
            case "subscription-page":
                $registerController->subPage();
                break;
            case "send-sub":
                $check_email = $subscription->checkEmail($_POST['email']);
                if ($check_email != -1)
                    $registerController->confirmInfos();
                else
                {
                    $_POST['mail_error'] = 1;
                    $registerController->subPage();
                }
                break;
            case "sub-password":
                $subscription->addUser($_POST['firstname'], $_POST['lastname'], $_POST['genre'], $_POST['email'], $_POST['birthdate'], $_POST['city'], $_POST['country']);
                $_SESSION['tmp-email'] = $_POST['email'];
                $registerController->setPassword();
                break;
            case "sub-final":
                if ($_POST['first-password'] != $_POST['second-password'])
                {
                    $_POST['password_error'] = 1;
                    $registerController->setPassword();
                }
                else
                {
                    $subscription->setLoginData($_SESSION['tmp-email'], password_hash($_POST['first-password'], PASSWORD_DEFAULT));
                    unset($_SESSION['tmp-email']);
                    $registerController->registrationSuccess();
                }
                break;
            default:
        }
    }
    
    getPage($p);