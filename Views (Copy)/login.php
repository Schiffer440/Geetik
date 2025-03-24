<?php
session_start();

if (!empty($_GET['p']))
{
    $p = $_GET['p'];
}
else
$p = "login-page";

function getPage($page){
        require_once "../Controller/login_controller.php";
        $loginController = new loginController();
        switch ($page)
        {
            case "login":
                if (!empty($_POST['login-email']) && !empty($_POST['login-pwd']))
                {
                    if ($login->checkLogs($_POST['login-email'], $_POST['login-pwd']) != -1)
                    {
                        $stm = $login->checkLogs($_POST['login-email'], $_POST['login-pwd']);
                        $data = $stm->fetch(PDO::FETCH_ASSOC);
                        if (isset($_SESSION['log_fail']))
                            unset($_SESSION['log_fail']);
                        $_SESSION['id_user'] = $data['id'];
                        $loginController->loginSuccess();
                    }
                    else
                    {
                        $_SESSION['log_fail'] = 1;
                        $loginController->loginPage();
                    }
                }
                break;
                case "login-page";
                    $loginController->loginPage();
                    break;
            default:
        }
    }
    
    getPage($p);