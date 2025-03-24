<?php

class Register{

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

    public function getCities()
    {
        $connect = $this->databaseConnect();
        $query = "SELECT name FROM cities";
        $stmt = $connect->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function checkEmail($email)
    {
        $connect = $this->databaseConnect();
        $query = "SELECT email FROM user  WHERE email = ? COLLATE utf8mb4_bin";
        $stmt = $connect->prepare($query);
        $stmt->execute(["$email"]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if (isset($data['email']) && $data['email'] == $email)
            return -1;
        else
            return 1;
    }

    public function addUser($firstname, $lastname, $genre, $email, $birthdate, $city, $country)
    {
        $connect = $this->databaseConnect();
        try
        {
            $query = "INSERT INTO user (genre, email, firstname, lastname, birthdate, city, country, status) 
                        VALUES (?,?,?,?,?,?,?,?)";
            $stmt = $connect->prepare($query);
            $stmt->execute(["$genre", "$email", "$firstname", "$lastname", "$birthdate", "$city", "$country", "registered"]);
        } catch(PDOException $error){
            echo "Account creation error" . $error->getMessage();
            return (-1);
        }
    }

    public function setLoginData($email, $password)
    {
        $connect = $this->databaseConnect();
        try
        {
            $query = "INSERT INTO login_data (user_email, password) VALUES (?, ?)";
            $stmt = $connect->prepare($query);
            $stmt->execute(["$email", "$password"]);
        } catch(PDOException $error){
            echo "Account creation error" . $error->getMessage();
            return (-1);
        }
    }
}