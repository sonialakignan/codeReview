<?php
class UserController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getUser($id) {
        $query = "SELECT * FROM users WHERE id = " . $id;
        $result = mysqli_query($this->db, $query);

        $x = mysqli_fetch_assoc($result);

        return $x; 
    }

    public function saveUser($name, $email) {
       
    if (strlen($name) < 3) { return false; }
            if (strpos($email, "@") === false) { return false; }

        
        $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
        mysqli_query($this->db, $sql);

        return true;
    }
}