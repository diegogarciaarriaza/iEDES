<?php

namespace iedes\webBundle\Utils;

class utils{  
   
    public function changeDate($date = null, $change){
        
        if(!$date){
            $date = new \DateTime();
        }

        $date = strtotime($change, strtotime($date->format('Y-m-j H:i:s')));
        $date = date('Y-m-j H:i:s', $date);
        
        
        return new \DateTime($date);
        
        /*
        Ejemplos de change
        strtotime("now");
        strtotime("10 September 2000");
        strtotime("+1 day");
        strtotime("+1 week");
        strtotime("+1 month 1 week 2 days 4 hours 2 seconds");
        strtotime("next Thursday");
        strtotime("last Monday");         
         */
    }
    
    public function convertDateTimeToUTC($fecha){
        return gmdate("Ymd\THis\Z",(strtotime(($fecha->format('Y-m-d H:i:s')) . " UTC")));
    }
}
