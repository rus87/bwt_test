<?php
require_once($_SERVER['DOCUMENT_ROOT']."/bwt_test/application/core/model.php");

class Model_weather extends Model
{  
    function update_data()
    {
        $page = file_get_contents("http://www.gismeteo.ua/city/daily/5093/");
        preg_match('/(?<=class="wsection wdata">).*(?=<tbody id="tbwdaily2")/Us', $page, $matches);
        file_put_contents($_SERVER['DOCUMENT_ROOT']."/bwt_test/data/weather_data.php", $matches[0], LOCK_EX);
        file_put_contents($_SERVER['DOCUMENT_ROOT']."/bwt_test/data/weather_last_updated.txt", date('Y,n,j,G,i,s'), LOCK_EX);
    }
    
    function check_data_age()
    {
        $current = date('Y,n,j,G,i,s');
        if(file_exists($_SERVER['DOCUMENT_ROOT']."/bwt_test/data/weather_last_updated.txt"))
        $last_update = file_get_contents($_SERVER['DOCUMENT_ROOT']."/bwt_test/data/weather_last_updated.txt");
        else 
        {
            $last_update = '2015,1,1,1,1,1';
            file_put_contents($_SERVER['DOCUMENT_ROOT']."/bwt_test/data/weather_last_updated.txt", $last_update, LOCK_EX);
        }
        
        if(!file_exists($_SERVER['DOCUMENT_ROOT']."/bwt_test/data/weather_data.txt")) $this->update_data();
            
        $current = explode(',', $current);
        $last_update = explode(',', $last_update);

        $interval = array();
        $interval[0] = ($current[0] - $last_update[0])*15768000;
        $interval[1] = ($current[1] - $last_update[1])*43200;
        $interval[2] = ($current[2] - $last_update[2])*1440;
        $interval[3] = ($current[3] - $last_update[3])*60;
        $interval[4] = $current[4] - $last_update[4];
        $interval[5] = ($current[5] - $last_update[5])*(1/60);

        $interval_mins = 0;
        foreach($interval as $item) $interval_mins += $item;

        return $interval_mins;
    }
        
}