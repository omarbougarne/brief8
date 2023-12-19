<?php
include("DB.php");
include("Useroop.php");


class UserDAO {
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection();
    }

    public function get_user(){
        $query = "SELECT * FROM users";
        $stmt = $this->db->query($query);
        $stmt -> execute();
        $userData = $stmt->fetchAll();
        $Users = array();
        foreach ($userData as $U) {
            $Users[] = new User(
                $U["reference"],
                $U["etiquette"],
                $U["descpt"],
                $U["codeBarres"],
                $U["img"],  
                $U["prixAchat"],
                $U["prixFinal"],
                $U["prixOffre"],
                $U["qntMin"],
                $U["qntStock"],
                $U["catg"]
            );
        }
        return $Users;

    }
    public function insert_user($Users)
    {
        $query = "INSERT INTO users (email, username, pass) 
                  VALUES (:email, :username, :pass)";

        $stmt = $this->db->prepare($query);

        $email = $Users->getEmail();
        $username = $Users->getUser();
        $pass = $Users->getPass();

        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':pass', $pass); 


        try {
            $stmt->execute();
        } catch (PDOException $e) {
            throw $e;
        }
       
}
public function update_user($User)
    {
        $query = "UPDATE users SET 
                  email = :email, 
                  username = :username,
                  pass = :pass
                  WHERE username = :username";

        $stmt = $this->db->prepare($query);

        $email = $User->getEmail();
        $username = $User->getUser();
        $pass = $User->getDesc();

        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':pass', $pass);
        
        try {
            $stmt->execute();
            echo "Record updated successfully.";
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function delete_user($username)
    {
        $query = "DELETE FROM users WHERE username = :username;";
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':username', $username);

        try {
            $stmt->execute();
            echo "Record deleted successfully.";
        } catch (PDOException $e) {
            throw $e;
        }
    }
}
$user = new User('username@gmail.com','name','passipass');
$userDAO->insert_user(34);
?>