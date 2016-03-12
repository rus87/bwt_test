<?php

class Controller_feedbacks extends Controller
{
    
    function action_index()
    {
        $this->view->generate('feedbacks_view.php');
    }
    
    function action_add()
    {
        if(!isset($_POST['text'])) $this->view->generate('feedbacks_add_view.php');
        else
        {
            $this->model = new Model_feedbacks($this->get_form());
            $this->model->validate();
            
            if(!($this->model->val_errs))
            {
                
            }
            
        }
    }
    
    
}
?>