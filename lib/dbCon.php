<?php

  /* Establish :: Class -> Connect to mySQL Database */

     class EstablishDBConnection  {
 
          public $dbserver;
          public $dbuser;
          public $dbpass;
          public $dbname;
  
          function connectDB() {

              $db = mysql_connect($this->dbserver, $this->dbuser, $this->dbpass, $this->dbname);      
              mysql_query("SET NAMES utf8", $db);
              mysql_select_db($this->dbname, $db) OR die(mysql_error());

          }

     }

  /******************************************/