<?php
                      
  /* Crypt Password with MD5 Method */

     $pw_crypted = MD5($_POST['UserPass']);

  /******************************************/


  /* Create Object :: EXIST */

     $logon = new CheckExist();

  /******************************************/


  /* Check :: EXIST */
              
     $logon->tableE     = $tbl_users;
     $logon->conditionE = " UserEmail = '".$_POST['UserEmail']."' && UserPass = '".$pw_crypted."' && activation_code = '' ";

     $CheckData = $logon->exist();   

  /******************************************/


  /* Change Status :: Login successful or failed */

     if ( $CheckData == 1 )  {
    
          $logon->email = $_POST['UserEmail'];
          $logon->pw    = $pw_crypted;

          $logon->tbl_users = $tbl_users;
          
          if (isset($_POST['autologon'])) $logon->cookie_duration = 1;
          else $logon->cookie_duration = 0;

          $logon->cookieset('l');

          header ("Location:".ROOT_DIR);

     }

     else  {

          $logon->email = '';
          $logon->pw   = '';

          //$logon->cookieset('l');

          $tpl->assign('logon_failure', true);
          
          //$tpl->display("logon/login.tpl");

     }

     unset($logon);

  /******************************************/
