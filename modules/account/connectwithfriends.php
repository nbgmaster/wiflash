<?php 

    if (isset($_GET['e']))  {
        $tpl->assign('fb_con_status', $_GET['e']); 
    }
              
    $sections_public = explode(",", $user_data['sections_public']);
    
    for ($i=1;$i<=5;$i++) {
    
        if (in_array($i, $sections_public)) $tpl->assign('f_sharing_'.$i, "checked='checked'");   
        else  $tpl->assign('f_sharing_'.$i, ""); 
        
    }

             
    $number_of_friends = count($user_data['fb_friends']);
    
    $total_pages = ceil($number_of_friends / $per_page_friendslist);
    $tpl->assign('total_pages', "$total_pages"); 
    $tpl->assign('number_of_friends', "$number_of_friends"); 
    $tpl->assign('category', "friendslist");
      