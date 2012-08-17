<?php

  /* Establish :: Class -> Insert, Update, Delete */

     class ModifyEntry extends readdirectory  {

          public $table;
          public $changes;
          public $condition;
          public $cols;
          public $values;
          public $directory;
          public $tempname, $filename;

          private $upload_access, $file, $attachment;

          /* Insert new entry */
               
             function insert()  {     
             
                 //echo "INSERT into $this->table ($this->cols) VALUES ($this->values)";
                 $query   = "INSERT into $this->table ($this->cols)";
                 $query  .= "VALUES ($this->values)";

                 $result  = @mysql_query($query) OR die(mysql_error());

             }

          /*************************/


          /* Update data */

             function update() { 

                 if ( !preg_match("/WHERE/i", $this->condition) && $this->condition )  {

                      $this->condition  = 'WHERE ' . $this->condition;

                 }

                 $sql = "UPDATE $this->table Set $this->changes $this->condition"; 

                 $update = mysql_query($sql) or die (mysql_error());;

             }

          /*************************/


          /* Delete entry */

             function delete() { 

                 if ( !preg_match("/WHERE/i", $this->condition) && $this->condition )  {

                      $this->condition  = 'WHERE ' . $this->condition;

                 }

                 $delete = "DELETE FROM $this->table $this->condition";     

                 mysql_query($delete) or die (mysql_error());; 

             }

          /*************************/


          /* Upload Attachment */

             function attach($bid)  {

                 $fileformat  = substr($this->filename, strlen($_GET['fileID'])-3);

                 $uniqueid = time();

                 $uniqueid .= uniqid (rand());

                 $filetypes = array("jpg", "gif", "png", "txt", "pdf", "zip", "rar", "doc", "ocx", "xls", "lsx", "ppt", "ptx");

                 if ( in_array($fileformat, $filetypes) )  {

                      if ( $fileformat == 'ocx' ) $fileformat == 'docx';
                      if ( $fileformat == 'lsx' ) $fileformat == 'xlsx';
                      if ( $fileformat == 'ptx' ) $fileformat == 'pptx';

                      $this->file          = "$this->directory/"."$uniqueid.$fileformat";
                      $this->attachment[0] = "$uniqueid.$fileformat";
                      $this->attachment[1] = "$this->filename"; 

                      $this->upload_access = "1";

                 }

                 if ( $this->upload_access == "1" )  { 

                      copy("$this->tempname", "$this->file");

                 }
              
                 return $this->attachment;

             }

          /*************************/

     }

  /******************************************/