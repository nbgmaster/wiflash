<?php /* Smarty version Smarty-3.0.8, created on 2012-09-22 18:42:21
         compiled from ".\templates_T\modules/home/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22541505dea6d44d421-57774598%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c6144a3787528dfc11aa70c69f9c5e25448a5996' => 
    array (
      0 => '.\\templates_T\\modules/home/index.tpl',
      1 => 1313971495,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22541505dea6d44d421-57774598',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

        <?php if (isset($_smarty_tpl->getVariable('usr_data',null,true,false)->value['ID'])){?><?php $_template = new Smarty_Internal_Template("modules/home/main.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
         
        <?php }else{ ?>
        
           <div class="layout_width">
        
                <div class="div-twosections"> 
                
                    <div class="title layout_margin_l">
                        <?php echo $_smarty_tpl->getVariable('wiflash_description')->value;?>

                    </div>
                    
                </div>
                
                <div class="div-twosections form_register" align="left"> 
                        
                    <div class="layout_margin_r">
                        <?php $_template = new Smarty_Internal_Template("modules/register/index.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>  
                    </div>
            
                </div>
                          
                <div class="clear"></div>
            
            </div>
           
        <?php }?>