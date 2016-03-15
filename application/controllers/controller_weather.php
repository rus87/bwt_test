<?php

class Controller_weather extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->model = new Model_weather;
    }
    function action_index()
    {
        Session :: init();
        $this->auth_check();
        if($this->logged_in)
        {
            if( $this->model->check_data_age() > 60 ) $this->model->update_data();
            $this->data = array('user_name' => $this->logged_in);
            
            $this->view->template_view = 'template_user_view.php';
            $this->view->generate('weather_view.php', $this->data);
        }
        else
        {
            $this->data = array('Надо бы авторизоваться.');
            $this->view->generate('fail_view.php', $this->data);
        }
         
    }
    
    
        
}