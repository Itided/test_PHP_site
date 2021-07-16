<?php /* Smarty version Smarty-3.1.6, created on 2020-05-29 08:04:00
         compiled from "../views/default\cart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5918142725e776de02823c4-95331623%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba49ac498b8cf2b9e90bf9a7a8f97ee29f5cd8d0' => 
    array (
      0 => '../views/default\\cart.tpl',
      1 => 1590728633,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5918142725e776de02823c4-95331623',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5e776de02bf42',
  'variables' => 
  array (
    'rsProducts' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e776de02bf42')) {function content_5e776de02bf42($_smarty_tpl) {?>

	<h1>Корзина</h1>

	<?php if (!$_smarty_tpl->tpl_vars['rsProducts']->value){?>
		<br/><br/><br/><br/><h2 style="color:red">В корзине пусто!</h2><br/>
	<?php }else{ ?>
		<table border="2" style="margin-left: 300px; margin-bottom: 50px;">
			<caption style="caption-side: initial; text-align: center;">Наши услуги</caption>
			<tr>
				<th>Название услуги</th>
				<th>Цена</th>
				<th>Добавить в заказ</th>
			</tr>
			<tr>
				<td>Доставка</td>
				<td>300 грн за один товар</td>
				<td align="center"><input onchange="conversionTotalPrice();" type="checkbox" name="delivery" id="delivery" value=""></td>
			</tr>
			<tr>
				<td>Сборка + установка</td>
				<td>100 грн за один товар</td>
				<td align="center"><input onchange="conversionTotalPrice();" type="checkbox" name="inst" id="inst" value=""></td>
			</tr>
		</table>

		<table style="margin-left: 300px;">
			<caption style="caption-side: initial; text-align: center;">Способ оплаты</caption>
			<tr>
				<th>Наличный</th>
				<th>&nbsp;&nbsp;&nbsp;</th>
				<th>Безналичный</th>
			</tr>
			<tr>
				<td align="center"><input type="radio" name="pay" class="pay" value="0" checked></td>
				<td>&nbsp;&nbsp;&nbsp;</td>
				<td align="center"><input type="radio" name="pay" value="1" class="pay"></td>
			</tr>
		</table>

		<div align="center"><h2>Данные заказа:</h2></div>
		<table id="ooFrm">
			<tr>
				<td>№</td>
				<td>Наименование</td>
				<td>Колличество</td>
				<td>Цена за единицу</td>
				<td>Цена</td>
				<td>Действие</td>
			</tr>
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsProducts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']++;
?>
				<tr class="prod">
					<td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['products']['iteration'];?>
</td>

					<td><a href="../product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></td>

					<td><input name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" id="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" type="text" value="1" onchange="conversionPrice(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);"/></td>

					<td>
						<span id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
">
							<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>

						</span> грн
					</td>

					<td>
						<span id="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
" class="iRealPrice">
							<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>

						</span> грн
					</td>

					<td>
						<a id="removeCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" href="#" onClick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
); return false;" title="Удалить из корзины">Удалить</a>
						<a id="addCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="hideme" href="#" onClick="addToCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
); return false;" title="Восстановить элемент">Восстановить</a>
					</td>
				</tr>
			<?php } ?>
			<tr>
				<td style="text-align: center; padding-top: 20px;" colspan="3"><input type="submit" value="Оформить заказ" onclick="doOrder();" /></td>
				<td colspan="1" style="vertical-align: bottom;">Цена: <span id="Price" style="font-size: 20px; color: red;">130</span> грн</td>
			</tr>
		</table>
		<script>
			$(document).ready (function(){ conversionTotalPrice() });
		</script>
	<?php }?>
<?php }} ?>