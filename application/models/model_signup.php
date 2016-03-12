<?php

class Model_signup extends Model
{
    
    function __construct($data)
    { 
        $this->data = $data;
    }
    
    function validate()
    {
        $this->check_name();
        $this->check_surname();
        $this->check_email();
        if(!isset($this->val_errs['email']))
        {
            $this->db = new Database;
            if($this->db->user_exists($this->data['email']))
                $this->val_errs['email'] = "Пользователь с такой почтой уже зарегистрирован.";
        }
            
    }
    
    
    
    
}