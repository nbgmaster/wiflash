<?php /* Smarty version Smarty-3.0.8, created on 2012-09-22 18:42:21
         compiled from ".\templates_T\footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1491505dea6d4b7c13-32467474%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bf972430686472bc44390a035747d3ad81d0b785' => 
    array (
      0 => '.\\templates_T\\footer.tpl',
      1 => 1314194831,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1491505dea6d4b7c13-32467474',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

    </div>

    <p>&nbsp;</p> 

    <div id="footer"> 
    
        <div class="footerline-main" align="center">          
        
            <p class="space-small">&nbsp;</p>
            
            <div class="layout_width" align="center">
            
            <div class="div-twosections copyright" align="left">
              <div class="spacer-l">
                <?php echo $_smarty_tpl->getVariable('footer_copyright')->value;?>

              </div>
            </div>
            
            <div class="div-twosections" align="right">
              <div class="spacer-r">
                <a href="<?php echo $_smarty_tpl->getVariable('root_dir')->value;?>
home/contact.html"><?php echo $_smarty_tpl->getVariable('footer_href_contact')->value;?>
</a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="#"><?php echo $_smarty_tpl->getVariable('footer_href_imprint')->value;?>
</a>
              </div>
            </div>
                             
            <div class="clear"></div>  
            
            </div>
            
            <?php if (!isset($_smarty_tpl->getVariable('usr_data',null,true,false)->value['ID'])){?>
            
                <div class="footer_lang">
        
                <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['myId'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ay_languages')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
 $_smarty_tpl->tpl_vars['myId']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
                
                <img src="<?php echo $_smarty_tpl->getVariable('dir_img')->value;?>
flags/<?php echo $_smarty_tpl->tpl_vars['i']->value['language'];?>
.png">
          
                <a href="?lang=<?php echo $_smarty_tpl->tpl_vars['i']->value['language'];?>
" class="footer"><?php echo $_smarty_tpl->tpl_vars['i']->value['language_name'];?>
</a>
                &nbsp;&nbsp;
                
                <?php }} ?>  
                </div>
              
            <?php }?>
            
            Page was generated in <?php echo $_smarty_tpl->getVariable('rendering_time')->value;?>
 seconds
        </div> 
            
    </div>
    

    
</div>

</body>
</html>