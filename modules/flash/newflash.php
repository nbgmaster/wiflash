<?php 

  if ( isset( $_POST['submit_flash'] ) ) {

       if (!isset($_POST['opt']['3'])) $_POST['opt']['3'] = "";
       if (!isset($_POST['opt']['4'])) $_POST['opt']['4'] = "";
       if (!isset($_POST['opt']['5'])) $_POST['opt']['5'] = "";
       if (!isset($_POST['opt']['6'])) $_POST['opt']['6'] = "";
       if (!isset($_POST['opt']['7'])) $_POST['opt']['7'] = "";
       if (!isset($_POST['opt']['8'])) $_POST['opt']['8'] = "";
       if (!isset($_POST['opt']['9'])) $_POST['opt']['9'] = "";
       if (!isset($_POST['opt']['10'])) $_POST['opt']['10'] = "";
       
       $mysqldate = date( 'Y-m-d H:i:s', time() );
                                                         
       $flash = new ModifyEntry();
       $flash->table  = $tbl_flashes;
       $flash->cols   = 'userID, CreateDate, section, category, question, type, opt1, opt2, opt3, opt4, opt5, opt6, opt7, opt8, opt9, opt10';
       $flash->values = " '".$user_data['ID']."', '".$mysqldate."', '".$_POST['section']."', '".$_POST['category']."', '".$_POST['question']."', '".$_POST['s_type']."', '".$_POST['opt']['1']."', '".$_POST['opt']['2']."', '".$_POST['opt']['3']."', '".$_POST['opt']['4']."', '".$_POST['opt']['5']."', '".$_POST['opt']['6']."', '".$_POST['opt']['7']."', '".$_POST['opt']['8']."', '".$_POST['opt']['9']."', '".$_POST['opt']['10']."' ";

       $flash->insert();
        
       unset($flash);
       
       header ("Location:".ROOT_DIR."flash/newflash.html");
       
  }