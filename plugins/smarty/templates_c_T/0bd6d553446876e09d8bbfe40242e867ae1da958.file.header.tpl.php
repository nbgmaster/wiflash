<?php /* Smarty version Smarty-3.0.8, created on 2012-09-22 18:42:21
         compiled from ".\templates_T\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4049505dea6d21c802-96155632%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0bd6d553446876e09d8bbfe40242e867ae1da958' => 
    array (
      0 => '.\\templates_T\\header.tpl',
      1 => 1314278160,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4049505dea6d21c802-96155632',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-EN" lang="en-EN">

<head>

    <title>wiflash.com</title>
    
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <noscript><meta http-equiv="refresh" content="0;URL=noscript.htm"></noscript>
   
    <meta name="title" content="wiflash.com">
    <meta name="description" content="<?php echo strip_tags($_smarty_tpl->getVariable('wiflash_description')->value);?>
">
  
    <link rel="image_src" type="image/jpeg" href="http://www.wiflash.com/logo_share.jpg" />
    
    <meta property="fb:app_id" content="193065620755770">
    <meta property="og:url" content="http://www.wiflash.com"> 
    <meta property="og:title" content="wiflash.com">
    <meta property="og:description" content="<?php echo strip_tags($_smarty_tpl->getVariable('wiflash_description')->value);?>
">
    <meta property="og:image" content="http://www.wiflash.com/logo_share.jpg">
    <meta property="og:site_name" content="wiflash.com">
      
    <meta name="author" content="Stefan Richter" />
    <meta name="copyright" content="(C) 2011 Stefan Richter" />
    <meta name="publisher" content="Stefan Richter - www.richter-stefan.info" />

    <meta http-equiv="pragma" content="no-cache" /> 
    <meta http-equiv="expires" content="31536000" /> 
      
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('root_dir')->value;?>
media/css/reset.css" media="screen" />        
  	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('root_dir')->value;?>
media/css/form<?php echo $_smarty_tpl->getVariable('tpl_css')->value;?>
.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('root_dir')->value;?>
media/css/default<?php echo $_smarty_tpl->getVariable('tpl_css')->value;?>
.css" media="screen" />      
  	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('root_dir')->value;?>
media/css/jquery-sticklr.css" media="screen,projection" />
  	<link rel="shortcut icon" href="<?php echo $_smarty_tpl->getVariable('dir_img')->value;?>
icons/favicon.ico" type="image/x-icon">
    	
    <noscript><meta http-equiv="refresh" content="0;URL=noscript.htm"></noscript>  
          
    <script language="JavaScript" src="<?php echo $_smarty_tpl->getVariable('root_dir')->value;?>
media/js/change_settings.js" type="text/JavaScript"></script>
    <script language="JavaScript" src="<?php echo $_smarty_tpl->getVariable('root_dir')->value;?>
media/js/jquery.js" type="text/JavaScript"></script>
    <script language="JavaScript" src="<?php echo $_smarty_tpl->getVariable('root_dir')->value;?>
media/js/popup.js" type="text/JavaScript"></script>
    <script language="JavaScript" src="<?php echo $_smarty_tpl->getVariable('root_dir')->value;?>
media/js/jquery-sticklr.js" type="text/JavaScript"></script>
    <script language="JavaScript" src="<?php echo $_smarty_tpl->getVariable('root_dir')->value;?>
media/js/toggle.js" type="text/JavaScript"></script>    
    <script language='javascript'>var root_dir = '<?php echo $_smarty_tpl->getVariable('root_dir')->value;?>
';</script>    
    
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

        <?php $_template = new Smarty_Internal_Template("sticklr.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    
        <div class="header" align="center">
        
            <div class="layout_width">
        
                  <div class="logo" onclick="location.href='<?php echo $_smarty_tpl->getVariable('root_dir')->value;?>
'" title="<?php echo $_smarty_tpl->getVariable('href_title_home')->value;?>
"></div>
                      
                  <div class="login">     
                        <?php if (isset($_smarty_tpl->getVariable('usr_data',null,true,false)->value['UserEmail'])){?><?php $_template = new Smarty_Internal_Template("logout.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?><?php }else{ ?><?php $_template = new Smarty_Internal_Template("login.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?><?php }?>
                  </div>
                  <div class="clear"></div>
        
            </div>
            
        </div>
    
        <div class="borderline"></div>
           
        <div id="main" align="center"> 
        <?php $_template = new Smarty_Internal_Template("set_design.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>          
        Tino Template        
         
            