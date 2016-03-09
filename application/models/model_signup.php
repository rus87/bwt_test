<?php

class Model_signup extends Model
{
    public $val_res = array();
    public $db;
    public $new_user;
    
    function __construct()
    {
        $this->db = new Database;
        
    }
    
    function validate()
    {
        $this->check_name();
        $this->check_surname();
        $this->check_email();
        if($this->val_res['email'] == 'OK')
            if($this->db->user_exists($this->new_user->email))
                $this->val_res['email'] = "Пользователь с такой почтой уже зарегистрирован.";
    }
    
    function check_email()
    {
        $result = "OK";
        if(preg_match_all("/[А-я]/i", $this->new_user->email)) $result = "Неправильный E-mail.";
        if(preg_match_all("/.+@.+\..+/i", $this->new_user->email) !=1 ) $result = "Неправильный E-mail.";
        $this->val_res['email'] = $result;
    }
    
    function check_name()
    {
        $result = "OK";
        if(preg_match_all("/([^A-zА-яуцртчшщхъфыэсью])/i", $this->new_user->name)) $result = "Имя должно состоять только из букв."; 
        if(strlen($this->new_user->name) < 3) $result = "Имя должно быть не короче 3 символов.";
        $this->val_res['name'] = $result;
    }
    
    function check_surname()
    {
        $result = "OK";
        if(preg_match_all("/([^A-zА-яуцртчшщхъфыэсью])/i", $this->new_user->surname)) $result = "Фамилия должна состоять только из букв."; 
        if(strlen($this->new_user->surname) < 3) $result = "Фамилия должна быть не короче 3 символов.";
        $this->val_res['surname'] = $result;
    }
    
    
}