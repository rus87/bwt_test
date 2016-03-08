<?php
class Controller_signup extends Controller
{
    function action_index()
    {
        $this->view->generate('signup_view.php');
    }
    
    function action_add_user()
    {
        echo "Зашли в экшен добавки юзера! =D";
    }
    
        
}