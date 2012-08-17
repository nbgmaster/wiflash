<?php


   require('plugins/xajax/xajax_core/xajax.inc.php');

   $xajax = new xajax();
   //$xajax->configure('debug', true);
   $xajax->configure('javascript URI', ROOT_DIR.'plugins/xajax/');
   //$xajax->configure('defaultMode', "asynchronous");
   
   $xajax->register(XAJAX_FUNCTION, "register");          
   $xajax->register(XAJAX_FUNCTION, "refresh");                           
   $xajax->register(XAJAX_FUNCTION, "save");    
   $xajax->register(XAJAX_FUNCTION, "page"); 
   $xajax->register(XAJAX_FUNCTION, "rate"); 

  /******************************************/
  

  function register ( $FormValues ) {
     
         include('settings/tables.php');   
         $objResponse = new xajaxResponse(); 

         $email    = trim(stripslashes(mysql_real_escape_string($FormValues['email'])));         
         $password = trim(stripslashes(mysql_real_escape_string(md5($FormValues['pw']))));
         $act_code = md5 ( uniqid ( rand() ) );
         $token    = time().uniqid();
                             
         $user_register = new ModifyEntry();         
         $user_register->table  = $tbl_users;
         $user_register->cols   = 'UserToken, UserEmail, UserPass, activation_code, language';
         $user_register->values = " '$token', '$email', '$password', '$act_code', 'en' ";

         $user_register->insert();    
         
         unset($user_register);  
         
         $objResponse->assign("form_reg","style.display",'none');
         $objResponse->assign("reg_success","style.display",'block');   
         
         return $objResponse;
                    
  }
  
  function refresh ( $site, $section, $time, $timeval ) {
      
        global $memcache;
        global $tpl;
        global $duration;
        global $_COOKIE;     

        include('settings/tables.php');
        include('settings/page_settings.php');
                          
        $objResponse = new xajaxResponse(); 
        
        if (!isset($_COOKIE["l"])) { 
            $objResponse->redirect(ROOT_DIR);
            return $objResponse;    
        }
                                     
        $l["token"] = substr($_COOKIE["l"], 3, -35);  
        $mem_key1    = "user_data_".$l["token"];   
        $user_data   = $memcache->get($mem_key1);      
        $mem_key2    = "trigger_f_".$l["token"];   
        $trigger_f   = $memcache->get($mem_key2); 

        include('modules/logon/get_userdata.php');
                       
        $cats = explode(",",$user_data['flash_categories_visible']);     
        foreach ($cats as $arr)  $x[] = $arr;
        $cats = implode(",",$x);

        if ($site == 'flashfeed') {
    
            $flashes = new SelectEntrys();
    
            $flashes->cols      = 'ID, CreateDate, section, category, type, question, likes, dislikes, opt1, opt2, opt3, opt4, opt5, opt6, opt7, opt8, opt9, opt10, opt1_votes, opt2_votes, opt3_votes, opt4_votes, opt5_votes, opt6_votes, opt7_votes, opt8_votes, opt9_votes, opt10_votes';
            $flashes->table     = $tbl_flashes;
            if ($section == 'main') $flashes->condition = "  CreateDate > '$time' AND category IN ($cats) ";
            else $flashes->condition = "  CreateDate > '$time' AND category = '$section' "; 
            $flashes->order     = 'CreateDate DESC';
            $flashes->limit     = $per_page_flashes;
            $flashes->multiSelect = '1';
            
            $ay_flashes = $flashes->row();
            
            unset($flashes);
            
            if ($ay_flashes != "") {
            
                $mem_key3 = "ay_flashes_voted_".$l["token"];
                $mem_key4 = "ay_flashes_rated_".$l["token"];
                $ay_flashes_voted = $memcache->get($mem_key3);                
                $ay_flashes_rated = $memcache->get($mem_key4);               
                $ay_flash_cats    = $memcache->get('ay_flash_cats');      
                                          
                include('modules/flash/flashfeed_add.php');

                $tpl->assign('ay_flashes', $ay_flashes);  
                
                if( count($ay_flashes) > $per_page_flashes )  $objResponse->assign("flashfeed","innerHTML",'');              

                $html = $tpl->fetch("modules/flash/flashfeed.tpl");   
                $objResponse->assign("updatefeed","innerHTML",$html);              
            
            }
          
            unset($ay_flashes);
            
        } 
              
        return $objResponse;
              
  }
    
  function save ( $site, $FormValues ) {
     
         global $memcache;
         global $tpl;
         global $duration;
         global $_COOKIE;
                   
         include('settings/tables.php');   
         $objResponse = new xajaxResponse(); 

         if (!isset($_COOKIE["l"])) { 
             $objResponse->redirect(ROOT_DIR);
             return $objResponse;    
         }
                                                                    
         $l["token"] = substr($_COOKIE["l"], 3, -35);   
         $mem_key1 = "user_data_".$l["token"];    
         $user_data   = $memcache->get($mem_key1);      
         $mem_key2    = "trigger_f_".$l["token"];   
         $trigger_f   = $memcache->get($mem_key2); 
         include('modules/logon/get_userdata.php');

         $mem_key3 = "ay_flashes_voted_".$l["token"];
         $mem_key4 = "ay_flashes_rated_".$l["token"];
         $ay_flashes_voted = $memcache->get($mem_key3);                
         $ay_flashes_rated = $memcache->get($mem_key4);               
         $ay_flash_cats    = $memcache->get('ay_flash_cats');      
                                           
         include('modules/flash/flashfeed_add.php');
          
         $mysqldate = date( 'Y-m-d H:i:s', time() );

         if ($site == 'sections_public') { 
                    
             if (isset($FormValues['sections_public']))  $sections_public = implode(',', $FormValues['sections_public']);
             else $sections_public = '';
             
             $upd_data = new ModifyEntry();
             $upd_data->table     = $tbl_users;
             $upd_data->condition = " ID = '".$user_data['ID']."' ";
              
             $upd_data->changes   = " sections_public = '$sections_public' ";
        
             $upd_data->update();
        
             unset($upd_data);   
                       
             $user_data['sections_public'] = $sections_public;
            
             $mem_key1    = "user_data_".$l["token"];   
             $memcache->replace($mem_key1, $user_data, false);
                  
             if (isset($FormValues['sections_public'])) {
                
                 for ($i=1;$i<=5;$i++) {
                
                      if (in_array($i, $FormValues['sections_public'])) $tpl->assign('f_sharing_'.$i, "checked='checked'");   
                      else  $tpl->assign('f_sharing_'.$i, ""); 
                       
                 }  
                 
             }
             
             else  for ($i=1;$i<=5;$i++) $tpl->assign('f_sharing_'.$i, "");
    
        }
        
        else if ($site == 'flash_cat') { 
                    
             if (isset($FormValues['flash_cats']))  $flash_cats = implode(',', $FormValues['flash_cats']);
             else $flash_cats = '';
             
             $upd_data = new ModifyEntry();
             $upd_data->table     = $tbl_users;
             $upd_data->condition = " ID = '".$user_data['ID']."' ";
              
             $upd_data->changes   = " flash_categories_visible = '$flash_cats' ";
        
             $upd_data->update();
        
             unset($upd_data);   
                       
             $user_data['flash_categories_visible'] = $flash_cats;
             
             $mem_key1    = "user_data_".$l["token"]; 
             $memcache->replace($mem_key1, $user_data, false);
             
               
             $flash_cats_n = new CheckExist();
             $flash_cats_n->tableE = $tbl_flash_categories;
             $n_flash_cats = $flash_cats_n->exist();
                        
             if (isset($FormValues['flash_cats'])) {
                
                 for ($i=1;$i<=$n_flash_cats;$i++) {
                
                      if (in_array($i, $FormValues['flash_cats'])) $tpl->assign('flash_cat_'.$i, "checked='checked'");   
                      else  $tpl->assign('flash_cat_'.$i, ""); 
                       
                 }  
                 
             }
             
             else  for ($i=1;$i<=$n_flash_cats;$i++) $tpl->assign('flash_cat_'.$i, ""); 

        /*redundant*/
            if ( $flash_cats != "" ) {
    
                 $flashes = new SelectEntrys();
    
                 $flashes->cols      = 'ID, section, category, type, question, likes, dislikes, opt1, opt2, opt3, opt4, opt5, opt6, opt7, opt8, opt9, opt10, opt1_votes, opt2_votes, opt3_votes, opt4_votes, opt5_votes, opt6_votes, opt7_votes, opt8_votes, opt9_votes, opt10_votes';
                 $flashes->table     = $tbl_flashes;
                 $flashes->condition = 'category IN ('.$flash_cats.')';
                 $flashes->order     = 'CreateDate DESC';
                 $flashes->limit     = 10;
                 $flashes->multiSelect = '1';
                  
                 $ay_flashes = $flashes->row();
                 if ($ay_flashes == "") $ay_flashes = Array();  
             
             } else $ay_flashes = Array();  
          /***/
                          
             $tpl->assign('ay_flashes', $ay_flashes);
             $tpl->assign('section', "category");
             $tpl->assign('ay_flash_categories', $memcache->get('ay_flash_cats') );
             
             $mem_key3    = "ay_flashes_voted_".$l["token"]; 
             $mem_key4    = "ay_flashes_rated_".$l["token"]; 
             $tpl->assign('ay_flashes_voted', $memcache->get($mem_key3) );
             $tpl->assign('ay_flashes_rated', $memcache->get($mem_key4) );
               
             $html = $tpl->fetch("modules/flash/flash_cats.tpl");   
             $html2 = $tpl->fetch("modules/flash/flashfeed.tpl");   
                           
             $objResponse->assign("flash_cats","innerHTML",$html);  
             $objResponse->assign("flashfeed","innerHTML",$html2);  
                                      
        }   

        else if ($site == 'flash') { 
          
             $id = $FormValues['flashID'];            
             $type = $FormValues['flash_type'];

             $flash_opt_str = 'flash_opt_'.$id;             

             $flash_res = new ModifyEntry();
             
             $str = '';
                          
             foreach ($FormValues['opt'] as $opt) {
             
                   if ($str == '') $str = "opt".$opt."_votes=opt".$opt."_votes+1";
                   else $str = $str.", opt".$opt."_votes=opt".$opt."_votes+1";

                   $flash_res->table  = $tbl_flash_results;
                   $flash_res->cols   = 'userID, flashID, opt, time';
                   $flash_res->values = " '".$user_data['ID']."', '$id', '$opt', '$mysqldate'";

                   $flash_res->insert();
             
             }

             unset($flash_res);
                         
             $upd_data = new ModifyEntry();
             $upd_data->table     = $tbl_flashes;
             $upd_data->condition = " ID = '$id' ";
              
             $upd_data->changes   = " $str, total_votes = total_votes +1 ";
        
             $upd_data->update();
        
             unset($upd_data); 
                          
             $flash_result = new SelectEntrys();

             $flash_result->cols          = 'opt1, opt2, opt3, opt4, opt5, opt6, opt7, opt8, opt9, opt10, opt1_votes, opt2_votes, opt3_votes, opt4_votes, opt5_votes, opt6_votes, opt7_votes, opt8_votes, opt9_votes, opt10_votes';
             $flash_result->table         = $tbl_flashes;
             $flash_result->condition     = " ID = '$id' ";
             $flash_result->multiSelect   = 1;
             $ay_flash_result = $flash_result->row();
             
             unset($flash_result);
             
             foreach ($ay_flash_result as $key=>$value)  $arr = $value;                                                  
                  
             $ay_flashes_voted[] = $id;
             sort($ay_flashes_voted);
                
             $mem_key3    = "ay_flashes_voted_".$l["token"]; 
             $memcache->replace($mem_key3, $ay_flashes_voted, false);         
             
             $tpl->assign("section", "category");                                                                          
             $tpl->assign("i", $arr);  
                                                              
             $html = $tpl->fetch("modules/flash/flash_result.tpl");          
             
             $objResponse->assign($flash_opt_str,"innerHTML",$html);  

        } 
            
        else if ($site == 'friends') { 
        
             //$str_restricted = explode(",", $user_data['fb_friends_restricted']);
     
             $FormValues = intval(substr($FormValues, 3));

             //settype($FormValues, "string"); 
             
             foreach($user_data['fb_friends'] as $key=>$value) {
                  if ($value["friendID"] == "$FormValues" ) {
                        if ($value["restricted"] == 1) $restri = 0;   
                        if ($value["restricted"] == 0) $restri = 1;   
                        $user_data['fb_friends'][$key]["restricted"] = $restri;
                  }            
             }
             
             $upd_data = new ModifyEntry();
             $upd_data->table     = $tbl_friends;
             $upd_data->condition = " userID = '".$user_data['ID']."' AND friendID = '$FormValues' ";
              
             $upd_data->changes   = " restricted = '$restri' ";
        
             $upd_data->update();
             
             $mem_key1    = "user_data_".$l["token"]; 
             $memcache->replace($mem_key1, $user_data, false);       
             
        }   

        else if ($site == 'favorite') { 

             $already_fav = new CheckExist();
             $already_fav->tableE = $tbl_favorites;
             $already_fav->conditionE = " userID = '".$user_data['ID']."' AND flashID = '$FormValues' ";
             $already_fav = $already_fav->exist();
             
             if ($already_fav == 0) {   
                     
                 $ins_data = new ModifyEntry();
                 $ins_data->table     = $tbl_favorites;
                 $ins_data->cols      = 'userID, flashID';
                 $ins_data->values    = " '".$user_data['ID']."', '$FormValues' ";
    
                 $ins_data->insert();
    
                 unset($ins_data);
             
             }  
             
             $p_favorited_id = 'p_favorited_'.$FormValues;             
   
             $objResponse->assign($p_favorited_id,"innerHTML","Favorite saved successfully");         
               
        }   
                                                 
        return $objResponse;
    
  }
  
  function page ( $site, $id, $total) {

     global $memcache; 
     global $tpl; 
     global $duration;
     global $_COOKIE;
     //$tpl = new Smarty;
     
     include('settings/tables.php');
     include('settings/page_settings.php');
          
     $objResponse = new xajaxResponse(); 

     if (!isset($_COOKIE["l"])) { 
         $objResponse->redirect(ROOT_DIR);
         return $objResponse;    
     }
        
     $l["token"] = substr($_COOKIE["l"], 3, -35);
     $mem_key1 = "user_data_".$l["token"];       
     $user_data = $memcache->get($mem_key1);   
     $mem_key2    = "trigger_f_".$l["token"];    
     $trigger_f   = $memcache->get($mem_key2); 
     include('modules/logon/get_userdata.php');


     if ($site == 'friendslist') { 
     
         $objResponse->includeScript("http://connect.facebook.net/en_US/all.js#xfbml=1");
               
         $page_friendslist = $id;
          
         $start_friendslist = ($per_page_friendslist * $page_friendslist) - $per_page_friendslist;
         $tpl->assign('per_page_friendslist', $per_page_friendslist);     
         $tpl->assign('start_friendslist', $start_friendslist);  
                                 
         $total_pages = ceil(count($user_data['fb_friends']) / $per_page_friendslist);
         $tpl->assign('total_pages', "$total_pages"); 

         $tpl->assign('category', "friendslist"); 
         $tpl->assign('current_page', $id); 
                                                     
         $tpl->assign("usr_data", $user_data);  
            
         $html = $tpl->fetch("modules/account/friendslist.tpl");          
         $html2 = $tpl->fetch("pagenavi_ajax.tpl"); 
         
         $objResponse->assign("friendslist","innerHTML",$html);  
         $objResponse->assign("pagenavi_friendslist","innerHTML",$html2);  
        
     }

     if ($site == 'favorites') { 
                                     
         $page_favorites = $id;
          
         $start_favorites = ($per_page_favorites * $page_favorites) - $per_page_favorites;
         $tpl->assign('per_page_favorites', $per_page_favorites);     
         $tpl->assign('start_favorites', $start_favorites);  
                                 
         $total_pages = ceil($total / $per_page_favorites);
         $tpl->assign('total_pages', "$total_pages"); 
         $tpl->assign('total', $total); 
                  
         $favorites = new SelectEntrys();

         $favorites->cols          = "$tbl_favorites.flashID, $tbl_flashes.question";
         $favorites->table         = $tbl_favorites;
         $favorites->join          = " LEFT JOIN $tbl_flashes ON ($tbl_flashes.ID = $tbl_favorites.flashID) ";
     
         $favorites->condition     = " $tbl_favorites.userID = '".$user_data['ID']."' ";
         $favorites->order         = "$tbl_favorites.time DESC";
         $favorites->limit         = "$start_favorites, $per_page_favorites";
         $favorites->multiSelect   = 1;
         $ay_favorites = $favorites->row();
        
         $tpl->assign('ay_favorites', $ay_favorites); 

         $tpl->assign('category', "favorites"); 
         $tpl->assign('current_page', $id); 
  
         $html = $tpl->fetch("modules/account/favorites_list.tpl");          
         $html2 = $tpl->fetch("pagenavi_ajax.tpl"); 
         
         $objResponse->assign("p_favorites","innerHTML",$html);  
         $objResponse->assign("pagenavi_favorites","innerHTML",$html2);  
        
     }
                       
     return $objResponse;
     
            
  }
 
  function rate ( $site, $id, $rating ) {
           
         global $memcache;
         global $duration;
         global $_COOKIE;
         global $tpl;
                 
         include('settings/tables.php');
         $objResponse = new xajaxResponse(); 

         if (!isset($_COOKIE["l"])) { 
             $objResponse->redirect(ROOT_DIR);
             return $objResponse;    
         }
                       
         $l["token"] = substr($_COOKIE["l"], 3, -35); 
         $mem_key1 = "user_data_".$l["token"];       
         $user_data = $memcache->get($mem_key1);      
         $mem_key2 = "trigger_f_".$l["token"];    
         $trigger_f   = $memcache->get($mem_key2); 

         include('modules/logon/get_userdata.php');
         
         $mem_key3 = "ay_flashes_voted_".$l["token"];   
         $mem_key4 = "ay_flashes_rated_".$l["token"];   
         $ay_flashes_voted = $memcache->get($mem_key3);                
         $ay_flashes_rated = $memcache->get($mem_key4);               
         $ay_flash_cats    = $memcache->get('ay_flash_cats');      
                                           
         include('modules/flash/flashfeed_add.php');
                                            
         if ($site == 'flash') {   
         
             $likes_str = 'p_likes_'.$id;             
             $dislikes_str = 'p_dislikes_'.$id;  
             $rate_str = 'p_rate_'.$id;                                                         
             
                                           
             $upd_data = new ModifyEntry();
             $upd_data->table     = $tbl_flashes;
             $upd_data->condition = " ID = '$id' ";
              
             if ($rating == "like") $upd_data->changes   = " likes = likes+1, rating = rating+1 ";
             if ($rating == "dislike") $upd_data->changes   = " dislikes = dislikes+1, rating = rating-1 ";
             
             $upd_data->update();
        
             unset($upd_data); 
             

             $ins_data = new ModifyEntry();
             $ins_data->table     = $tbl_flash_ratings;
             $ins_data->cols      = 'flashID, userID, rating';
             $ins_data->values    = " '$id', '".$user_data['ID']."', '$rating' ";

             $ins_data->insert();

             unset($ins_data); 
             
                                                              
             $flash_result = new SelectEntrys();

             $flash_result->cols          = 'likes, dislikes';
             $flash_result->table         = $tbl_flashes;
             $flash_result->condition     = " ID = '$id' ";
             $flash_result->multiSelect   = 1;
             $ay_flash_result = $flash_result->row();
             
             unset($flash_result);

             $ay_flashes_rated[] = $id;
             sort($ay_flashes_rated);
              
             $mem_key4 = "ay_flashes_rated_".$l["token"];             
             $memcache->replace($mem_key4, $ay_flashes_rated, false);         
                                                         
             $objResponse->assign($rate_str,"style.display",'none');                                   
             $objResponse->assign($likes_str,"innerHTML",$ay_flash_result[0]['likes']);  
             $objResponse->assign($dislikes_str,"innerHTML",$ay_flash_result[0]['dislikes']);  
             
         }      
                                         
         return $objResponse;
                             
  }

  $xajax->processRequest();    
  $xajax->printJavascript();

  unset($xajax);
  unset($objResponse);
  

  