<?php
class Route
{
    static function Start()
    {
        $controller_name = 'Main';
		$action_name = 'index';
        
        $route = explode('/', $_SERVER['REQUEST_URI']);
        
        if ( !empty($route[2]) )
		{	
			$controller_name = $route[2];
		}
		
		if ( !empty($route[3]) )
		{
			$action_name = $route[3];
		}
                         
        $model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'.$controller_name;
		$action_name = 'action_'.$action_name;
                         
        $model_file = strtolower($model_name).'.php';
		$model_path = $_SERVER['DOCUMENT_ROOT']."/bwt_test/application/models/".$model_file;
		if(file_exists($model_path))
		{
			include $model_path;
            //echo $model_path." included. <br>";
            //echo "Model ".$model_name." loaded<br>";
		}
        
        $controller_file = strtolower($controller_name).'.php';
		$controller_path = $_SERVER['DOCUMENT_ROOT']."/bwt_test/application/controllers/".$controller_file;
		if(file_exists($controller_path))
		{
			include $controller_path;
            //echo $controller_path." included. <br>";
            //echo "Controller ".$controller_name." loaded<br>";
		}
        else die ("No such page found =(");
        
        $controller = new $controller_name;
        $action = $action_name;
        
        if(method_exists($controller, $action))
        {
            $controller->$action();
        }
        else echo "No such action!";
        
    }
}

