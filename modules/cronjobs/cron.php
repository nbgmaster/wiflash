<?php

     error_reporting(E_ALL);
          
  /* Create Object :: CONNECT */

     require_once('lib/dbCon.php');

     $DBcon = new EstablishDBConnection();

     $DBcon->dbserver = 'localhost';
     $DBcon->dbuser   = 'web231';
     $DBcon->dbpass   = '121DB413';
     $DBcon->dbname   = 'usr_web231_6';

     $DBcon->connectDB();

  /******************************************/
  
     //require_once("settings/dbCon.php");
     require_once("lib/readdirectory.php");
     require_once("lib/modify.php");
    
     $cron = new ModifyEntry();
                    
     $cron->table  = "cron";
     $cron->cols   = 'test';
     $cron->values = " 'jo' ";
 
     $cron->insert();

     unset($cron);
