<?php /* Smarty version Smarty-3.1.6, created on 2020-05-31 12:23:45
         compiled from "../views/admin\adminOrders.tpl" */ ?>
<?php /*%%SmartyHeaderCode:426024505e85c4e63e4c58-51603468%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5949173ce98fde930df71ad4ac736fb0943fded' => 
    array (
      0 => '../views/admin\\adminOrders.tpl',
      1 => 1590917023,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '426024505e85c4e63e4c58-51603468',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5e85c4e6456dd',
  'variables' => 
  array (
    'rsOrders' => 0,
    'item' => 0,
    'itemChild' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e85c4e6456dd')) {function content_5e85c4e6456dd($_smarty_tpl) {?><h2>Заказы</h2>
<?php if (!$_smarty_tpl->tpl_vars['rsOrders']->value){?>
	<div align="center"><h2 style="color:red">Нет заказов!</h2><br/></div>
<?php }else{ ?>
	<table border="1" cellpadding="1" cellspacing="1" style="margin-left: -30px;">
		<tr>
			<th>№</th>
			<th>Действие</th>
			<th>ID заказа</th>
			<th width="110">Статус</th>
			<th nowrap>Дата создания</th>
			<th>Дата оплаты</th>
			<th>Дополнительная информация</th>
			<th>Дата изменения заказа</th>
			<th style="text-align: center !important;">Уникальный ID чека</th>
		</tr>
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsOrders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['orders']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['orders']['iteration']++;
?>
			<tr>
				<td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['orders']['iteration'];?>
</td>

				<td><a href="#" onclick="showProducts('<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
'); return false;">
					Показать товар заказа</a>
				</td>

				<td align="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>

				<td>
					<p align="center">
						<input type="checkbox" style="width: 20px;height: 20px;" id="itemStatus_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" 
							<?php if ($_smarty_tpl->tpl_vars['item']->value['status']){?> checked="checked"<?php }?> disabled="disabled">Оплачен
					</p>
				</td>

				<td align="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['date_created'];?>
</td>

				<td>
					<p align="center">
						<input id="datePayment_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['date_payment'];?>
">
						<input type="button" value="Сохранить" onclick="updateDatePayment('<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
');">
					</p>
				</td>

				<td nowrap><?php echo $_smarty_tpl->tpl_vars['item']->value['comment'];?>
</td>

				<td><?php echo $_smarty_tpl->tpl_vars['item']->value['date_modification'];?>
</td>
				
				<td><?php echo md5($_smarty_tpl->tpl_vars['item']->value['id']);?>
</td>
			</tr>
			<tr class="hideme" id="purchaseForOrderId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
				<td colspan="9">
					<?php if ($_smarty_tpl->tpl_vars['item']->value['children']){?>
						<table border="1" cellpadding="1" cellspacing="1" width="100%">
							<tr>
								<th>№</th>
								<th>ID</th>
								<th>Название</th>
								<th>Цена</th>
								<th>Количество</th>
							</tr>
							<?php  $_smarty_tpl->tpl_vars['itemChild'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itemChild']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['itemChild']->key => $_smarty_tpl->tpl_vars['itemChild']->value){
$_smarty_tpl->tpl_vars['itemChild']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']++;
?>
								<tr>
									<td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['products']['iteration'];?>
</td>

									<td align="center"><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['id'];?>
</td>

									<td align="center">
										<a href="/www/product/<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['name'];?>
</a>
									</td>

									<td align="center"><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['price'];?>
</td>

									<td align="center"><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['amount'];?>
</td>
								</tr>
							<?php } ?>
						</table>
					<?php }?>
				</td>
			</tr>
		<?php } ?>
	</table>
<?php }?><?php }} ?>