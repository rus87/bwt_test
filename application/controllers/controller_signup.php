<?php
class Controller_signup extends Controller
{
    private $form_data = array();
    
    function action_index()
    {
        $this->view->generate('signup_view.php');
    }
    
    function action_add_user()
    {
        $this->form_data = $this->get_form();   
        
        $this->model = new Model_signup($this->form_data); 
        $this->model->validate();  
        if($this->model->val_errs) $this->view->generate('fail_view.php', $this->model->val_errs);
        else 
        {
            $this->model->db->add_new_user($this->model->data);
            $this->view->generate('reg_success_view.php');
        }    
    }
    
    
    
    
    
        
}