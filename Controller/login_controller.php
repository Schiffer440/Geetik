<?php

require_once "controller.php";
require_once "../Models/login.php";
$login = new Login();

class loginController extends Controller{
    
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

    public function loginPage()
    {
        require_once "../Views/pages/login-page.php";
    }
    
    public function loginSuccess()
    {
        require_once "../Models/user.php";
        require_once "../Views/pages/success_login.php";
        $user = new User();
        $stm =  $user->getUserStatus($_SESSION['id_user']);
        $data = $stm->fetch(PDO::FETCH_ASSOC);
        if ($data['status'] == 'registered')
            header('refresh: 2;url=user.php?p=complete-profile');
        else
            header('refresh: 2;url=user.php?p=home');
    }

}