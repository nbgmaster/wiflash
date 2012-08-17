<?php

  /* Create Object :: CONNECT */

     $DBcon = new EstablishDBConnection();

     $DBcon->dbserver = 'localhost';
     $DBcon->dbuser   = 'root';
     $DBcon->dbpass   = '';
     $DBcon->dbname   = 'wiflash';

     $DBcon->connectDB();

  /******************************************/
