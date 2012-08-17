<?php

  /* Create Object :: EXIST */

     $logon = new CheckExist();

  /******************************************/

 
  /* Logout :: Delete Cookie */

     $logon->email = '';
     $logon->pw    = '';

     $logon->cookieset('l');
 
     //$tpl->display("logon/login.tpl");

     //$memcache->delete('user_data_'.$user_data['ID']);  
          
     unset($logon);
     session_destroy();

     header ("Location:".ROOT_DIR);
     
  /******************************************/