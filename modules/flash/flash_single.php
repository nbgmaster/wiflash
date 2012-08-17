<?php
      
           $id_existing = new CheckExist();
           $id_existing->tableE = $tbl_flashes;
           $id_existing->conditionE = " ID = '".$_GET['flashID']."' ";
           $id_existing = $id_existing->exist();
           
           if ($id_existing) {
           
               $flash_single = new SelectEntrys();  
               $flash_single->cols        = 'ID, section, category, type, question, likes, dislikes, opt1, opt2, opt3, opt4, opt5, opt6, opt7, opt8, opt9, opt10, opt1_votes, opt2_votes, opt3_votes, opt4_votes, opt5_votes, opt6_votes, opt7_votes, opt8_votes, opt9_votes, opt10_votes';  
               $flash_single->table       = $tbl_flashes;
               $flash_single->condition   = " ID = '".$_GET['flashID']."' ";
               $flash_single->multiSelect = '1';
               
               $ay_flash_single = $flash_single->row();
 
               $tpl->assign('ay_flash_single', $ay_flash_single);       

              
               $already_voted = new SelectEntrys();
               $already_voted->table = $tbl_flash_results;
               $already_voted->cols = "opt";
               $already_voted->condition = " flashID = '".$_GET['flashID']."' AND userID = '".$user_data['ID']."' ";
               $already_voted = $already_voted->row();
               
               if ($already_voted !== false) $tpl->assign('already_voted', $already_voted[0]);
               
                          
               if ($user_data['fb_ID'] != 0) { 
               
                   foreach ($user_data['fb_friends'] as $key=>$value)  { 
                       foreach ($value as $key2=>$value2) if ($key2 == 'fb_ID') $ay_friends[] = $value2;           
                   }
                          
                   $str_friends = implode(", ", $ay_friends);
                        
               /* remove those that restrict me ... if I deselect s.o. --> save my ID in his userdata  */ 

                   $friends_vote = new SelectEntrys();
                   
                   $friends_vote->cols          = " $tbl_users.fb_ID, $tbl_flash_results.opt ";
                   $friends_vote->table         = "$tbl_users";
                   $friends_vote->join          = " LEFT JOIN $tbl_flash_results ON ($tbl_users.ID = $tbl_flash_results.userID) ";
                   $friends_vote->condition     = " $tbl_users.fb_ID IN ($str_friends) AND $tbl_flash_results.flashID = '".$_GET['flashID']."' ";
                   $friends_vote->order         = "$tbl_flash_results.opt";
                   $friends_vote->multiSelect   = '1';
                    
                   $ay_friends_vote = $friends_vote->row();
                   
                   if ($ay_friends_vote !== false) foreach ($ay_friends_vote as $key => $value) $arr_friends_vote[$value['opt']][] = $value['fb_ID'];
                   else $arr_friends_vote = Array();
                   
                   $tpl->assign('ay_friends_vote', $arr_friends_vote);  
                  
               } 

           }
           
           $tpl->assign('id_existing', $id_existing);           
           $tpl->assign('section', 'fid');
   