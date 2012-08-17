<?php

  error_reporting(E_ALL);

  /* Prevent Header Output Error */
        
     session_start();
     ob_start();
     
     //$expires = 60*60*24*365;
     //header("Cache-Control: maxage=".$expires);
     //header('Expires: ' . gmdate('D, d M Y H:i:s', time()) . ' GMT');
     header("Cache-Control: private, no-cache, no-store, must-revalidate"); 
     header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
     //header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
     //header("Cache-Control: no-cache, must-revalidate");
     //header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

  /******************************************/
  
     $start = microtime(true); 
  
  /* Define :: Globals & Constants */  
  
     global $xajax;
     global $timestamp;        
     global $tpl;
     global $module;
     global $lang_active;
     global $memcache; 
     global $duration;
     global $_COOKIE; 
     global $logon_true;
     
     //define("ROOT_DIR", 'http://localhost/html/wiflash/');
     define("ROOT_DIR", 'http://127.0.0.1/wiflash/');
                                      
  /******************************************/
        

  /* Login Status */
  
     $logon_true = '';
     $l = Array();

     if ( isset($_COOKIE["l"]) )  {

          /* Call Method :: Explode the Cookie */
                   
             $l["token"] = substr($_COOKIE["l"], 3, -35);           
             $l["pw"]    = substr($_COOKIE["l"], -32);   

          /******************************************/


         /* Compare Cookie data with database 

            $logon = new CheckExist();

            $logon->tableE     = $tbl_users;
            $logon->conditionE = " UserToken = '".$l["token"]."' && UserPass = '".$l["pw"]."' ";

            $logon_true = $logon->exist();

         ******************************************/
         
         $logon_true = 1;

     }   else $l["token"] = 0;

  /******************************************/
    
       
  /* Load :: Caching System */

     require_once("settings/memcache.php");
                          
  /******************************************/
  
  
  /* Load :: Smarty */

     require_once("./plugins/smarty/Smarty.class.php"); 

  /******************************************/


  /* Load :: Database connection */
         
     require_once('lib/dbCon.php');
     require_once("settings/dbCon.php");

  /******************************************/


  /* Security:: Set register globals off */

     if ( @ini_get('register_globals') )

          foreach ( $_REQUEST as $key => $value )

                    unset($GLOBALS[$key]);

  /******************************************/
  

  /* Load :: Current time & date */

     $timestamp = time();
     $mysqldate = date( 'Y-m-d H:i:s', time() );
         
     $c_time = date("H:i",$timestamp);
     $c_date = date("d.m.Y",$timestamp);
     $Fyear      = date("Y",$timestamp);
     
     define("C_YEAR", date("Y",$timestamp));
     
  /******************************************/


  /* Load :: Tablenames AND browser identification */

     include('tables.php');

     //include('browser.php');

  /******************************************/
  
  
  /* Load :: Libraries */
    
     require_once('./lib/exist.php');
     require_once('./lib/select.php');
     require_once('./lib/replace.php');    
     require_once('./lib/modify.php');
     require_once('./lib/functions.php');
                          
  /******************************************/
   

  /* Load :: Template settings */

     include('template.php');

  /******************************************/
  
   
  /* Load :: XAJAX AND Smarty */
         
     require_once('lib/ajax_functions.php');
     
  /******************************************/

  
  /* Loginbox */

     include("modules/logon/index.php");

  /******************************************/

    
 /* Load :: Languages */
 
     $languages = new SelectEntrys();

     $languages->cols        = 'languages, language_names';
     $languages->table       = $tbl_settings;
     $languages->order       = 'ID';
     $languages->limit       = 1;
     $languages->multiSelect = 1;
     $languages = $languages->row();

     $ay_lang = explode(",",$languages[0]['languages']);
     $ay_lang_names = explode(",",$languages[0]['language_names']);
               
     $count=0;
     foreach ($ay_lang as $loop) {
         $ay_langs[$count]['language'] = $ay_lang[$count];
         $ay_langs[$count]['language_name'] = $ay_lang_names[$count];
         $count++;     
     }
     
     unset($languages);  

     if (!isset($_SESSION['language_active'])) {
         if (in_array(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2),$ay_lang)) $_SESSION['language_active'] = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
         else $_SESSION['language_active'] = 'en';
     }                   
          
     if (isset($_GET['lang']) && $logon_true != '1') {
         if (in_array($_GET['lang'],$ay_lang)) { 
             unset($_SESSION['language_active']);
             $_SESSION['language_active'] = $_GET['lang'];
         }
     }
                 
     if ( $logon_true == '1' ) $lang_active = $user_data['language'];
     else $lang_active =  $_SESSION['language_active'];
     
     $lang_active = "en"; // for now, only English version
          	    
     $tpl->assign('ay_languages', $ay_langs);      
     $tpl->assign('lang_active', $lang_active); 
                               
 /******************************************/


  /* Get texts */
  
    /* TODO ::: PUT INTO CACHE !!! */
    
    /*************
     ***********
     *********
    *******/

     $texts = new SelectEntrys();

     $texts->cols      = 'name, '.$lang_active.', html';
     $texts->table     = $tbl_texts;
     $texts->order     = 'name';
     $texts->multiSelect = 1;
     $texts->output_name = 1;
     $texts = $texts->row();
   
     foreach( $texts as $array1 => $array2) { 
              if ($texts[$array1]["html"] == 1) $tpl->assign($array1, replaceBBcode($texts[$array1][$lang_active], '', 1)); 
              else $ar1 = $tpl->assign($array1, $texts[$array1][$lang_active]);
     }         
          
     unset($texts);


 /* Initialize :: Current Page Number */

     include('page_settings.php');
                     
  /******************************************/


   /* Define :: Fixed Values */
  
     
  /******************************************/
  
  
   /* Load :: Navigation Categories */
   
     if ( $logon_true == 1 ) {
   
         $n_categories = new SelectEntrys();
    
         $n_categories->cols      = 'ID, category';
         $n_categories->table     = $tbl_flash_categories;
         $n_categories->order     = 'ID';
         $n_categories->multiSelect = '1';
         
         $n_categories = $n_categories->row();
               
         $tpl->assign('n_categories', $n_categories);
     
     }
     
  /******************************************/