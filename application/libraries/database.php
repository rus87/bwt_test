<?php
class Database
{
    public $errors = array();
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
    
    function add_new_user($data)
    {
        $q = "INSERT INTO users (name, surname, email, birth, gender) VALUES ('%s', '%s', '%s', '%s', '%s')";
        $q = sprintf($q, $data['name'], $data['surname'], $data['email'], $data['birth'], $data['gender']);
        if(!$this->mysqli->query($q)) $this->errors['add_new_user'] = $this->mysqli->error;
    }
    
    function add_feedback($data)
    {
        $q = "INSERT INTO feedbacks (name, email, text) VALUES ('%s', '%s', '%s')";
        $q = sprintf($q, $data['name'], $data['email'], $data['text']);
        if(!$this->mysqli->query($q)) $this->errors['add_feedback'] = $this->mysqli->error;
        
    }
}