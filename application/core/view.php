<?php
class View
{
    public $template_view = 'template_view.php';
    
    function generate($content_view, $data=null)
    {
        
        if(is_array($data)) extract($data);
        if(!isset($user_panel_view)) $user_panel_view = null;
        
        include $_SERVER['DOCUMENT_ROOT']."/bwt_test/application/views/".$this->template_view;
    }
}
?>