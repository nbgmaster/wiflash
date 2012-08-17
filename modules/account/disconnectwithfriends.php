<?php 
 
     $upd_data = new ModifyEntry();
     $upd_data->table     = $tbl_users;
     $upd_data->condition = " id = '".$user_data['ID']."' ";
      
     $upd_data->changes   = " fb_ID = '0', fb_name = '' ";

     $upd_data->update();
     unset($upd_data);
     
     $friends_delete = new ModifyEntry();
     $friends_delete->table  = $tbl_friends;
     $friends_delete->condition  = " userID = '".$user_data['ID']."' ";
     $friends_delete->delete();
     unset($friends_delete);
    
     $prep_trigger = new SelectEntrys();

     $prep_trigger->cols      = 'userID';
     $prep_trigger->table     = $tbl_friends;
     $prep_trigger->condition = " friendID = '".$user_data['ID']."' ";
     $prep_trigger->multiSelect = '1';
      
     $ay_trigger = $prep_trigger->row();

     if ($ay_trigger !== false) {
         foreach ($ay_trigger as $key=>$value) $arr[] = $value['userID'];     
         $str_trigger = implode(",", $arr);

          $set_trigger = new ModifyEntry();
          $set_trigger->table  = $tbl_users;
          $set_trigger->condition  = " ID IN ($str_trigger) ";
          $set_trigger->changes    = " trigger_friends = 1 ";
          $set_trigger->update();
          unset($set_trigger); 
     }    

     $friends_upd = new ModifyEntry();
     $friends_upd->table  = $tbl_friends;
     $friends_upd->condition  = " friendID = '".$user_data['ID']."' ";
     $friends_upd->changes    = " friendID = 0 ";
     $friends_upd->update();
     unset($friends_upd);

     $user_data['fb_friends'] = Array();
     $user_data['fb_ID'] = 0;
     $user_data['fb_name'] = "";
     
     $mem_key1 = "user_data_".$user_data['UserToken'];
     
     $memcache->replace($mem_key1, $user_data, false);  
     //$memcache->delete('user_data_'.$user_data['ID']);  //only replace
     
     header ("Location:".ROOT_DIR."account/connectwithfriends.html?e=disconnected");
  