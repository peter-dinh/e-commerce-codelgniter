<?php 
    function get_date($time, $full_time = true)
    {
        $format = '%d-%m-%Y';
        if($full_time) 
        {
            $format = $format.' - %H:%i:%s';
        }
        $data = mdate($format, $time);
        return $data;
    }
    
    function get_day()
    {
        
    }
?>