<?php

  /* CLASS :: Page Navigation */

  /**** Concept --> Shift the page numbers into an array; maximum of 5 entrys; *****/

     require_once('exist.php');

     class pagenavi extends CheckExist  {

        private $Ay_pages = Array();

        private $showSides = '5';

        private $sides, $Ay_Pages2;

        public $totalrows, $showperpage, $link, $title;

        /* Main method */

           function rowpages($page)  { 

               $maxpages_int   = (int) ($this->totalrows / $this->showperpage);
  
               $maxpages_float = $this->totalrows / $this->showperpage; 
          
               if ( $maxpages_float > $maxpages_int )  {
                
                    $this->sides = (int)(($this->totalrows / $this->showperpage)+1);

               }
 
               else  {  

                   $this->sides = (int)(($this->totalrows / $this->showperpage));               

               } 

               array_push($this->Ay_pages, $page);

               $this->AddPage($page, 'up');
               $this->AddPage($page, 'down');

               $pageUP   = $page + 2;
               $pageDOWN = $page - 2;

               if ( count($this->Ay_pages) < $this->showSides && $this->sides > count($this->Ay_pages) )  {

                    $this->AddPage($pageUP, 'up');

               }

               if ( count($this->Ay_pages) < $this->showSides && $this->sides > count($this->Ay_pages) )  {

                    $this->AddPage($pageDOWN, 'down');

               }

               sort( $this->Ay_pages );

               $this->showpages($page, $pageUP);
               
               return $this->Ay_Pages2;
               
           }

        /******************************************/


        /* Add page to array */

           function AddPage($page, $direction)  {
 
               for ( $i = 1; $i <= 2; $i++ )  {

                     if ( $direction == "up" )  {

                          $page = $page + 1; 

                     }

                     else  {

                          $page = $page - 1;

                     }

                     if ( $direction == "up" && $page <= $this->sides && count($this->Ay_pages) < $this->showSides || $direction == "down" && $page >= 1 && count($this->Ay_pages) < $this->showSides )  { 

                          array_push($this->Ay_pages, $page);
 
                     }

               }

           }

        /******************************************/


        /* Add first and last page to array */

           function AddEndings($lastpage)  {

               $highest = $this->sides - $lastpage; 
               $lowest  = $lastpage - $this->showSides;

               if ($lowest > 0)  {

                   $link2 = $this->link."1/";

                   $this->Ay_Pages2[] = array('page' => '&laquo;','style' => 'page', 'link' => $link2);
                   
               }

               sort( $this->Ay_Pages2 );

               if ($highest > 0)  {

                   $link2 = $this->link.$this->sides."/";

                   $this->Ay_Pages2[] = array('page' => '&raquo;','style' => 'page', 'link' => $link2);
                   
               }

           }

        /******************************************/


        /* Return Array to template output */

           function showpages($page, $pageUP)  {

               for ( $x=0 ; $x < count($this->Ay_pages); $x++ )  {

                     $style = 'page';
 
                     $link2 = $this->link.$this->Ay_pages[$x]."/";

                     if ( $this->Ay_pages[$x] == $page )  {

                          $style = "pageCurrent"; 

                     }

                     $this->Ay_Pages2[$x] = array('page' => $this->Ay_pages[$x],'style' => $style, 'link' => $link2);

                     $lastpage = $this->Ay_pages[$x];

               } 

               $this->AddEndings($lastpage);

               //include("./settings/template.php");
               //if ($lastpage > 1)  $tpl->assign('array', $this->Ay_Pages2);
               //if ( $this->title ) $tpl->assign('titleG', $this->title);
               //$tpl->assign('pagesT', $lastpage);
                 
           }

        /******************************************/

     }

  /*******************END OF CLASS ***********************/


