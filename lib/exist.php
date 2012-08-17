<?php

  /* Establish :: Class -> Exist */

     require_once('select.php');   

     class CheckExist extends SelectEntrys {

          public $tableE;
          public $conditionE;

          public $user;
          public $pw;
          public $ip, $lang;

          /* Are there any strikes under the following conditions? */

          function exist() {

              if ( $this->conditionE )  {

                   $this->conditionE  = 'WHERE ' . $this->conditionE;

              }

              $query = mysql_query("SELECT COUNT(*) from $this->tableE $this->conditionE LIMIT 1") or die (mysql_error());

              $rows  = mysql_fetch_row( $query );

              $result = $rows[ 0 ];  

              return $result; 

          }

          /******************************************/


          /* Create a cookie :: LOGIN */

             function cookieset($c_name) { 
                     
                 $more1 = substr(md5(rand()), 0, 3);
                 $more2 = substr(md5(rand()), 0, 3);
                 
                 if ( $this->email && $this->pw )  {

                      $usertoken = $this->getUserToken();

                      $cookie = "$more1$usertoken$more2$this->pw";

                 }
   
                 else  {

                      $cookie = '';

                 }

                 if ($this->cookie_duration == 0) setcookie($c_name, $cookie, 0, "/");           
                 else setcookie($c_name, $cookie, time()+365*3600*24, "/");
  
             }

          /******************************************/


          /* Create a cookie :: SAVE IP */

             function cookieIP($c_name, $c_content, $c_time, $c_dir) { 
             
                 setcookie($c_name, $c_content, $c_time, $c_dir);

             }

          /******************************************/


          /* Create a cookie :: LANGUAGE */

             function cookieLANG() { 

                 setcookie(lang,$this->lang,time()+365*24*3600);

             }

          /******************************************/

     }

  /******************************************/
