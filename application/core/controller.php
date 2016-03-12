<?php
require_once("view.php");

class Controller
{
    public $model;
    public $view;
    
    function __construct()
    {
        $this->view = new View();
    }
    
    function action_index()
    {
        echo "Welcome to ".get_class($this);
    }
    
    function get_form()
    {
            $temp = array();
            $keys = array();
            $keys = array_keys($_POST);
            $i = 0;
            foreach($_POST as $field)
            { 
                $temp[$keys[$i]] = trim($field);
                $i++;
            }  
            unset($keys);
            if(array_key_exists('birth', $temp))
                if(!$temp['birth']) $temp['birth'] = '0000-00-00';
        return $temp;
    }
}
?>