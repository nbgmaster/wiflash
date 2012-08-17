<?php

  /* Replace BB Code */
         
  function replaceBBcode($message, $width_images, $linebreak)  {

  global $img_enlarge_title;
  global $module;

      /* Extended stuff */

         if ( $linebreak == 1 ) 

              $message = nl2br($message);   // Line breaks

         $max_w   = $width_images."px";     // Maximum width of images to prevent design exploding
         
         $src_enlarge = ROOT_DIR."media/images/enlarge.gif"; // require absolute path

      /**************************/

      /* Preg replace codes 
      
         [P1][/P1]          --> <p></p>
         [P2][/P2]          --> <p>&nbsp;</p>
         [HR]               --> <hr>
         [URL_INTERN]       --> open in parent window
         [URL_IMG]          --> open original size of image
         [IMG2]             --> image with border
         [IMG=left]         --> float = left
         [IMG=200x100]      --> width x height
         [IMG=200x100xleft] --> width x height x float

      */

         $preg = array(
         
             '/(?<!\\\\)\[h2(?::\w+)?\](.*?)\[\/h2(?::\w+)?\]/si'               => "<h2 class=\"navimenu-title\">\\1</h2>",

             '/(?<!\\\\)\[color(?::\w+)?=(.*?)\](.*?)\[\/color(?::\w+)?\]/si'   => "<span style=\"color:\\1\">\\2</span>",
             '/(?<!\\\\)\[size(?::\w+)?=(.*?)\](.*?)\[\/size(?::\w+)?\]/si'     => "<font size=\\1\">\\2</font>",
             '/(?<!\\\\)\[font(?::\w+)?=(.*?)\](.*?)\[\/font(?::\w+)?\]/si'     => "<span style=\"font-family:\\1\">\\2</span>",
             '/(?<!\\\\)\[align(?::\w+)?=(.*?)\](.*?)\[\/align(?::\w+)?\]/si'   => "<div style=\"text-align:\\1\">\\2</div>",
             '/(?<!\\\\)\[b(?::\w+)?\](.*?)\[\/b(?::\w+)?\]/si'                 => "<span style=\"font-weight:bold\">\\1</span>",
             '/(?<!\\\\)\[p1(?::\w+)?\](.*?)\[\/p1(?::\w+)?\]/si'               => "<p></p>",
             '/(?<!\\\\)\[p2(?::\w+)?\](.*?)\[\/p2(?::\w+)?\]/si'               => "<p>&nbsp;</p>",
             '/(?<!\\\\)\[hr(?::\w+)?\](.*?)\[\/hr(?::\w+)?\]/si'               => "<center><hr class=\"hr_002\" size=\"1\"></center>",
             '/(?<!\\\\)\[i(?::\w+)?\](.*?)\[\/i(?::\w+)?\]/si'                 => "<span style=\"font-style:italic\">\\1</span>",
             '/(?<!\\\\)\[u(?::\w+)?\](.*?)\[\/u(?::\w+)?\]/si'                 => "<span style=\"text-decoration:underline\">\\1</span>",
             '/(?<!\\\\)\[center(?::\w+)?\](.*?)\[\/center(?::\w+)?\]/si'       => "<div style=\"text-align:center\">\\1</div>",
             '/(?<!\\\\)\[block(?::\w+)?\](.*?)\[\/block(?::\w+)?\]/si'         => "<div style=\"text-align:justify\">\\1</div>",

          // [code] & [php]

             '/(?<!\\\\)\[code(?::\w+)?\](.*?)\[\/code(?::\w+)?\]/si'           => "<div class=\"bb-code\">\\1</div>",
             '/(?<!\\\\)\[php(?::\w+)?\](.*?)\[\/php(?::\w+)?\]/si'             => "<div class=\"bb-php\">\\1</div>",

          // [email]

             '/(?<!\\\\)\[email(?::\w+)?\](.*?)\[\/email(?::\w+)?\]/si'         => "<a href=\"mailto:\\1\" class=\"bb-email\">\\1</a>",
             '/(?<!\\\\)\[email(?::\w+)?=(.*?)\](.*?)\[\/email(?::\w+)?\]/si'   => "<a href=\"mailto:\\1\" class=\"bb-email\">\\2</a>",

          // [url] new window

             '/(?<!\\\\)\[url(?::\w+)?\]www\.(.*?)\[\/url(?::\w+)?\]/si'        => "<a href=\"http://www.\\1\" target=\"_blank\" class=\"postedlink\">\\1</a>",
             '/(?<!\\\\)\[url(?::\w+)?\](.*?)\[\/url(?::\w+)?\]/si'             => "<a href=\"\\1\" target=\"_blank\" class=\"postedlink\">\\1</a>",
             '/(?<!\\\\)\[url(?::\w+)?=(.*?)?\](.*?)\[\/url(?::\w+)?\]/si'      => "<a href=\"\\1\" target=\"_blank\" class=\"postedlink\">\\2</a>",

          // [url_intern] parent window

             '/(?<!\\\\)\[url_intern(?::\w+)?\]www\.(.*?)\[\/url_intern(?::\w+)?\]/si'        => "<a href=\"http://www.\\1\" class=\"postedlink\">\\1</a>",
             '/(?<!\\\\)\[url_intern(?::\w+)?\](.*?)\[\/url_intern(?::\w+)?\]/si'             => "<a href=\"\\1\" class=\"postedlink\">\\1</a>",
             '/(?<!\\\\)\[url_intern(?::\w+)?=(.*?)?\](.*?)\[\/url_intern(?::\w+)?\]/si'      => "<a href=\"\\1\" class=\"postedlink\">\\2</a>",

          // [url_img]

             '/(?<!\\\\)\[url_img(?::\w+)?=(.*?)?\](.*?)\[\/url_img(?::\w+)?\]/si'      => "<a href=\"\\1\" target=\"_blank\" title=\"$img_enlarge_title\" alt=\"$img_enlarge_title\" class=\"postedlink\">\\2</a>",

          // [img] without border

             // example fix width: [IMG=200x100+float:left]
             '/(?<!\\\\)\[img(?::\w+)?\](.*?)\[\/img(?::\w+)?\]/si'             => "<img src=\"\\1\" alt=\"\\1\" class=\"bb-image\" style=\" max-width: $max_w;width: expression(this.width > 605 ? 605: true);\" border=\"0\" />",
             '/(?<!\\\\)\[img(?::\w+)?=left\](.*?)\[\/img(?::\w+)?\]/si' => "<img src=\"\\1\" alt=\"\\1\" class=\"bb-image_left\" style=\"float:left; max-width: $max_w;width: expression(this.width > 640 ? 640: true);\" border=\"0\" />",
             '/(?<!\\\\)\[img(?::\w+)?=right\](.*?)\[\/img(?::\w+)?\]/si' => "<img src=\"\\1\" alt=\"\\1\" class=\"bb-image_right\" style=\"float:right; max-width: $max_w;width: expression(this.width > 640 ? 640: true);\" border=\"0\" />",
             '/(?<!\\\\)\[img(?::\w+)?=(.*?)x(.*?)x(.*?)\](.*?)\[\/img(?::\w+)?\]/si' => "<img width=\"\\1\" height=\"\\2\" src=\"\\4\" alt=\"\\4\" class=\"bb-image_\\3\" style=\"float:\\3;\" border=\"0\" />",
             '/(?<!\\\\)\[img(?::\w+)?=(.*?)x(.*?)\](.*?)\[\/img(?::\w+)?\]/si' => "<img width=\"\\1\" height=\"\\2\" src=\"\\3\" alt=\"\\3\" class=\"bb-image\" border=\"0\" />",

          // [img2] with border

             // example fix width: [IMG2=200x100+float:left]
             '/(?<!\\\\)\[img2(?::\w+)?\](.*?)\[\/img2(?::\w+)?\]/si'             => "<img src=\"\\1\" alt=\"\\1\" class=\"bb-image\" style=\"border:1px solid #000;max-width: $max_w;width: expression(this.width > 605 ? 605: true);\" />",
             '/(?<!\\\\)\[img2(?::\w+)?=left\](.*?)\[\/img2(?::\w+)?\]/si' => "<img src=\"\\1\" alt=\"\\1\" class=\"bb-image_left\" style=\"border:1px solid #000; float:left; max-width: $max_w;width: expression(this.width > 640 ? 640: true);\" />",
             '/(?<!\\\\)\[img2(?::\w+)?=right\](.*?)\[\/img2(?::\w+)?\]/si' => "<img src=\"\\1\" alt=\"\\1\" class=\"bb-image_right\" style=\"border:1px solid #000;float:right; max-width: $max_w;width: expression(this.width > 640 ? 640: true);\" />",
             '/(?<!\\\\)\[img2(?::\w+)?=(.*?)x(.*?)x(.*?)\](.*?)\[\/img2(?::\w+)?\]/si' => "<img width=\"\\1\" height=\"\\2\" src=\"\\4\" alt=\"\\4\" class=\"bb-image_\\3\" style=\"border:1px solid #000;float:\\3;\" />",
             '/(?<!\\\\)\[img2(?::\w+)?=(.*?)x(.*?)\](.*?)\[\/img2(?::\w+)?\]/si' => "<img width=\"\\1\" height=\"\\2\" src=\"\\3\" alt=\"\\3\" class=\"bb-image\" style=\"border:1px solid #000\" />",

          // [quote]

             '/(?<!\\\\)\[quote(?::\w+)?\](.*?)\[\/quote(?::\w+)?\]/si'         => "<div class=\"bb-quote\">\\1</div>",
             '/(?<!\\\\)\[quote(?::\w+)?=(?:&quot;|"|\')?(.*?)["\']?(?:&quot;|"|\')?\](.*?)\[\/quote\]/si'   => "<div>Zitat von \\1:<div class=\"bb-quote\">\\2</div></div>",

          // [list]

             '/(?<!\\\\)(?:\s*<br\s*\/?>\s*)?\[\*(?::\w+)?\](.*?)(?=(?:\s*<br\s*\/?>\s*)?\[\*|(?:\s*<br\s*\/?>\s*)?\[\/?list)/si' => "\n<li class=\"bb-listitem\">\\1</li>",
             '/(?<!\\\\)(?:\s*<br\s*\/?>\s*)?\[\/list(:(?!u|o)\w+)?\](?:<br\s*\/?>)?/si'    => "\n</ul>",
             '/(?<!\\\\)(?:\s*<br\s*\/?>\s*)?\[\/list:u(:\w+)?\](?:<br\s*\/?>)?/si'         => "\n</ul>",
             '/(?<!\\\\)(?:\s*<br\s*\/?>\s*)?\[\/list:o(:\w+)?\](?:<br\s*\/?>)?/si'         => "\n</ol>",
             '/(?<!\\\\)(?:\s*<br\s*\/?>\s*)?\[list(:(?!u|o)\w+)?\]\s*(?:<br\s*\/?>)?/si'   => "\n<ul class=\"bb-list-unordered\">",
             '/(?<!\\\\)(?:\s*<br\s*\/?>\s*)?\[list:u(:\w+)?\]\s*(?:<br\s*\/?>)?/si'        => "\n<ul class=\"bb-list-unordered\">",
             '/(?<!\\\\)(?:\s*<br\s*\/?>\s*)?\[list:o(:\w+)?\]\s*(?:<br\s*\/?>)?/si'        => "\n<ol class=\"bb-list-ordered\">",
             '/(?<!\\\\)(?:\s*<br\s*\/?>\s*)?\[list(?::o)?(:\w+)?=1\]\s*(?:<br\s*\/?>)?/si' => "\n<ol class=\"bb-list-ordered,bb-list-ordered-d\">",
             '/(?<!\\\\)(?:\s*<br\s*\/?>\s*)?\[list(?::o)?(:\w+)?=i\]\s*(?:<br\s*\/?>)?/s'  => "\n<ol class=\"bb-list-ordered,bb-list-ordered-lr\">",
             '/(?<!\\\\)(?:\s*<br\s*\/?>\s*)?\[list(?::o)?(:\w+)?=I\]\s*(?:<br\s*\/?>)?/s'  => "\n<ol class=\"bb-list-ordered,bb-list-ordered-ur\">",
             '/(?<!\\\\)(?:\s*<br\s*\/?>\s*)?\[list(?::o)?(:\w+)?=a\]\s*(?:<br\s*\/?>)?/s'  => "\n<ol class=\"bb-list-ordered,bb-list-ordered-la\">",
             '/(?<!\\\\)(?:\s*<br\s*\/?>\s*)?\[list(?::o)?(:\w+)?=A\]\s*(?:<br\s*\/?>)?/s'  => "\n<ol class=\"bb-list-ordered,bb-list-ordered-ua\">",

          // escaped tags like \[b], \[color], \[url], ...

             '/\\\\(\[\/?\w+(?::\w+)*\])/'                                      => "\\1"

          );
             
      /**************************/

      $message = htmlspecialchars_decode($message);  // added because of copyright in footer
      
      /* Re-replace helping URL structures and preg array 

         $message = str_replace("www.","http://www.",$message);

         $message = str_replace("http://http://","http://",$message);
 
         $message = ereg_replace("[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]", "<a href=\"\\0\" class='postedlink' target='_blank'>\\0</a>", $message);    
      
      **************************/
 
      
      /* Do reg replace */

         $message = preg_replace(array_keys($preg), array_values($preg), $message);
         
         //if ($module != "blog") $message = preg_replace(array_keys($preg_img), array_values($preg_img), $message);
         //$message = preg_replace(array_keys($preg_img), array_values($preg_img), $message);
         //$message = wordwrap($message, 60, " ", 1);

      /**************************/


      /* Return replaced message content */

         return $message;

      /**************************/

  }

  /*********************************************************/
