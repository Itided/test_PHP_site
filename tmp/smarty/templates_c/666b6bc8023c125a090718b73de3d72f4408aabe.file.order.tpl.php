<?php /* Smarty version Smarty-3.1.6, created on 2020-05-31 12:40:38
         compiled from "../views/default\order.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16907592055e7bc94a782bc1-42149238%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '666b6bc8023c125a090718b73de3d72f4408aabe' => 
    array (
      0 => '../views/default\\order.tpl',
      1 => 1590918036,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16907592055e7bc94a782bc1-42149238',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5e7bc94ad7f72',
  'variables' => 
  array (
    'rsServ' => 0,
    'rsProducts' => 0,
    'item' => 0,
    'arUser' => 0,
    'buttonClass' => 0,
    'name' => 0,
    'phone' => 0,
    'address' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e7bc94ad7f72')) {function content_5e7bc94ad7f72($_smarty_tpl) {?>

<style>
	.item{
		font-size: 18px;
    	font-family: cursive;
    	font-style: italic;
    	font-variant-caps: unicase;
	}
</style>

<h2>Данные заказа</h2>
<form id="frmOrder" action="/www/cart/saveorder/" method="POST">
	<table>
		<caption style="font-size: 20px; color: red;">
			Всего: 
			<?php echo $_smarty_tpl->tpl_vars['rsServ']->value['price'];?>
 грн<br>
			<?php if ($_smarty_tpl->tpl_vars['rsServ']->value['delivery']){?> С нашей доставкой<br><?php }?>
			<?php if ($_smarty_tpl->tpl_vars['rsServ']->value['inst']){?> С нашей сборкой и установкой<br><?php }?>
		</caption>
		<tr>
	         <td>№</td>
	         <td>Наименование</td>
	         <td>Количество</td>
	         <td>Цена за еденицу</td>
	         <td>Стоимость</td>
	     </tr>
		 
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsProducts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']++;
?>
			<tr>
				<td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['products']['iteration'];?>
</td>
				<td><a href="/www/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></td>
				<td align="center">  
					<span id="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
					  <input type="hidden" name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['cnt'];?>
" /> 
						<?php echo $_smarty_tpl->tpl_vars['item']->value['cnt'];?>

					</span>
				</td>
				<td>  
					<span id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
					   <input type="hidden" name="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
" /> 
						<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
 грн
				   </span>
				 </td>
				<td>  
					 <span id="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
						 <input type="hidden" name="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['realPrice'];?>
" /> 
						<?php echo $_smarty_tpl->tpl_vars['item']->value['realPrice'];?>
 грн
					 </span>
				</td>
				<?php if ($_smarty_tpl->tpl_vars['item']->value['frame']){?>
					<tr>
						<td colspan="6">
							&#8195;Тип: <span class="item"><?php echo $_smarty_tpl->tpl_vars['item']->value['type'];?>
</span><br>
							&#8195;Подвеска: <span class="item"><?php echo $_smarty_tpl->tpl_vars['item']->value['frame'];?>
</span><br>
							&#8195;Цвет: <span class="item"><?php echo $_smarty_tpl->tpl_vars['item']->value['color'];?>
</span><br>
						</td>
					</tr>
				<?php }?>
			</tr>
		<?php } ?>
	</table>

	<?php if (isset($_smarty_tpl->tpl_vars['arUser']->value)){?>
		<?php $_smarty_tpl->tpl_vars['buttonClass'] = new Smarty_variable('', null, 0);?>
		<h2>Данные заказчика</h2>
		<div id="orderUserInfoBox" <?php echo $_smarty_tpl->tpl_vars['buttonClass']->value;?>
>
			<?php $_smarty_tpl->tpl_vars['name'] = new Smarty_variable($_smarty_tpl->tpl_vars['arUser']->value['name'], null, 0);?>
			<?php $_smarty_tpl->tpl_vars['phone'] = new Smarty_variable($_smarty_tpl->tpl_vars['arUser']->value['phone'], null, 0);?>
			<?php $_smarty_tpl->tpl_vars['address'] = new Smarty_variable($_smarty_tpl->tpl_vars['arUser']->value['address'], null, 0);?>
			<table>
					<tr>
						<td>Имя*</td>
						<td><input type="text" id="name"   name="name"  value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" /></td>
					</tr>
					<tr>
						<td>Тел*</td>
						<td><input type="text" id="phone"  name="phone" value="<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
" /></td>
					</tr>
					<tr>
						<td>Адрес*</td>
						<td><textarea style="width: 167px;" id="address" name="address" /><?php echo $_smarty_tpl->tpl_vars['address']->value;?>
</textarea></td>
					</tr>
			</table>   
		</div>
	<?php }else{ ?>	
		<div id="loginBox">
			<div class="menuCaption">Авторизация</div>
				<table>
				<tr>
					<td>Логин</td>
					<td><input type="text" id="loginEmail" name="loginEmail" value=""/></td>
				</tr>
				<tr>
					<td>Пароль</td>
					<td><input type="password" id="loginPwd" name="loginPwd" value=""/></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="button" onclick="login();" value="Войти"/></td>
				</tr>
				</table> 
		</div> 
		<div id="registerBox">или <br />
	            <div class="menuCaption">Регистрация нового пользователя:</div>
	            email* :<br />
	            <input type="text" id="email" name="email" value=""/><br />
	            пароль* : <br />
	            <input type="password" id="pwd1" name="pwd1" value=""/><br />
	            повторить пароль* :<br />
	            <input type="password" id="pwd2" name="pwd2" value=""/><br />

	            <table>
					<tr>
						<td>Имя*</td>
						<td><input type="text" id="name"   name="name"  value="" /></td>
					</tr>
					<tr>
						<td>Тел*</td>
						<td><input type="text" id="phone"  name="phone" value="" /></td>
					</tr>
					<tr>
						<td>Адрес*</td>
						<td><textarea style="width: 167px;" id="address" name="address" /></textarea></td>
					</tr>
				</table>

	            <input type="button" onclick="registerNewUser();" value="Зарегистрироваться"/>
	        </div>
		<?php $_smarty_tpl->tpl_vars['buttonClass'] = new Smarty_variable("class='hideme'", null, 0);?>
	<?php }?>
	<input <?php echo $_smarty_tpl->tpl_vars['buttonClass']->value;?>
 id="btnSaveOrder" type="button" value="Оформить заказ" onclick="saveOrder();"/>
</form><?php }} ?>