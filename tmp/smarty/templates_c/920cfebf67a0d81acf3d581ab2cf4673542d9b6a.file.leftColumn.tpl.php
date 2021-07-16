<?php /* Smarty version Smarty-3.1.6, created on 2020-05-31 12:32:42
         compiled from "../views/default\leftColumn.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6822286605e6d37b0e7af69-03958900%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '920cfebf67a0d81acf3d581ab2cf4673542d9b6a' => 
    array (
      0 => '../views/default\\leftColumn.tpl',
      1 => 1590917558,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6822286605e6d37b0e7af69-03958900',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5e6d37b0e7e3a',
  'variables' => 
  array (
    'rsCategories' => 0,
    'item' => 0,
    'chItem' => 0,
    'arUser' => 0,
    'hideLoginBox' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e6d37b0e7e3a')) {function content_5e6d37b0e7e3a($_smarty_tpl) {?><div id="leftColumn"> 
	<div id="leftMenu">
		<div class="menuCaption">Меню</div>
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsCategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
				<a href='/www/category/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/'><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a><br />

				<?php if (isset($_smarty_tpl->tpl_vars['item']->value['children'])){?>
					<?php  $_smarty_tpl->tpl_vars['chItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['chItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['chItem']->key => $_smarty_tpl->tpl_vars['chItem']->value){
$_smarty_tpl->tpl_vars['chItem']->_loop = true;
?>
						<a class="aChild" href='/www/category/<?php echo $_smarty_tpl->tpl_vars['chItem']->value['id'];?>
/'><?php echo $_smarty_tpl->tpl_vars['chItem']->value['name'];?>
</a><br />
					<?php } ?>
				<?php }?>
			<?php } ?>
	</div>
</div>
<div class="" style="position: absolute; right: 30px; top: 100px; z-index: 1;">
	<?php if (isset($_smarty_tpl->tpl_vars['arUser']->value)){?>
		<div id="userBox">
			<a style="color: red; font-size: 20px;" href="/www/user/" id="userLink"><?php echo $_smarty_tpl->tpl_vars['arUser']->value['displayName'];?>
</a><br />
			<a href="/www/user/logout/" onclick="logout();">Выход</a>
		</div>
	<?php }else{ ?>
		<div id="userBox" class="hideme">
			<a href="#" id="userLink"></a><br />
			<a href="/www/user/logout/" onclick="logout();">Выход</a>
		</div>
	
		<?php if (!isset($_smarty_tpl->tpl_vars['hideLoginBox']->value)){?>
			<div id="loginBox">
				<div class="menuCaption">Авторизация</div>
				<input type="text" id="loginEmail" name="loginEmail" value=""/><br />
				<input type="password" id="loginPwd" name="loginPwd" value=""/><br />
				<input type="button" onclick="login();" value="Войти"/>
			</div>

			<div id="registerBox">
				<div class="menuCaption showHidden" onclick="showRegisterBox();">Регистрация</div>
				<div id="registerBoxHidden">
					email:<br />
					<input type="text" id="email" name="email" value=""><br />
					пароль:<br />
					<input type="password" id="pwd1" name="pwd1" value=""><br />
					повторить пароль:<br />
					<input type="password" id="pwd2" name="pwd2" value=""><br />
					<input type="button" onclick="registerNewUser();" value="Зарегестрироваться"><br />
				</div>
			</div>
		<?php }?>
	<?php }?>
</div><?php }} ?>