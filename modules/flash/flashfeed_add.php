<?php   
      
     if ( $ay_flash_cats == "" ) {
     
          $flash_categories = new SelectEntrys();
    
          $flash_categories->cols      = 'ID, category';
          $flash_categories->table     = $tbl_flash_categories;
          $flash_categories->order     = 'ID';
          $flash_categories->multiSelect = '1';
          
          $ay_flash_categories = $flash_categories->row();
         
          foreach ($ay_flash_categories as $key=>$value) $arr_cats[$value['ID']] = $value['category'];
          
          $memcache->set("ay_flash_cats", $arr_cats, false, $duration_cats);     
              
     } 
    
     if ( $ay_flashes_voted == "" ) {
        
          $flashes_voted = new SelectEntrys();
    
          $flashes_voted->cols          = 'flashID';
          $flashes_voted->table         = $tbl_flash_results;
          $flashes_voted->condition     = " userID = '".$user_data['ID']."' ";
          $flashes_voted->order         = 'flashID';
          $flashes_voted->multiSelect  = '1';
                    
          $ay_flashes_voted = $flashes_voted->row();
          unset($arr);
                           
          if ($ay_flashes_voted != '') {
              foreach ($ay_flashes_voted as $key=>$value) $arr[] = $value['flashID'];   
          } else $arr = Array();
          
          $mem_key3 = "ay_flashes_voted_".$user_data['UserToken'];         
          $memcache->set($mem_key3, $arr, false, $duration);
          unset($arr);
         
     }

     if ( $ay_flashes_rated == "" ) {
                         
          $flashes_rated = new SelectEntrys();
    
          $flashes_rated->cols          = 'flashID';
          $flashes_rated->table         = $tbl_flash_ratings;
          $flashes_rated->condition     = " userID = '".$user_data['ID']."' ";
          $flashes_rated->order         = 'flashID';
          $flashes_rated->multiSelect  = '1';
          
          $ay_flashes_rated = $flashes_rated->row();
          
          unset($arr);                       
          if ($ay_flashes_rated != '') {
              foreach ($ay_flashes_rated as $key=>$value) $arr[] = $value['flashID'];   
          } else $arr = Array();
          
          $mem_key4 = "ay_flashes_rated_".$user_data['UserToken'];            
          $memcache->set($mem_key4, $arr, false, $duration);
     
     }  

     $tpl->assign('ay_flash_categories', $memcache->get('ay_flash_cats') );
     $tpl->assign('ay_flashes_voted', $memcache->get('ay_flashes_voted_'.$user_data['UserToken']) );
     $tpl->assign('ay_flashes_rated', $memcache->get('ay_flashes_rated_'.$user_data['UserToken']) );
               