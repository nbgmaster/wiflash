<?php

  /* Initialize :: Template Data */
  
        $tpl = new Smarty;
        $tpl->assign('tpl_css', "_T");
        $tpl_dir = "";
        
        if (isset($_COOKIE['tpl'])) {
        
            if ($_COOKIE['tpl'] == '2') {
            $tpl->template_dir = array('.' . DS . 'templates_T' . DS);
            $tpl->compile_dir = '.' . DS . 'plugins/smarty/templates_c_T' . DS;
            $tpl->assign('tpl_css', "_T");
            $tpl_dir = "_T";   
            }         
        }
                
     /* Miscellaneous */

        $tpl->assign('root_dir', ROOT_DIR);  
        
     /******************************************/
 
     
     /* Load :: Designs */
     
        $design[0]["id"]      = 'r';   
        $design[0]["name"]    = 'Red Dragon';   
        $design[0]["hexcode"] = '#AB0000';
    
        $design[1]["id"]      = 'o';   
        $design[1]["name"]    = 'Orange County';   
        $design[1]["hexcode"] = '#ff7f02';
          
        $design[2]["id"]      = 'b';   
        $design[2]["name"]    = 'Blue Chip';   
        $design[2]["hexcode"] = '#3b5998';   
       
        $design[3]["id"]      = 'g';   
        $design[3]["name"]    = 'Green Thunder';   
        $design[3]["hexcode"] = '#297305';  
        
        $ay_design = array(0 => $design[0], 1 => $design[1], 2 => $design[2], 3 => $design[3]);    
  
    /******************************************/
  
  
     /* Set :: Default Color */
     /* Initially defined in config.php */

        $tpl->assign('ay_design', $ay_design);
      /*  
        if ( isset($_COOKIE["tpl"]) )  {

              $tpl->assign('tpl_id', $ay_design[$_COOKIE["tpl"]]["id"]);
              $tpl->assign('tpl_name', $ay_design[$_COOKIE["tpl"]]["name"]);
              $tpl->assign('tpl_hexcode', $ay_design[$_COOKIE["tpl"]]["hexcode"]);

        }

        else  {
                  */
              $tpl->assign('tpl_id', $ay_design[2]["id"]);
              $tpl->assign('tpl_name', $ay_design[2]["name"]);
              $tpl->assign('tpl_hexcode', $ay_design[2]["hexcode"]);

        //}

     /* Folders */ 

        $tpl->assign('dir_img', ROOT_DIR."media/images".$tpl_dir."/");
        $tpl->assign('dir_img_bbcode', ROOT_DIR."media/images".$tpl_dir."/bbcode/");
        $tpl->assign('dir_img_file', ROOT_DIR."media/images".$tpl_dir."/fileicons/");
        $tpl->assign('dir_js', ROOT_DIR."js/");

     /******************************************/
