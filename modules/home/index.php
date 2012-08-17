<?php 

  if ($_GET['section'] == 'index') {
  
      if ( $logon_true == '1' ) include('modules/home/main.php');  
    
      //else include('modules/register/index.php');  
  
  }
  
  else include('modules/home/'.$_GET['section'].'.php');  
  
  
