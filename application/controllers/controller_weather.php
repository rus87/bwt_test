<?php
require_once($_SERVER['DOCUMENT_ROOT']."/bwt_test/application/core/controller.php");

class Controller_weather extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->model = new Model_weather;
    }
    function action_index()
    {
        if( $this->model->check_data_age() > 60 ) $this->model->update_data();
        $this->view->generate('weather_view.php'); 
    }
    
    
        
}