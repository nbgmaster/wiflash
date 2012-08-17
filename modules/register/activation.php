<?php 

  //activation.html?c=bebf08f7af79422ced07be79c2f2f5c0&t=13140575844e52ed70736d2
  
  if ($logon_true != 1) {

        if (isset($_GET['e']) AND $_GET['e'] == 'success') { 
            $tpl->assign('e', "success");    
        }
        
        else if ( isset($_POST['reg_submit']) ) {
        
               $birthday = $_POST['born_y']."-".$_POST['born_m']."-".$_POST['born_d'];
      
               $f_cats = new SelectEntrys();
      
               $f_cats->cols      = 'ID';
               $f_cats->table     = $tbl_flash_categories;
               $f_cats->order     = 'ID';
               $f_cats->multiSelect = '1';
                
               $cats = $f_cats->row();
                       
               //same for sections_public if needed
               foreach($cats as $key=>$value) $arr[] = $value['ID'];
               $str_cats = implode(",", $arr);
               
               $upd_data = new ModifyEntry();
               $upd_data->table     = $tbl_users;
               $upd_data->condition = " UserToken = '".$_POST['t']."' ";
                
               $upd_data->changes   = " nationality = '".$_POST['nationality']."', residence = '".$_POST['residence']."', gender = '".$_POST['gender']."', birthday = '$birthday', flash_categories_visible = '$str_cats', activation_code = '' ";
          
               $upd_data->update();
          
               unset($upd_data);  
                        
               header ("Location:".ROOT_DIR."register/activation.html?t=".$_POST['t']."&e=success");
         	
        }
      
        else if ( isset($_GET['c']) && isset($_GET['t']) )  {
             
             $validity_check = new CheckExist();
             $validity_check->tableE = $tbl_users;
             $validity_check->conditionE = "UserToken = '".$_GET['t']."' && activation_code = '".$_GET['c']."' ";
             $validity = $validity_check->exist();
      
             $tpl->assign('validity', $validity);
             
             if ($validity == 1) {
               
                 /* Prepare country list for registration */
        
                 $countries = new SelectEntrys();
          
                 $countries->cols      = 'ID, '.$lang_active;
                 $countries->table     = $tbl_countries;
                 $countries->order     = $lang_active;
                 $countries->multiSelect = '1';
            
                 $ay_countries = $countries->row();
                 
                 unset($countries);  
        
                 $ay_born      = Array();
                 $year_born_i  = '1950';
                                         
                 while ($year_born_i <= $Fyear) {
                 
                        $ay_born[] = $year_born_i;
                        $year_born_i++;
        
                 }
                 
                 $tpl->assign('ay_countries', $ay_countries);
                 $tpl->assign('ay_born', $ay_born);        
                 $tpl->assign('t', $_GET['t']);                     
             
             }
                           
        }
      
        else $tpl->display("errorpage.tpl");
  
  }     else $tpl->display("errorpage.tpl");