<?php

    $memcache = new Memcache;  
    $memcache->connect('localhost', 11211) or die ("Could not connect");  
      
    //$version = $memcache->getVersion();  

    $tmp_object = new stdClass;  

    $duration = 0;             // never expire
    $duration_trigger = 300;   // 5 minutes
    $duration_cats = 600;      // 10 minutes
    
    $mem_key1 = "user_data_".$l["token"];
    $mem_key2 = "trigger_f_".$l["token"];       
    $mem_key3 = "ay_flashes_voted_".$l["token"];
    $mem_key4 = "ay_flashes_rated_".$l["token"];

    $user_data        = $memcache->get($mem_key1); 
    $trigger_f        = $memcache->get('trigger_f_'.$l["token"]); 
    $ay_flashes_voted = $memcache->get('ay_flashes_voted_'.$l["token"]);                
    $ay_flashes_rated = $memcache->get('ay_flashes_rated_'.$l["token"]); 
                   
    $ay_flash_cats    = $memcache->get('ay_flash_cats');      
    
    //$memcache->delete("trigger_f_".$l["token"]);        

    //$size = strlen(serialize($user_data));
    //echo $size." bytes";