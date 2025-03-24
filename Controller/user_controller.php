<?php

require_once "controller.php";
require_once "../Models/user.php";
$user = new User();

class userController extends Controller{
    
    public function completeProfile()
    {
        require_once "../Models/user.php";
        $user = new User();
        $stm = $user->getGamesInfos();
        $data = $stm->fetchAll(PDO::FETCH_ASSOC);
        require_once "../Views/pages/complete-profile.php";
    }

    public function userProfilePage()
    {
        require_once "../Models/user.php";
        $user = new User();
        $stm = $user->getUserInfos($_SESSION['id_user']);
        $user_data = $stm->fetch(PDO::FETCH_ASSOC);
        $stm = $user->getUserGames($_SESSION['id_user']);
        $user_games = $stm->fetchAll(PDO::FETCH_ASSOC);
        require_once "../Views/pages/user-profile.php";
    }

    public function profilePage()
    {
        require_once "../Models/user.php";
        $user = new User();
        $stm = $user->getUserInfos($_GET['user']);
        $user_data = $stm->fetch(PDO::FETCH_ASSOC);
        $stm = $user->getUserGames($_GET['user']);
        $user_games = $stm->fetchAll(PDO::FETCH_ASSOC);
        require_once "../Views/pages/profile-page.php";
    }

    public function waitingScreen()
    {
        require_once "../Views/pages/profile_waiting_screen.php";
        header('refresh: 2;url=user.php?p=home');
    }

    public function updateProfile()
    {
        require_once "../Models/user.php";
        $user = new User();
        $table = array_keys($_POST)[0];
        var_dump($_POST["$table"]);
        $user->updateUserProfile($_SESSION['id_user'], $table, $_POST["$table"]);
        require_once "../Views/pages/profile_waiting_screen.php";
        header('refresh: 2;url=user.php?p=profile-page');
    }

    public function updatePassword()
    {
        if (isset($_POST['actual-password'], $_POST['first-password'], $_POST['second-password']))
        {
            if ($_POST['first-password'] != $_POST['second-password'])
            {
                $_POST['password_error'] = 1;
                require_once "../Views/pages/update-password.php";
            }
            else
            {
                require_once "../Models/user.php";
                $user = new User();
                if ($user->updatePassword($_SESSION['id_user'], $_POST['actual-password'], password_hash($_POST['second-password'], PASSWORD_DEFAULT)) == -1)
                {
                    $_POST['actual_password_error'] = 1;
                    require_once "../Views/pages/update-password.php";
                }
                else
                {
                    require_once "../Views/pages/profile_waiting_screen.php";
                    header('refresh: 2;url=user.php?p=profile-page');
                }
            }
        }
        else
            require_once "../Views/pages/update-password.php";
    }
}