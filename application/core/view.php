<?php
class View
{
    public $template_view = 'template_view.php';
    
    function generate($content_view, $data=null)
    {
        include $_SERVER['DOCUMENT_ROOT']."/bwt_test/application/views/".$this->template_view;
    }
}
?>