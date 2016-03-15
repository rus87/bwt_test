<?php
class Model
{
    public $val_errs = array();
    public $db;
    public $data = array();
    
    
    function check_email()
    {
        if(preg_match_all("/[А-я]/i", $this->data['email'])) $error = "Неправильный E-mail.";
        if(preg_match_all("/.+@.+\..+/i", $this->data['email']) !=1 ) $error = "Неправильный E-mail.";
        if(isset($error))$this->val_errs['email'] = $error;
    }
    
    function check_name()
    {
        if(preg_match_all("/([^A-zА-яуцртчшщхъфыэсью])/i", $this->data['name'])) $error = "Имя должно состоять только из букв."; 
        if(mb_strlen($this->data['name']) <= 3) $error = "Имя должно быть не короче 3 символов.";
        if(isset($error))$this->val_errs['name'] = $error;
    }
    
    function check_surname()
    {
        if(preg_match_all("/([^A-zА-яуцртчшщхъфыэсью])/i", $this->data['surname'])) $error = "Фамилия должна состоять только из букв."; 
        if(strlen($this->data['surname']) < 3) $error = "Фамилия должна быть не короче 3 символов.";
        if(isset($error))$this->val_errs['surname'] = $error;
    }
    
}