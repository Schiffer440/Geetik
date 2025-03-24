<?php 

class User{

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

    public function getUserInfos($id_user){
        $connect = $this->databaseConnect();
        $query = "SELECT * FROM user WHERE id = ?";
        $stmt = $connect->prepare($query);
        $stmt->execute(["$id_user"]);
        return $stmt;
    }

    public function displayProfiles($genre = "All", $city, $game){
        $connect = $this->databaseConnect();
        $query = "SELECT user.id, genre, firstname, lastname, birthdate FROM ((user INNER JOIN users_games ON user_id = user.id) INNER JOIN games ON game_id = games.id AND game_name LIKE '%$game%') WHERE interest IN ('Male', 'Female') AND city LIKE '%$city%' GROUP BY user.id;";
        $stmt = $connect->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getUserStatus($user_id){
        $connect = $this->databaseConnect();
        $query = "SELECT status FROM user WHERE id = ?";
        $stmt = $connect->prepare($query);
        $stmt->execute(["$user_id"]);
        return $stmt;
    }

    public function getUserGames($user_id){
        $connect = $this->databaseConnect();
        $query = "SELECT game_image, game_name FROM user INNER JOIN users_games ON user_id = user.id INNER JOIN games ON game_id = games.id WHERE user.id = ?;";
        $stmt = $connect->prepare($query);
        $stmt->execute(["$user_id"]);
        return $stmt;
    }

    public function getGamesInfos(){
        $connect = $this->databaseConnect();
        $query = "SELECT game_name, game_image FROM games";
        $stmt = $connect->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function setUserProfile($user_id, $games, $interest)
    {
        $connect = $this->databaseConnect();
        foreach ($games as $elem)
        {
            try
            {
                $query = "INSERT INTO users_games (user_id, game_id) VALUES (?,(SELECT id FROM games WHERE game_name = ?))";
                $stmt = $connect->prepare($query);
                $stmt->execute(["$user_id", "$elem"]);
            } catch(PDOException $error){
                echo "Account update error" . $error->getMessage();
                return (-1);
            }
        }
            try
            {
                $query = "UPDATE user SET interest = ?";
                $stmt = $connect->prepare($query);
                $stmt->execute(["$interest"]);
            } catch(PDOException $error){
                echo "Account update error" . $error->getMessage();
                return (-1);
            }
            try
            {
                $query = "UPDATE user SET status = 'active'";
                $stmt = $connect->prepare($query);
                $stmt->execute();
            } catch(PDOException $error){
                echo "Account update error" . $error->getMessage();
                return (-1);
            }
    }

    public function updateUserProfile($user_id, $table, $user_data)
    {
            $connect = $this->databaseConnect();
            if ($table == "email")
            {
                $query = "SELECT email FROM user WHERE id = ?";
                $stmt = $connect->prepare($query);
                $stmt->execute(["$user_id"]);
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
                $email = $data['email'];

                $query = "UPDATE user SET $table = ? WHERE id = ?";
                $stmt = $connect->prepare($query);
                $stmt->execute(["$user_data", "$user_id"]);
                
                $query = "UPDATE login_data SET user_email = ? WHERE user_email = ?";
                $stmt = $connect->prepare($query);
                $stmt->execute(["$user_data", "$email"]);
            }
            else
            {
                $query = "UPDATE user SET $table = ? WHERE id = ?";
                $stmt = $connect->prepare($query);
                $stmt->execute(["$user_data", "$user_id"]);
            }
    }

    public function updatePassword($user_id, $pwd, $new_pwd)
    {
        $connect = $this->databaseConnect();
        $query = "SELECT email FROM user WHERE id = ?";
        $stmt = $connect->prepare($query);
        $stmt->execute(["$user_id"]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $user_email = $data['email'];
        $query = "SELECT password FROM login_data WHERE user_email = ? COLLATE utf8mb4_bin";
        $stmt = $connect->prepare($query);
        $stmt->execute(["$user_email"]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($pwd, $data['password']))
        {
            $query = "UPDATE login_data SET password = ?  WHERE user_email = ? COLLATE utf8mb4_bin";
            $stmt = $connect->prepare($query);
            $stmt->execute(["$new_pwd", "$user_email"]);
        }
        else
        {
            return -1;
        }
    }
}