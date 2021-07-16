<?php /* Smarty version Smarty-3.1.6, created on 2020-05-17 20:20:10
         compiled from "../views/admin\admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21045111215e7f14b89eced8-50265943%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ee8bf1c82c0c50f3ccc6f0ecdf9dedbbfa7dd834' => 
    array (
      0 => '../views/admin\\admin.tpl',
      1 => 1589736008,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21045111215e7f14b89eced8-50265943',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5e7f14b89ed88',
  'variables' => 
  array (
    'statistics' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e7f14b89ed88')) {function content_5e7f14b89ed88($_smarty_tpl) {?><div align="center"><h2 style="color:red">Панель администратора</h2></div><br/>
<style>
	td,th{
		white-space: nowrap;
	}
</style>
<div align="center" style='padding-left:170px;'><h3 style="color:green">Статистика</h3>
	<table id="tStat">
		<tbody>
		<tr>
			<td>Количество зарег пользователей</td>
			<th><?php echo $_smarty_tpl->tpl_vars['statistics']->value['users'];?>
</th>
		</tr>
		<tr>
			<td>Количество продуктов на сайте</td>
			<th><?php echo $_smarty_tpl->tpl_vars['statistics']->value['products'];?>
</th>
		</tr>
		<tr>
			<td>Количество проданных товаров</td>
			<th><?php echo $_smarty_tpl->tpl_vars['statistics']->value['orders'];?>
</th>
		</tr>
		<tr>
			<td>Всего заработано денег</td>
			<th><?php echo $_smarty_tpl->tpl_vars['statistics']->value['earned'];?>
 грн</th>
		</tr>
		</tbody>
	</table>
</div><?php }} ?>