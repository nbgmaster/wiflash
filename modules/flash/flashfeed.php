<?php 
      
     if ($_GET['module'] != 'flash') {

         $ay_cats_active = explode(",", $user_data['flash_categories_visible']);
    
         $flash_cats = new CheckExist();
         $flash_cats->tableE = $tbl_flash_categories;
         $n_flash_cats = $flash_cats->exist();
    
         for ($i=1;$i<=$n_flash_cats;$i++) {
        
              if (in_array($i, $ay_cats_active)) $tpl->assign('flash_cat_'.$i, "checked='checked'");   
              else  $tpl->assign('flash_cat_'.$i, ""); 
            
         }  
     
     } 
         
     if ($user_data['flash_categories_visible'] != "" || $_GET['module'] == 'flash') {
     
         $cats = $user_data['flash_categories_visible'];

         $flashes = new SelectEntrys();
    
         $flashes->cols      = 'ID, section, category, type, question, likes, dislikes, opt1, opt2, opt3, opt4, opt5, opt6, opt7, opt8, opt9, opt10, opt1_votes, opt2_votes, opt3_votes, opt4_votes, opt5_votes, opt6_votes, opt7_votes, opt8_votes, opt9_votes, opt10_votes';
         $flashes->table     = $tbl_flashes;
         if ($_GET['module'] == 'flash') $flashes->condition = "category = $cid";
         else $flashes->condition = "category IN ($cats)";
         $flashes->order     = 'CreateDate DESC';
         $flashes->limit     = $per_page_flashes;
         $flashes->multiSelect = '1';
          
         $ay_flashes = $flashes->row();       
         if ($ay_flashes == "") $ay_flashes = Array();  
         
     } else $ay_flashes = Array();  
  
     $tpl->assign('ay_flashes', $ay_flashes);
     $tpl->assign('mysqldate', $mysqldate);

     unset($ay_flashes);      