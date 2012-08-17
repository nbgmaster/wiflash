<?php

  /* Convert Object to Array */
  
      function objectToArray($object) 
    { 
      if(!is_object( $object ) && !is_array( $object )) 
      { 
          return $object; 
      } 
      if(is_object($object) ) 
      { 
          $object = get_object_vars( $object ); 
      } 
      return array_map('objectToArray', $object ); 
    }  

 /******************************************/
  

  /* Transform: String --> File 
  
      function createFromString($str, $overwrite = true, $fname_path = null) {

                $fname_path = $fname_path; 
       
                $handle = fopen($fname_path, 'w+');

                if(!fwrite($handle, $str)) return false;
                fclose($handle);

                return true;
                
      }      

  /******************************************/
  
  
  /* Generate RSS Feed for blog 

     function generate_rss_feed($totalentries, $rss_data, $rss_module, $lang, $rss_intern_totalentries) {
     
         global $tpl;
         
             $getday = array(0=>"Sonntag",1=>"Montag",2=>"Dienstag",3=>"Mittwoch",4=>"Donnerstag",5=>"Freitag",6=>"Samstag",7=>"Sonntag");                          
             $getmonth = array(1=>"Januar",2=>"Februar",3=>"M&auml;rz",4=>"April",5=>"Mai",6=>"Juni",7=>"Juli",8=>"August",9=>"September",10=>"Oktober",11=>"November",12=>"Dezember");
         
             $c_day = date("w",time());
             $c_month = date("n",time());
             
             $day = $getday[$c_day];
             $month = $getmonth[$c_month];
                                       
             $day_num = date("d",time());
             $c_time = date("Y H:i:s +0200",time());

             if ($lang == 'DE') $feed_date = $day.', '.$day_num.'. '.$month.' '.$c_time; 
             if ($lang == 'EN') $feed_date = date("D, j F Y H:i:s +0200", time());

             $tpl->assign('feed_date', $feed_date);
             $tpl->assign('data', $rss_data);
             
             $tpl->assign('feed_blog_description_DE', utf8_encode("Die ".$rss_intern_totalentries." neuesten Blognachrichten"));
             $tpl->assign('feed_blog_description_DE_h', utf8_encode("Die ".$rss_intern_totalentries." neuesten Blognachrichten"));
             $tpl->assign('feed_blog_description_EN', utf8_encode("The ".$rss_intern_totalentries." newest blog messages"));
             $tpl->assign('feed_gallery_description_DE', utf8_encode("Die ".$rss_intern_totalentries." neuesten Galerien"));
             $tpl->assign('feed_gallery_description_EN', utf8_encode("The ".$rss_intern_totalentries." newest galleries"));
 
             $file_name = $rss_module.'_'.$lang;

             $content = $tpl->fetch("../tpl/rssfeeds/$file_name.tpl");

             createFromString($content, true, "media/rss/$file_name.xml");

             return true;

     }

  /******************************************/
  

  /* Get Page for breadcrumb :: Blog or Gallery edit modus 
  
  function get_page($tbl, $id, $perpage) {

      require_once('lib/select.php');
      require_once('lib/exist.php');

      $GetPage = new SelectEntrys();
      $GetPage->cols        = 'date';
      $GetPage->table       = $tbl;
      $GetPage->condition   = " id = '$id' ";
      
      $Tdate = $GetPage->row();

      unset($GetPage);
      
      $GetPage = new CheckExist();
      $GetPage->tableE      = $tbl;
      if ($tbl == 'blog')    $GetPage->conditionE  = "date > '$Tdate' AND deleted = '0' ";
      if ($tbl == 'gallery') $GetPage->conditionE  = "date > '$Tdate' ";
        
      $newer_entries = $GetPage->exist();
  
      unset($GetPage); 
         
      $page_B = $newer_entries / $perpage;
  
      $page_B = floor($page_B);
      
      $page_B++;
      
      return $page_B; 
          
  }

  /******************************************/
  
  
  /* Format twitter posting time 
  
  function makeDifferenz($first, $second){
      
      if($first > $second)
          $td['dif'][0] = $first - $second;
      else
          $td['dif'][0] = $second - $first;
      
      $td['sec'][0] = $td['dif'][0] % 60; // 67 = 7
  
      $td['min'][0] = (($td['dif'][0] - $td['sec'][0]) / 60) % 60; 
      
      $td['std'][0] = (((($td['dif'][0] - $td['sec'][0]) /60)- 
      $td['min'][0]) / 60) % 24;
      
      $td['day'][0] = floor( ((((($td['dif'][0] - $td['sec'][0]) /60)- 
      $td['min'][0]) / 60) / 24) );
      
      $td = makeString($td);
      
      return $td;
      
  }
  
  function makeString($td){
  
      if ( !isset($_COOKIE["lang"]) )  {
      
           switch ( substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) ) {
                    case 'de': $lang_browser = "DE"; break;
                    case 'en': $lang_browser = "EN"; break; 
                    default:   $lang_browser = "DE";
           }
           
      }
      
      if ( isset($_COOKIE["lang"]) == '2' || $lang_browser == 'DE' )  {
      
            $seconds01 = "Sekunde"; $seconds02 = "Sekunden";
            $minutes01 = "Minute";  $minutes02 = "Minuten";
            $hours01   = "Stunde";  $hours02   = "Stunden";
            $days01    = "Tag";     $days02    = "Tagen";
        
      }
              
      else if ( isset($_COOKIE["lang"]) == '3' || $lang_browser == 'EN' )  {
      
            $seconds01 = "second";  $seconds02 = "seconds";
            $minutes01 = "minute";  $minutes02 = "minutes";
            $hours01   = "hour";    $hours02   = "hours";
            $days01    = "day";     $days02    = "days";
               
      }

      if ($td['sec'][0] == 1)
          $td['sec'][1] = $seconds01;
      else 
          $td['sec'][1] = $seconds02;
      
      if ($td['min'][0] == 1)
          $td['min'][1] = $minutes01;
      else 
          $td['min'][1] = $minutes02;
          
      if ($td['std'][0] == 1)
          $td['std'][1] = $hours01;
      else 
          $td['std'][1] = $hours02;
          
      if ($td['day'][0] == 1)
          $td['day'][1] = $days01;
      else 
          $td['day'][1] = $days02;
      
      return $td;
      
  }

  /******************************************/
  
  
  /* Get gallery title 
  
  function get_gallery_title($tbl_gallery, $gid) {

     require_once('lib/select.php');
                    
     $gal_title = new SelectEntrys();

     $gal_title->cols        = ' title, title_EN ';
     $gal_title->table       = $tbl_gallery;
     $gal_title->condition   = " id = '$gid' ";
     $gal_title->multiSelect = 1;

     $gal_titles = $gal_title->row();

     unset($gal_title);
     
     return $gal_titles;
     
  }

  /******************************************/
  
  
  /* Update visiter stats 

  function update_visiter_stats($tbl_visiter, $tbl_settings, $timestamp, $del_old_visiters, $time_new_visiter) { 
  
      require_once('lib/select.php');
      require_once('lib/modify.php');
      require_once('lib/exist.php');
              
      $delimiter = $timestamp - ($del_old_visiters*60);  // delete entries older than 2 weeks 60*60*24*14
                   
      $visiter            = new ModifyEntry();
      $visiter->table     = $tbl_visiter;
      $visiter->condition = " UNIX_TIMESTAMP(date) < $delimiter ";

      $visiter->delete();
      
      unset($visiter);

      $delimiter = $timestamp - ($time_new_visiter*60);
                    
      $visiter = new CheckExist();
      $visiter->tableE     = $tbl_visiter;                       
      $visiter->conditionE = " IP = '".$_SERVER['REMOTE_ADDR']."' AND UNIX_TIMESTAMP(date) >= $delimiter ";

      $visiter_exist = $visiter->exist();

      unset($visiter);
  
      if ($visiter_exist == 0)  {
      
          $date = date("Y-m-d H:i:s",$timestamp);

          $visiter         = new ModifyEntry();       
          $visiter->table  = $tbl_visiter;
          $visiter->cols   = 'IP, date, browser, referer';
          $visiter->values = " '".$_SERVER['REMOTE_ADDR']."', '$date', '".$_SERVER['HTTP_USER_AGENT']."',  '".$_SERVER['HTTP_REFERER']."' ";
 
          $visiter->insert();
          
          $visiter->table     = $tbl_settings;
          $visiter->changes   = " visiters_total = visiters_total+1 ";
          $visiter->condition = " id = '1' ";

          $visiter->update(); 

          unset($visiter);
            
      }
          
      return false; 
  
  }

  /* Convert date to make multi-language feature possible 
    
  function convert_date($date, $lang) { 
 
         global $getmonth;
         
         if ($lang == 'DE') $getmonth = array(1=>"Januar",2=>"Februar",3=>"M&auml;rz",4=>"April",5=>"Mai",6=>"Juni",7=>"Juli",8=>"August",9=>"September",10=>"Oktober",11=>"November",12=>"Dezember");                         
         if ($lang == 'EN') $getmonth = array(1=>"January",2=>"February",3=>"March",4=>"April",5=>"May",6=>"June",7=>"July",8=>"August",9=>"September",10=>"October",11=>"November",12=>"December");
 
         $day = substr($date, 0,2);  
         $month_number = substr($date, 4,2);
         if ($month_number < 10) $month_number = substr($month_number,1,1);
         $year = substr($date, 7,4);

         $month_name = $getmonth[$month_number];

         $date = $day.'. '.$month_name.' '.$year;
         
         //GMT fix 
         $gmt_time = date("P",time());
         $gmt_time = substr($gmt_time,2,1);
         //$date .= ' (GMT+'.$gmt_time.')';
         
         return $date; 
  
  }
  
  function convert_date_comments($date) {   

           global $getmonth;   
           global $lang_active;            

           $year = substr($date,0,4);
           $month = substr($date,5,2);
           $day = substr($date,8,2);
           $hours = substr($date,11,2);
           $minutes = substr($date,14,2);
           if ($month < 10) $month = substr($month,1,1);
           $month_name = $getmonth[$month];

           if ($lang_active == 'EN') {
           
               if      ($hours == '00') { $hours = 12; $p_time = 'AM'; }
               else if ($hours == '12')   $p_time = 'PM';
               else if ($hours > 12)    { $hours = $hours - 12;  $p_time = 'PM'; }

            }

            $date = $day.'. '.$month_name.' '.$year.' '.$hours.':'.$minutes;
            
            if ($lang_active == 'EN') $date .= ' '.$p_time;  
                
            //GMT fix 
            $gmt_time = date("P",time());
            $gmt_time = substr($gmt_time,2,1);
            $date .= ' (GMT+'.$gmt_time.')';
         
            return $date;

  }
  
  /*************************************************/