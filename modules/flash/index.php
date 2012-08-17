<?php 

   if( $_GET['flashID'] == 'newflash' ) {
       include('modules/flash/newflash.php');
       $tpl->assign('section', 'newflash');  
   }
   
   else {
  
       $n_categories = new SelectEntrys();
  
       $n_categories->cols      = 'ID, category';
       $n_categories->table     = $tbl_flash_categories;
       $n_categories->order     = 'ID';
       $n_categories->multiSelect = '1';
       
       $n_categories = $n_categories->row();
       
       foreach ($n_categories as $key=>$value) {
       
                if ($value["category"] == ucfirst($_GET['flashID'])) $cid = $value['ID'];
       
                $arr[] = $value["category"];
       
       }    
    
       if (in_array(ucfirst($_GET['flashID']), $arr)) $section = 'category'; 
       else  $section = 'fid'; 
       
       if ($section == 'category') {
       
           $tpl->assign('section', 'category');
           $tpl->assign('cid', $cid);
             
           include('modules/flash/flashfeed_add.php');          
           include('modules/flash/flashfeed.php');
           include('modules/flash/flashfeed_rightframe.php');
                 
       }
       
       else if ($section == 'fid')  include('modules/flash/flash_single.php'); 

       $tpl->assign('flashID', $_GET['flashID']);
     
  }