<?php

  /* Download Datafile */

     function download($id, $directory, $table)  {

         /* Check Fileformat for correct header */

            $fileformat = substr( $id, strlen($id)-3 );
  
            if ( $fileformat == "jpg" ) header("Content-Type: image/jpeg");

            if ( $fileformat == "gif" ) header("Content-Type: image/gif");

            if ( $fileformat == "png" ) header("Content-Type: image/png");

            if ( $fileformat == "txt" ) header("Content-Type: text/plain");
 
            if ( $fileformat == "pdf" ) header("Content-Type: application/octetstream");

            if ( $fileformat == "zip" ) header("Content-Type: application/x-compressed");

            if ( $fileformat == "rar" ) header("Content-Type: application/octet-stream");

            if ( $fileformat == "doc" ) header("Content-Type: application/msword");

            if ( $fileformat == "xls" ) header("Content-Type: application/vnd.ms-excel");
 
            if ( $fileformat == "ppt" ) header("Content-Type: application/vnd.ms-powerpoint");

            if ( $fileformat == "ocx" ) header("Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
  
            if ( $fileformat == "lsx" ) header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");

            if ( $fileformat == "ptx" ) header("Content-Type: application/vnd.openxmlformats-officedocument.presentationml.presentation");

         /******************************************/

         if ( $table == 'blog' )  {

                 /* Optional :: Give back original Filename */

                    $qy = mysql_query("SELECT filename1, filename2, filename3, file1, file2, file3 from $table WHERE file1 = '$id' or file2 = '$id' or file3 = '$id'") or die (mysql_error());;

                    while ( $row  = mysql_fetch_assoc($qy) )  {

                            if ( $row[file1] == $id )  $name = $row[filename1];
                            if ( $row[file2] == $id )  $name = $row[filename2];
                            if ( $row[file3] == $id )  $name = $row[filename3];

                    }

                 /******************************************/

         }

         else  {

              $name = $id;
              $directory = "downloads";

         }

 
         /* OUTPUT :: Read "r" */

            header("Content-Disposition: attachment; filename=\"$name\"");

            $filename = "$directory/$id";

            $fp = fopen($filename, "r");

            if ( $fp )  {

                 readfile($filename);

                 //  $buffer = fread ($fp, filesize ($filename));

                 //  echo $buffer;

                 fclose($fp);

            }

            exit();

         /******************************************/

     }

  /***********************************/
