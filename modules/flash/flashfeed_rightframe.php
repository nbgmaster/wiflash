<?php 

     $f_top_rated = new SelectEntrys();

     $f_top_rated->cols          = 'ID, question, rating';
     $f_top_rated->table         = $tbl_flashes;
     $f_top_rated->order         = 'rating DESC';
     if ($_GET['module'] == 'flash')  $f_top_rated->condition = "category = $cid";
     $f_top_rated->limit         = 5;
     $f_top_rated->multiSelect  = '1';
      
     $ay_f_top_rated = $f_top_rated->row();

     $f_top_voted = new SelectEntrys();
 
     $f_top_voted->cols          = 'ID, question, total_votes';
     $f_top_voted->table         = $tbl_flashes;
     $f_top_voted->order         = 'total_votes DESC';
     if ($_GET['module'] == 'flash')  $f_top_voted->condition = "category = $cid";
     $f_top_voted->limit         = 5;
     $f_top_voted->multiSelect  = '1';
      
     $ay_f_top_voted = $f_top_voted->row();
     
     $tpl->assign('ay_f_top_rated', $ay_f_top_rated );
     $tpl->assign('ay_f_top_voted', $ay_f_top_voted );