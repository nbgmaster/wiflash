<?php /* Smarty version Smarty-3.0.8, created on 2012-09-22 18:42:21
         compiled from ".\templates_T\set_design.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21156505dea6d430bf2-85666907%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '25bf338bb75bffc644db3f815a7155b548bb3090' => 
    array (
      0 => '.\\templates_T\\set_design.tpl',
      1 => 1314227196,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21156505dea6d430bf2-85666907',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<span class="header-font fix_pos_logon_design"><?php echo $_smarty_tpl->getVariable('header_design_selection')->value;?>
</span>

<select onChange="change_tpl(this.value)" id="change_tpl" class="sel_001">

<option value="1" id="1">Stefan</option>
<option value="2" id="2">Tino</option>

</select>

<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('root_dir')->value;?>
media/js/change_settings.js"></script>
