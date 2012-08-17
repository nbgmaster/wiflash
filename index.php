<?php

  /* Load :: Configuration settings */

     require_once('settings/config.php');

  /******************************************/

  /* Load :: Content */
  
     if (!isset($_GET['module']))  $_GET['module']  = 'home';
     if (!isset($_GET['section'])) $_GET['section'] = 'index';

     $tpl->display("header.tpl");
     
     if ($logon_true == 1) $tpl->display("leftframe.tpl");
     
     $site_existing = 0;    
          
     if ($_GET['module'] == 'flash') { $_GET['flashID'] = $_GET['section']; $_GET['section'] = 'index'; } 
      
     if (file_exists('modules/'.$_GET['module']."/".$_GET['section'].".php") && file_exists('templates/modules/'.$_GET['module']."/".$_GET['section'].".tpl"))  { 
         
         if (($_GET['module'] != 'home' && $logon_true == 1) || $_GET['module'] == 'home' || $_GET['module'] == 'register' ) {
          
              include("modules/".$_GET['module']."/".$_GET['section'].".php");  
              $tpl->display("modules/".$_GET['module']."/".$_GET['section'].".tpl"); 
              
              $site_existing = 1;
                 
          }   else  header ("Location:".ROOT_DIR);
             
      }   else  $tpl->display("errorpage.tpl");
      
     flush();
      
     if ($logon_true == 1) {
     
         if ($logon_true == 1) $tpl->display("rightframe_start.tpl");
         if ($site_existing == 1 && file_exists('templates/rightframe/'.$_GET['module']."/".$_GET['section'].".tpl")) $tpl->display("rightframe/".$_GET['module']."/".$_GET['section'].".tpl");
         if ($logon_true == 1) $tpl->display("rightframe_end.tpl");
               
     }
      
     $end = microtime(true); 
     $tpl->assign("rendering_time", substr($end-$start,0,-9));

     $tpl->display("footer.tpl"); 

  /******************************************/


  /* Close :: Session */

     $diff_max = 60*10; // clear session after 10 minutes
     $diff_actual = $timestamp - strtotime($user_data['last_online_time']);

     //if ($diff_actual > $diff_max) 
         //$memcache->delete('user_data_'.$user_data['ID']);  
    
  /******************************************/
  
  //print_r($user_data["fb_friends"]);


