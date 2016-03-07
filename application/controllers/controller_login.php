<?php
require_once($_SERVER['DOCUMENT_ROOT']."/bwt_test/application/core/controller.php");
class Controller_login extends Controller
{
    function action_index()
    {
        $this->view->generate('login_view.php');
    }
    
        
}