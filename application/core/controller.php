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
}
?>