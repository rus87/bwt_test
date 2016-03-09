<?php
class Controller_signup extends Controller
{
    function action_index()
    {
        $this->view->generate('signup_view.php');
    }
    
    function action_add_user()
    {
        $this->model = new Model_signup;
        $this->model->new_user = json_decode($_POST['data']);
        $this->model->validate();
        
        if (($this->model->val_res['name'] == 'OK') &
            ($this->model->val_res['surname'] == 'OK') &
            ($this->model->val_res['email'] == 'OK'))
        {
            $this->model->db->add_new_user($this->model->new_user);
            echo "OK";
        }
        else echo json_encode($this->model->val_res, JSON_UNESCAPED_UNICODE);
            
            
        //var_dump($this->model->val_res);
        
    }
    
    
    
        
}