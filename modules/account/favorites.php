<?php 

     $favorites = new SelectEntrys();

     $favorites->cols          = "$tbl_favorites.flashID, $tbl_flashes.question";
     $favorites->table         = $tbl_favorites;
     $favorites->join          = " LEFT JOIN $tbl_flashes ON ($tbl_flashes.ID = $tbl_favorites.flashID) ";
 
     $favorites->condition     = " $tbl_favorites.userID = '".$user_data['ID']."' ";
     $favorites->order         = "$tbl_favorites.time DESC";
     $favorites->limit         = $per_page_favorites;
     $favorites->multiSelect   = 1;
     $ay_favorites = $favorites->row();
        
     $tpl->assign('ay_favorites', $ay_favorites); 

     $n_fav = new CheckExist();
     $n_fav->tableE     = $tbl_favorites;
     $n_fav->conditionE = " userID = '".$user_data['ID']."' ";
     $n_fav = $n_fav->exist();
     $number_of_fav = $n_fav;
    
     $total_pages = ceil($number_of_fav / $per_page_favorites);
     $tpl->assign('total_pages', "$total_pages"); 
     $tpl->assign('total', $number_of_fav); 
     $tpl->assign('category', "favorites");
      
     unset($ay_favorites);
     