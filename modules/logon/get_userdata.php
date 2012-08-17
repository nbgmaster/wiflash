<?php 

            if ( $trigger_f == "" ) {    
            
               $usr_trigger = new SelectEntrys();
               $usr_trigger->token   = $l["token"];
               $usr_trigger->cols    = 'trigger_friends';
    
               $get_trigger = $usr_trigger->getUserData();
         
               $mem_key2 = "trigger_f_".$l["token"];  
               $memcache->set($mem_key2, $get_trigger, false, 300);
               
               $trigger_f = $get_trigger;
           
            }
                    
            if ( $user_data == "" || $trigger_f == 1 ) { 
   
               $usr_data = new SelectEntrys();
               $usr_data->token   = $l["token"];
               $usr_data->cols    = 'ID, UserToken, UserEmail, UserPass, flash_categories_visible, fb_ID, fb_name, sections_public, language, last_online_time';
               $usr_data->multiSelect = '1';       

               $ay_user = $usr_data->getUserData();
     
               unset($usr_data);

               if ($trigger_f == 1) {

                   $mem_key1 = "user_data_".$l["token"];                 
                   $memcache->delete($mem_key1);  
                                                             
                   $upd_data = new ModifyEntry();
                   $upd_data->table     = $tbl_users;
                   $upd_data->condition = " ID = '".$ay_user[0]['ID']."' ";
                    
                   $upd_data->changes   = " trigger_friends = '0' ";
              
                   $upd_data->update();
              
                   unset($upd_data);         
                     
               }
                  
               if ($ay_user[0]['fb_ID'] != 0) {
                             
                     $get_friends = new SelectEntrys();
  
                     $get_friends->cols      = 'fb_ID, friendID, fb_name, restricted';
                     $get_friends->table     = $tbl_friends;
                     $get_friends->condition = " userID = '".$ay_user[0]['ID']."' AND friendID > 0 ";
                     $get_friends->order     = 'fb_name';
                     $get_friends->multiSelect = '1';
                      
                     $friends_new = $get_friends->row();
                                             
                     if ($friends_new !== false) {

                         $ay_user[0]['fb_friends'] = $friends_new;  
                     
                     } else $ay_user[0]['fb_friends'] = Array();   
               
                     unset($members);
                     unset($friends); 
                                             
               }  
               
               else $ay_user[0]['fb_friends'] = Array();   
               
               $mem_key1 = "user_data_".$l["token"];       
               $memcache->set($mem_key1, $ay_user[0], false, $duration);
               
               $user_data = $ay_user[0];
         
            } 
                       