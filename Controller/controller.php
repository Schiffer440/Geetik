<?php

class Controller{


    private $host = "localhost";
    private $username = "schiffer";
    private $password = "Kebab";
    private $dbname = "geetik";

    private function databaseConnect(){
        try{
            $connect = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
        } catch(PDOException $error){
            echo "Database connexion error" . $error->getMessage();
        }
        return $connect;
    }

    public function homepage()
    {
        if(isset($_SESSION['id_user']))
        {
            require_once "../Models/user.php";
            require_once "../Models/register.php";
            $sub = new Register();
            $smt = $sub->getCities();
            $cities = $smt->fetchAll(PDO::FETCH_ASSOC);
            $user = new User();
            $smt = $user->displayProfiles($_POST['filter']['genre'], $_POST['filter']['city'], $_POST['filter']['game']);
            $data = $smt->fetchAll(PDO::FETCH_ASSOC);
            $smt = $user->getGamesInfos();
            $games = $smt->fetchAll(PDO::FETCH_ASSOC);
        }
        require_once "../Views/pages/home.php";
    }

    public function sessionExpired()
    {
        require_once "../Views/pages/success_login.php";
        header('refresh: 2;url=index.php?p=home');
    }

    public function loginFail()
    {
        require_once "../Views/pages/fail_login.php";
    }
    
    public function failSub()
    {
        require_once "../Views/pages/sub-error.php";
    }
}

$controller = new Controller();