<?php
class User {
    private $email;
    private $username;
    private $pass;

    public function __construct($email,
    $username,
    $pass) {
        $this->email = $email;
        $this->username = $username;
        $this->pass = $pass;
    }


    public function getEmail() { return $this->email; }
    public function getUsername() { return $this->username; }
    public function getPass() { return $this->pass; }
}
?>
