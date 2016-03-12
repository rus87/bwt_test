<?php
class Database
{
    private $mysqli;
   
    function __construct()
    { 
        $this->mysqli = @ new mysqli('localhost', '', '', 'bwt_test');
            if($this->mysqli->connect_error) die('Connect Error: ' . $this->mysqli->connect_error);
        if(!mysqli_set_charset($this->mysqli, "utf8")) 
            die("Error: ".$this->mysqli->error);
    }
    
    function user_exists($email)
    {
        $q = "SELECT * FROM users WHERE email='%s' LIMIT 1";
        $q = sprintf($q, $email);
        $result = $this->mysqli->query($q);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
    
    function add_new_user($user)
    {
        $q = "INSERT INTO users (name, surname, email, birth, gender) VALUES ('%s', '%s', '%s', '%s', '%s')";
        $q = sprintf($q, $user['name'], $user['surname'], $user['email'], $user['birth'], $user['gender']);
        if(!$this->mysqli->query($q)) die("Error: ".$this->mysqli->error);
            else return "OK";
    }
    
    function add_feedback()
    {
        
    }
}