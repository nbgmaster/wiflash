<?php /* Smarty version Smarty-3.0.8, created on 2012-09-22 18:42:21
         compiled from ".\templates_T\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19767505dea6d3f4190-73784424%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2d0b3653e61db0c88b058946ffcf855b6d6f0b34' => 
    array (
      0 => '.\\templates_T\\login.tpl',
      1 => 1313842004,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19767505dea6d3f4190-73784424',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<form id="login_form" method="post" action="<?php echo $_smarty_tpl->getVariable('root_dir')->value;?>
">
  <fieldset>

  <table cellspacing="0 cellpadding="0" class="tbl_01">
  <tr>
      <td> &nbsp; </td>
      <td> <label class="header_txt"><?php echo $_smarty_tpl->getVariable('form_logon_email')->value;?>
</label> </td>
      <td> <label class="header_txt"><?php echo $_smarty_tpl->getVariable('form_logon_password')->value;?>
</label> </td>
      <td> &nbsp; </td> 
  </tr>
  <tr>
      <td class="td_004" style="padding-bottom:8px"> 
      
          <?php if (isset($_smarty_tpl->getVariable('logon_failure',null,true,false)->value)){?>
          <table cellspacing="0" cellpadding="0">
          <tr>
              <td> <img src="<?php echo $_smarty_tpl->getVariable('dir_img')->value;?>
icons/error-x.png" width="16"> </td>
              <td> <span class="header_txt">&nbsp;Login unsucessful</span> <td>
          </tr>
          </table>
           
          <?php }else{ ?>&nbsp;<?php }?>
          
      </td>
  
      <td style="padding-bottom:8px"> <input type="text" name="UserEmail" autocomplete="on" class="login_inp"> </td>
      <td style="padding-bottom:8px"> <input type="password" name="UserPass" autocomplete="on" class="login_inp"> </td>
      <td style="padding-bottom:8px"> <input id="login_submit" class="submit" type="submit" value="<?php echo $_smarty_tpl->getVariable('form_logon_login')->value;?>
" name="login"> </td>
      
  </tr>
  
  <tr>
      <td>&nbsp;</td>
      <td>  
          <table cellspacing="0" cellpadding="0">
          <tr>
              <td class="td_005"> <input type="checkbox" name="autologon" value="1" checked="checked"> </td>
              <td > <label class="logon_add">&nbsp;&nbsp;Remember Login?</label> </td>
          </tr>
          </table>

      </td>
      <td> 
            <span class="logon_add">Forgot Password?</span> 
       </td>
  </tr>
  </table>

</fieldset>
</form>
    