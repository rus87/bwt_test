<?php

class Controller_feedbacks extends Controller
{
    
    function action_index()
    {
        Session :: init();
        $this->auth_check();
        if($this->logged_in)
        {
            $this->view->template_view = 'template_user_view.php';
            
            $this->model = new Model_feedbacks();
            $this->model->db = new Database;
            $this->data['user_name'] = $this->logged_in;
            $this->data['feedbacks'] = $this->model->db->get_feedbacks();
            if(!$this->model->db->errors) $this->view->generate('feedbacks_view.php', $this->data);
            else $this->view->generate('fail_view.php', $this->model->db->errors);
        }
        else
        {
            $this->data['errors'] = array('Надо бы авторизоваться.');
            $this->view->generate('fail_view.php', $this->data);
        }
        
    }
    
    function action_add()
    {
        Session :: init();
        $this->auth_check();
        if($this->logged_in)
        {
            $this->view->template_view = 'template_user_view.php';
            $this->data['user_name'] = $this->logged_in;
        }
        
        if(!isset($_POST['text'])) $this->view->generate('feedbacks_add_view.php', $this->data);
        else
            {
                if($this->check_captcha() == true)
                {
                    $this->model = new Model_feedbacks($this->get_form());
                    $this->model->validate();

                    if($this->model->val_errs)
                    {
                        $this->data['errors'] = $this->model->val_errs;
                        $this->view->generate('fail_view.php', $this->data);
                    }
                        
                    else
                    {
                        $this->model->db = new Database;
                        $this->model->db->add_feedback($this->model->data);
                        if(!$this->model->db->errors) $this->view->generate('feedback_success_view.php', $this->data);
                        else
                        {
                            $this->data['errors'] = $this->model->db->errors;
                            $this->view->generate('fail_view.php', $this->data);
                        }
                    } 
                }
                else 
                {
                    $this->data['errors'] = array('Неправильная капча.');
                    $this->view->generate('fail_view.php', $this->data);
                }
            }        
        
        
    }  
    
    function check_captcha()
    {
        $securimage = new Securimage;
        return $securimage->check($_POST['cap']);
    }
    
    //
}
?>