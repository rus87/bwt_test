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
            
            if($this->model->val_errs) $this->view->generate('fail_view.php', $this->model->val_errs);
            else
            {
                $this->model->db = new Database;
                $this->model->db->add_feedback($this->model->data);
                if(!$this->model->db->errors) $this->view->generate('feedback_success_view.php');
                else $this->view->generate('fail_view.php', $this->model->db->errors);
            }
            
        }
    }
    
    
}
?>