<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-EN" lang="en-EN">

<head>

    <title>wiflash.com</title>
    
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <noscript><meta http-equiv="refresh" content="0;URL=noscript.htm"></noscript>
   
    <meta name="title" content="wiflash.com">
    <meta name="description" content="{$wiflash_description|strip_tags:""}">
  
    <link rel="image_src" type="image/jpeg" href="http://www.wiflash.com/logo_share.jpg" />
    
    <meta property="fb:app_id" content="193065620755770">
    <meta property="og:url" content="http://www.wiflash.com"> 
    <meta property="og:title" content="wiflash.com">
    <meta property="og:description" content="{$wiflash_description|strip_tags:""}">
    <meta property="og:image" content="http://www.wiflash.com/logo_share.jpg">
    <meta property="og:site_name" content="wiflash.com">
      
    <meta name="author" content="Stefan Richter" />
    <meta name="copyright" content="(C) 2011 Stefan Richter" />
    <meta name="publisher" content="Stefan Richter - www.richter-stefan.info" />

    <meta http-equiv="pragma" content="no-cache" /> {* Order to proxy agents: Don't save the site on a proxy server *}
    <meta http-equiv="expires" content="31536000" /> {* Time to pass until the site HAS to be reloaded from the server, in seconds *}
      
    <link rel="stylesheet" type="text/css" href="{$root_dir}media/css/reset.css" media="screen" />        
  	<link rel="stylesheet" type="text/css" href="{$root_dir}media/css/form.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="{$root_dir}media/css/default.css" media="screen" />      
  	<link rel="stylesheet" type="text/css" href="{$root_dir}media/css/jquery-sticklr.css" media="screen,projection" />

    {*Cache?*}
  	<link rel="shortcut icon" href="{$dir_img}icons/favicon.ico" type="image/x-icon">
    	
    <noscript><meta http-equiv="refresh" content="0;URL=noscript.htm"></noscript>  
    
    {*move them to the bottom of the respective file*}      
    <script language="JavaScript" src="{$root_dir}media/js/change_settings.js" type="text/JavaScript"></script>
    <script language="JavaScript" src="{$root_dir}media/js/jquery.js" type="text/JavaScript"></script>
    <script language="JavaScript" src="{$root_dir}media/js/popup.js" type="text/JavaScript"></script>
    <script language="JavaScript" src="{$root_dir}media/js/jquery-sticklr.js" type="text/JavaScript"></script>
    <script language="JavaScript" src="{$root_dir}media/js/toggle.js" type="text/JavaScript"></script>    
    <script language='javascript'>var root_dir = '{$root_dir}';</script>    
    
  	<script type="text/javascript">
  	    $(document).ready(function(){
  
      			$('#sticklr').sticklr({
      				showOn		: 'hover',
      				stickTo     : 'left'
      			});
      			
  	    });
	 </script>

</head>

<body>    
    
    <div id="container_main">  

        {include file="sticklr.tpl"}
    
        <div class="header" align="center">
        
            <div class="layout_width">
        
                  <div class="logo" onclick="location.href='{$root_dir}'" title="{$href_title_home}"></div>
                      
                  <div class="login">     
                        {if isset($usr_data.UserEmail)}{include file="logout.tpl"}{else}{include file="login.tpl"}{/if}
                  </div>
                  <div class="clear"></div>
        
            </div>
            
        </div>
    
        <div class="borderline"></div>
           
        <div id="main" align="center">   
        {include file="set_design.tpl"}      
         
            