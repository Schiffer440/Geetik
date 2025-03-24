<?php

class Login{

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

    public function checkLogs($email, $pwd)
    {
        $connect = $this->databaseConnect();
        $query = "SELECT password FROM login_data WHERE user_email = ? COLLATE utf8mb4_bin";
        $stmt = $connect->prepare($query);
        $stmt->execute(["$email"]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($pwd, $data['password']))
        {
            $query = "SELECT id FROM user WHERE email = ? COLLATE utf8mb4_bin";
            $stmt = $connect->prepare($query);
            $stmt->execute(["$email"]);
            return $stmt;
        }
        else
        {
            return -1;
        }
    }
}