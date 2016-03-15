<?php
class Controller_login extends Controller
{
    private $form_data;
    
    function action_index()
    {
        Session :: init();
        $this->auth_check();
        if($this->logged_in)
        {
            $this->view->template_view = 'template_user_view.php';
            $this->data['user_name'] = $this->logged_in;
        }
        
        if(isset($_POST['email']))
        {
            $this->form_data = $this->get_form();
            $this->model = new Model_login($this->form_data);
            $this->model->check_email();
            if(!$this->model->val_errs)
            {
                $this->model->db = new Database;
                $this->user = $this->model->db->user_exists($this->model->data['email']);
                if($this->user)
                {
                    Session :: set('user_name', $this->user['name']);
                    header("Location: login");
                    //var_dump($_SESSION);
                }
                else 
                {
                    $error[] = 'Нет пользователя с таким e-mail.';
                    $this->view->generate('fail_view.php', $error);
                }
            }
            else $this->view->generate('fail_view.php', $this->model->val_errs);
        }
        else $this->view->generate('login_view.php', $this->data);
    }
    
    function action_logout()
    {
        Session :: init();
        Session :: destroy();
        //var_dump($_SESSION);
        header("Location: /bwt_test");
        
    }
    
        
}