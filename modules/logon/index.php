<?php

  /* LOGIN ACTION */
      
     if ( isset( $_POST['login'] ) )  {

          include('modules/logon/login.php');

     }

  /******************/


  /* LOGOUT ACTION */

     else if ( isset( $_POST['logout'] ) )   { 
     
         include('modules/logon/logout.php');

     }

  /******************/


  /* NO STARTING ACTION */

     else  {
         
         if ( $logon_true == '1' ) {   
  
              /* Get UserData */
              
                  include('modules/logon/get_userdata.php');
                    
                  $tpl->assign('usr_data', $user_data); 

                  $diff_max = 60*5; // clear session after 5 minutes
                  $diff_actual = $timestamp - strtotime($user_data['last_online_time']);
                  
                  if ($diff_actual > $diff_max) {
                  
                      $upd_data = new ModifyEntry();
                      $upd_data->table     = $tbl_users;
                      $upd_data->condition = " ID = '".$user_data['ID']."' ";
                      
                      $upd_data->changes   = " last_online_time = '$mysqldate' ";
                
                      $upd_data->update(); 
                      unset($upd_data);   
                      
                      $user_data['last_online_time'] = $mysqldate;
                      $mem_key1 = "user_data_".$l["token"];       
                      $memcache->replace($mem_key1, $user_data, false);  
                  
                  } 

              /******************************************/


              /* Load :: Logoutbox */

                 //$tpl->display("logon/logout.tpl");

              /******************************************/

         }
          
     }

  /******************/