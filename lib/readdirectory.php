<?php

  /* Read directory */

     class readdirectory  {

          public $directory, $dir_target, $pictures, $width, $height_max, $results;

          private $file, $picture;

          private $subfolders = Array();

          /* Save all files found in the particular directory in an array or delete them all */

             function listfolder($action)  {

                 if ( $pointer = opendir( $this->directory ) )  { 

                      while ( $this->file = readdir( $pointer ) )  { 

                              if ( $this->file != "." && $this->file != ".." && $this->file != "Thumbs.db" && $this->file != "images" && $this->file != "thumbs" )  {

                                   if ( $action == "return" )  { 

                                        $files[] = $this->file;

                                   }
 
                                   else  {

                                        $this->file = $this->directory.$this->file;
 
                                        unlink($this->file);   

                                   }

                              }
      
                      }

                 }

                 closedir($pointer);

                 if ($action != 'clear' ) return($files);
    
            }  

         /*********************************************/


         /* Create resized pictures */

            function createpicture( $action )  {           

                foreach ( $this->pictures as $this->picture )  {

                          $imgsize = getimagesize($this->directory.$this->picture); 

                          $org_width  = $imgsize[0];
                          $org_height = $imgsize[1];

                          $new_width  = $this->width;

                          // if ( $org_width > $new_width || $org_height > $this->height_max || $action == 'thumb' )  {

                               $new_height = ( $org_height / $org_width ) * $new_width;

                               $imgfile = substr($this->picture, strlen($this->picture)-3); 

                               if ( preg_match ('/".$imgfile."/i', 'jpg') || preg_match ('/".$imgfile."/i', 'jpeg') )  {

                                    $org_picture  = imagecreatefromjpeg($this->directory.$this->picture);

                               }

                               else if ( preg_match ('/".$imgfile."/i', 'png') )  { 
  
                                    $org_picture  = imagecreatefrompng($this->directory.$this->picture);

                               }

                               else if ( preg_match ('/".$imgfile."/i', 'gif') )  { 
  
                                    $org_picture  = imagecreatefromgif($this->directory.$this->picture);

                               }

                               if ( $org_width < $new_width )      $new_width  = $org_width;

                               if ( $org_height < $new_height )    $new_height = $org_height;


                               if ( $new_height > $this->height_max )  {

                                    $new_height = $this->height_max;

                                    $new_width = ( $new_height / $org_height ) * $org_width;

                               }

                               if ( !preg_match ($imgfile/i, 'gif') )  {

                                    $newpicture = ImageCreateTrueColor($new_width, $new_height);

                               }

                               else if ( preg_match ($imgfile/i, 'gif') )  { 

                                    $newpicture = imagecreate($new_width, $new_height);

                               }

                               ImageCopyresampled($newpicture, $org_picture, 0, 0, 0, 0, $new_width, $new_height, $org_width, $org_height);

                               if ( preg_match ('/".$imgfile."/i', 'jpg') || preg_match ('/".$imgfile."/i', 'jpeg') )  {

                                    ImageJPEG($newpicture, $this->dir_target.$this->picture);

                               }

                               else  if ( preg_match ('/".$imgfile."/i', 'png') )  { 

                                    ImagePNG($newpicture, $this->dir_target.$this->picture);

                               }

                               else  if ( preg_match ('/".$imgfile."/i', 'gif') )  { 

                                    ImageGIF($newpicture, $this->dir_target.$this->picture);

                               }

                       //   }

                }

            }   

         /*********************************************/


         /* Proof files on allowed format */

            function checkformat($action)  {

                foreach ( $this->results as $subfolder )  {

                          $this->directory = "gallery/$subfolder/";
                          $files = $this->listfolder('return'); 

                          if ( $files )  {

                               foreach ( $files as $file )  {

                                         if ( $file != 'thumbs' )  {

                                              $imgfile = substr($file, strlen($file)-3); 

                                              if ( preg_match ('/".$imgfile."/i', 'jpg') || preg_match ('/".$imgfile."/i', 'jpeg') || preg_match ('/".$imgfile."/i', 'png') || preg_match ('/".$imgfile."/i', 'gif')  )  {

                                                   $imgfiles[] = $imgfile;

                                              }
                         
                                              else  {

                                                   $imgfiles = Array(); 

                                                   break;
 
                                              }

                                         }

                                }

                          }

                          $dir = "gallery/$subfolder/thumbs/";

                          if ( !is_dir($dir) && count($imgfiles) > 0 && $action || count($imgfiles) > 0 && !$action )

                               $this->subfolders[] = $subfolder; 

                  }

                  return $this->subfolders;

            }


         /*********************************************/

     }  

  /******************************************/