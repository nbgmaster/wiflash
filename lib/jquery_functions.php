<?php

   require_once('dbCon.php');
   require_once('../settings/dbCon.php');

   include("../settings/tables.php");
   include("exist.php");
        
        
   if ( $_GET['s'] == "check_email" ) {
  
      $email    = trim(stripslashes(mysql_real_escape_string($_GET['email'])));  
      $email_exist = new CheckExist();
      $email_exist->tableE = $tbl_users;
      $email_exist->conditionE = "UserEmail = '$email' ";
      $obj_return = $email_exist->exist();  
     
      echo $obj_return;
                                          
   }
      