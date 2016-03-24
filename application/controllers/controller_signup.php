<?php
class Controller_signup extends Controller
{
    private $form_data = array();
    
    function action_index()
    {
        Session :: init();
        $this->auth_check();
        if($this->logged_in)
        {
            $this->view->template_view = 'template_user_view.php';
            $this->data['user_name'] = $this->logged_in;
        }
        
        $this->view->generate('signup_view.php', $this->data);
    }
    
    function action_add_user()
    {
        $this->form_data = $this->get_form();   
        
        $this->model = new Model_signup($this->form_data); 
        $this->model->validate();  
        if($this->model->val_errs)
        {
            $this->data['errors'] = $this->model->val_errs;
            $this->view->generate('fail_view.php', $this->data);
        }
        
        else 
        {
            $this->model->db->add_new_user($this->model->data);
            $this->view->generate('reg_success_view.php');
        }    
    }
    
    
    
    
    
        
}