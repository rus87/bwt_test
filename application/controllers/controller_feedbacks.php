<?php
require_once($_SERVER['DOCUMENT_ROOT']."/bwt_test/application/core/controller.php");

class Controller_feedbacks extends Controller
{
    function action_index()
    {
        $this->view->generate('feedbacks_view.php');
    }
    
    function action_add()
    {
        $this->view->generate('feedbacks_add_view.php');
    }
}
?>