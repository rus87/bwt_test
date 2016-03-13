<?php
class Model_feedbacks extends Model
{
    function __construct($data = null)
    { 
        $this->data = $data;
    }
    
    function validate()
    {
        $this->check_name();
        $this->check_email();
        $this->check_text();
    }
    
    function check_text()
    {
        if(strlen($this->data['text']) < 10) $error = "Введите отзыв не менее 10 символов длиной.";
        $this->data['text'] = htmlspecialchars($this->data['text']);
        if(isset($error))$this->val_errs['text'] = $error;
    }
    
    
    
}