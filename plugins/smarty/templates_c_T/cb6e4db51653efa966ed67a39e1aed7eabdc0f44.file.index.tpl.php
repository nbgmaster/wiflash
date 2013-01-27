<?php /* Smarty version Smarty-3.0.8, created on 2012-09-22 18:42:21
         compiled from ".\templates_T\modules/register/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9154505dea6d476b44-23985051%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb6e4db51653efa966ed67a39e1aed7eabdc0f44' => 
    array (
      0 => '.\\templates_T\\modules/register/index.tpl',
      1 => 1314139202,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9154505dea6d476b44-23985051',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
    <div id="form_reg">
    
          <form id="form_register" name="form_register">
            <fieldset>
               <legend><?php echo $_smarty_tpl->getVariable('form_reg_title')->value;?>
</legend>
               
                <label for="UserEmail"><div class="inp_title"><?php echo $_smarty_tpl->getVariable('form_reg_email')->value;?>
</div></label>
                <div class="float-l">
                <input type="text" name="email" id="email" autocomplete="off" value="" class="reg_inp" maxlength="50">
                </div>
                <span id="emailInfo"></span> 
                <div class="clear"></div>
                
                <p>&nbsp;</p>
                
                <label for="UserEmail"><div class="inp_title"><?php echo $_smarty_tpl->getVariable('form_reg_email')->value;?>
</div></label>
                <div class="float-l">
                <input type="text" name="email_check" id="email_check" autocomplete="off" value="" class="reg_inp" maxlength="50">
                </div>  
                <span id="email2Info"></span> 
                <div class="clear"></div>                
                <p>&nbsp;</p>
                
                <label for="UserPass"><div class="inp_title"><?php echo $_smarty_tpl->getVariable('form_reg_pw')->value;?>
</div></label>
                <div class="float-l">
                <input type="password" name="pw" id="pw" autocomplete="off" value="" class="reg_inp" maxlength="20">
                </div>
                <span id="pass1Info"></span>  
                <div class="clear"></div>
               
                <p>&nbsp;</p>
                
                <label for="UserPass"><div class="inp_title"><?php echo $_smarty_tpl->getVariable('form_reg_pw')->value;?>
</div></label>
                <div class="float-l">
                <input type="password" name="pw_check" id="pw_check" autocomplete="off" value="" class="reg_inp" maxlength="20">
                </div> 
                <span id="pass2Info"></span>    
                <div class="clear"></div>
                                                             
                <p>&nbsp;</p>
                        
                <div align="center">
                
                  <input type="button" value="" id="reg" style="display:none" onclick="xajax_register(xajax.getFormValues('form_register'));">
                  <input id="reg_submit" class="reg_submit" type="submit" value="<?php echo $_smarty_tpl->getVariable('form_reg_signup')->value;?>
" name="submit_register">
                </div>
                
              </fieldset>
                
            </form>
            
            <script language="JavaScript" src="<?php echo $_smarty_tpl->getVariable('root_dir')->value;?>
media/js/validation_register.js" type="text/JavaScript"></script>
            
    </div>
    
    <div id="reg_success" style="display:none">
    Registration successful. Please check your emails to confirm it.
    </div>
            
            