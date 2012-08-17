<?php

   if ( isset($_GET['module']) && isset($_GET['section']) ) {

         if ($_GET['module'] == 'account' && $_GET['section'] == 'connectwithfriends') {
    
             $per_page_friendslist = 30;
                  
             $tpl->assign('per_page_friendslist', $per_page_friendslist);
             $tpl->assign('start_friendslist', 0);
             $tpl->assign('current_page', 1); 
             $tpl->assign('total', 0); 
                  
         }
         
         if ($_GET['module'] == 'account' && $_GET['section'] == 'favorites') {
    
             $per_page_favorites = 20;
        
             $tpl->assign('per_page_favorites', $per_page_favorites);
             $tpl->assign('start_favorites', 0);
             $tpl->assign('current_page', 1); 
              
         }
     
     }
     
     $per_page_flashes = 10;