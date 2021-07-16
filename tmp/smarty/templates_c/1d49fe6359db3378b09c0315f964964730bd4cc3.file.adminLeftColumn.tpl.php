<?php /* Smarty version Smarty-3.1.6, created on 2020-04-02 19:12:34
         compiled from "../views/admin\adminLeftColumn.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14570586565e7f14b894cab6-40916016%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1d49fe6359db3378b09c0315f964964730bd4cc3' => 
    array (
      0 => '../views/admin\\adminLeftColumn.tpl',
      1 => 1585843952,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14570586565e7f14b894cab6-40916016',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5e7f14b898196',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e7f14b898196')) {function content_5e7f14b898196($_smarty_tpl) {?><div id="leftColumn"> 
	<div id="leftMenu">
		<div class="menuCaption">Меню</div>
			<a href='/www/admin/'>Главная</a><br />
			<a href='/www/admin/category/'>Категории</a><br />
			<a href='/www/admin/products/'>Товары</a><br />
			<a href='/www/admin/orders/'>Заказы</a><br /><br /><br />
			<a href="/www/admin/logout/" onclick="logout();">Выход</a>
	</div>
</div>
<?php }} ?>