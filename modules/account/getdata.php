<?php 

       $app_id     = "193065620755770";
       $app_secret = "45b3cfe7a79e293357ddb8e3424bea28";
       $my_url     = ROOT_DIR.'account/getdata.html';
       $access_inf = "read_friendlists";

       $code = "";
  
       if (isset($_GET['error_reason']))  {
           header ("Location:".ROOT_DIR."account/connectwithfriends.html?e=".$_GET['error_reason']); 
           $tpl->assign('fb_con_status', $_GET['error_reason']);  
       }
     
       if (isset($_REQUEST["code"])) $code = $_REQUEST["code"];
    
       if(empty($code)) {
         $_SESSION['state'] = md5(uniqid(rand(), TRUE)); //CSRF protection
         $dialog_url = "http://www.facebook.com/dialog/oauth?client_id=" 
           . $app_id . "&redirect_uri=" . urlencode($my_url) . "&state="
           . $_SESSION['state'] . "&scope=" . $access_inf;
    
         echo("<script> top.location.href='" . $dialog_url . "'</script>");
       }
       
       if($_REQUEST['state'] == $_SESSION['state']) {
         $token_url = "https://graph.facebook.com/oauth/access_token?"
           . "client_id=" . $app_id . "&redirect_uri=" . urlencode($my_url)
           . "&client_secret=" . $app_secret . "&code=" . $code . "&scope=" . $access_inf;
    
         $response = file_get_contents($token_url);
         $params = null;
         parse_str($response, $params);

         $graph_url = "https://graph.facebook.com/me?access_token=" 
           . $params['access_token'];
    
         $graph_url2 = "https://graph.facebook.com/me/friends?access_token=" 
           . $params['access_token'];
     
         //documentation: http://developers.facebook.com/tools/explorer/?method=GET&path=me%2Ffriends

         $user       = json_decode(file_get_contents($graph_url));
         $friendlist = json_decode(file_get_contents($graph_url2));

         $fb_con_ex = new CheckExist();
         $fb_con_ex->tableE = $tbl_users;
         $fb_con_ex->conditionE = " fb_ID = '$user->id' AND ID != '".$user_data['ID']."' ";
         $fb_ex = $fb_con_ex->exist();
             
         if ($fb_ex == 0) { 
            
             $ay_friendlist = objectToArray($friendlist);
    
             $str_friends = "";   
            
             if ($ay_friendlist != '')  {
                                                                                             
                 $sel_data = new SelectEntrys();
                 $ins_data = new ModifyEntry();
                 
                 if($user_data['fb_ID'] > 0) $do_update = 1;
                 else $do_update = 0;
                 
                                     
                 foreach ($ay_friendlist as $key=>$value) {

                          if($user_data['fb_ID'] > 0) $count = count($user_data['fb_friends']);
                          else $count = 0;                 

                          foreach ($value as $key2=>$value2) {            
                                   //$ay_friendlist2[$key2] = $value2;
                                   //$str_friends .= $value2['id'].','; 
                                   
                                   $fr_ex = 0;
                                   if($do_update == 1) {
                                   
                                      foreach ($userdata["fb_friends"] as $key3=>$value3) {
                                      
                                   
                                      $friend_ex = new CheckExist();
                                      $friend_ex->tableE = $tbl_friends;
                                      $friend_ex->conditionE = " userID != '".$user_data['ID']."' AND fb_ID = '".$value2['id']."' ";
                                      $fr_ex = $friend_ex->exist();
                                      
                                   }
                                       
                                   $get_friend_id = 0;
                                   
                                   $sel_data->cols          = 'ID';
                                   $sel_data->table         = $tbl_users;
                                   $sel_data->condition     = " fb_ID = '".$value2['id']."' ";
                                   $get_friend_id = $sel_data->row();
    
                                   if ($fr_ex == 0) {    
                                       $ins_data->table     = $tbl_friends;
                                       $ins_data->cols      = 'userID, friendID, fb_ID, fb_name';
                                       $ins_data->values    = " '".$user_data['ID']."', '$get_friend_id', '".$value2['id']."', '".$value2['name']."' ";
                          
                                       $ins_data->insert();
                                   
                                   }
                                   
                                   if ($fr_ex == 1) {
                                   
                                   foreach ($userdata["fb_friends"] as $key3=>$value3) {
                                   
                                   if ($value3['fb_ID'] == $value2['id'])  $value3['friendID']
                                   	
                                   }
                                   }
                                   
                                   if ($get_friend_id > 0) {
                                       $data[$key2] = $value2['name'];
                                       $arr[$key2]["userID"]   = $value2['id'];
                                       $arr[$key2]["friendID"] = $get_friend_id;
                                       $arr[$key2]["fb_ID"]   = $value2['id'];
                                       $arr[$key2]["fb_name"] = $value2['name'];
                                       if ($fr_ex == 0) $arr[$key2]["restricted"] = 0;
                                       else {
                                       
                                       }
                                   }
                                 
                          }                 
          
                 }    
                 
                 array_multisort($data, SORT_ASC, $arr);
                 $user_data['fb_friends'] = $arr;
                 unset($sel_data);             
                 unset($ins_data);
                 unset($arr);     
                     
             }
  
             //$ay_friendlist = base64_encode(serialize($ay_friendlist2)); 
             //$username = utf8_decode($user->name);
                             
             $upd_data = new ModifyEntry();
             $upd_data->table     = $tbl_users;
             $upd_data->condition = " id = '".$user_data['ID']."' ";
              
             $upd_data->changes   = " fb_ID = '$user->id', fb_name = '$user->name' ";
     
             $upd_data->update();
             unset($upd_data);
             
             
             $prep_trigger = new SelectEntrys();

             $prep_trigger->cols      = 'userID';
             $prep_trigger->table     = $tbl_friends;
             $prep_trigger->condition = " fb_ID = '$user->id' ";
             $prep_trigger->multiSelect = '1';
              
             $ay_trigger = $prep_trigger->row();
        
             foreach ($ay_trigger as $key=>$value) $arr[] = $value['userID'];     
             $str_trigger = implode(",", $arr);
             
             if ( $ay_trigger !== false ) {
                  $set_trigger = new ModifyEntry();
                  $set_trigger->table  = $tbl_users;
                  $set_trigger->condition  = " ID IN ($str_trigger) ";
                  $set_trigger->changes    = " trigger_friends = 1 ";
                  $set_trigger->update();
                  unset($set_trigger); 
             }    
 
             $friends_upd = new ModifyEntry();
             $friends_upd->table  = $tbl_friends;
             $friends_upd->condition  = " fb_ID = '$user->id' ";
             $friends_upd->changes    = " friendID = '".$user_data['ID']."' ";
             $friends_upd->update();
             unset($friends_upd);
             
             $user_data['fb_ID'] = $user->id;
             $user_data['fb_name'] = $user->name;
             $mem_key1 = "user_data_".$user_data['UserToken'];  
             $memcache->replace($mem_key1, $user_data, false);
                        
             header ("Location:".ROOT_DIR."account/connectwithfriends.html?e=success");

         }
         
         else  {
             $tpl->assign('fb_con_status', "already existing"); 
             header ("Location:".ROOT_DIR."account/connectwithfriends.html?e=con_exist");
          }
       
       }
       
       else {
         echo("The state does not match. You may be a victim of CSRF.");
       }
 