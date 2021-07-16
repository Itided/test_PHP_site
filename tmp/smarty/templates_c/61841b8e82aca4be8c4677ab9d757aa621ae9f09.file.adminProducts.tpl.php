<?php /* Smarty version Smarty-3.1.6, created on 2020-05-17 20:21:54
         compiled from "../views/admin\adminProducts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17068703565e7fa835b799b9-19204719%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '61841b8e82aca4be8c4677ab9d757aa621ae9f09' => 
    array (
      0 => '../views/admin\\adminProducts.tpl',
      1 => 1589736113,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17068703565e7fa835b799b9-19204719',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5e7fa835bc3e0',
  'variables' => 
  array (
    'rsCategories' => 0,
    'itemCat' => 0,
    'rsProducts' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e7fa835bc3e0')) {function content_5e7fa835bc3e0($_smarty_tpl) {?><h2>Товар</h2>
<table border="1", cellpadding="1", cellspacing="1">
	<caption>Добавить продукт</caption>
	<tr>
		<th>Название</th>
		<th>Цена</th>
		<th>Категория</th>
		<th>Описание</th>
		<th>Изображение</th>
		<th>Сохранить</th>
		<tr>
			<form action="/www/admin/addproduct/" method="post" enctype="multipart/form-data">
				<td><input type="edit" name="itemName" value=""></td>
				<td><input type="edit" name="itemPrice" value=""></td>
				<td>
					<select name="itemCatId">
						<?php  $_smarty_tpl->tpl_vars['itemCat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itemCat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsCategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itemCat']->key => $_smarty_tpl->tpl_vars['itemCat']->value){
$_smarty_tpl->tpl_vars['itemCat']->_loop = true;
?>
							<?php if ($_smarty_tpl->tpl_vars['itemCat']->value['parent_id']){?> == 3}
								<option value="<?php echo $_smarty_tpl->tpl_vars['itemCat']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['itemCat']->value['name'];?>
</option>
							<?php }?>
						<?php } ?>
					</select>
				</td>
				<td><textarea name="itemDesc"></textarea></td>
				<td>	
					<img width="100" src="#" class="hideme" id="upload-img" alt="image" />
					<input type="file" name="filename" id="upload" onclick="displayImage();"><br>
				</td>
				<td><input type="submit" value="Сохранить"></td>
			</form>
		</tr>
	</tr>
</table><br>

<input type="checkbox" id="showDeletedProducts" onchange="showDelProducts();" value="Yes">Показывать удалённые продукты

<table border="1", cellpadding="1", cellspacing="1" style="margin-left: -100px;">
	<caption>Редактировать продукт</caption>
	<tr>
		<th>№</th>
		<th>ID</th>
		<th>Название</th>
		<th>Цена</th>
		<th>Категория</th>
		<th>Описание</th>
		<th>Удалить</th>
		<th>Изображение</th>
		<th>Сохранить</th>
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsProducts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']++;
?>
			<?php if ($_smarty_tpl->tpl_vars['item']->value['status']==1){?>
				<tr>
					<td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['products']['iteration'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
					<td><input type="edit" id="itemName_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
"></td>
					<td><input type="edit" id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
"></td>
					<td>
						<select id="itemCatId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
							<?php  $_smarty_tpl->tpl_vars['itemCat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itemCat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsCategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itemCat']->key => $_smarty_tpl->tpl_vars['itemCat']->value){
$_smarty_tpl->tpl_vars['itemCat']->_loop = true;
?>
								<?php if ($_smarty_tpl->tpl_vars['itemCat']->value['parent_id']){?> == 3}
									<option value="<?php echo $_smarty_tpl->tpl_vars['itemCat']->value['id'];?>
"
										<?php if ($_smarty_tpl->tpl_vars['item']->value['category_id']==$_smarty_tpl->tpl_vars['itemCat']->value['id']){?>selected<?php }?>>
										<?php echo $_smarty_tpl->tpl_vars['itemCat']->value['name'];?>

									</option>
								<?php }?>
							<?php } ?>
						</select>
					</td>
					<td><textarea id="itemDesc_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
</textarea></td>
					<td><input type="checkbox" id="itemStatus_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"></td>
					<td>	
						<?php if ($_smarty_tpl->tpl_vars['item']->value['image']){?>
							<img src="/www/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" width="70">
						<?php }?>
						<form action="/www/admin/upload/" method="post" enctype="multipart/form-data">
							<input type="file" name="filename"><br>
							<input type="hidden" name="itemId" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
							<input type="submit" value="Загрузить"><br>
						</form>
					</td>
					<td><input type="button" value="Сохранить" onclick="updateProduct(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);"></td>
				</tr>
			<?php }?>	
		<?php } ?>

		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsProducts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']++;
?>
			<?php if ($_smarty_tpl->tpl_vars['item']->value['status']==0){?>
				<tr class="delItems">
					<td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['products']['iteration'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
					<td><input type="edit" id="itemName_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
"></td>
					<td><input type="edit" id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
"></td>
					<td>
						<select id="itemCatId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
							<?php  $_smarty_tpl->tpl_vars['itemCat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itemCat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsCategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itemCat']->key => $_smarty_tpl->tpl_vars['itemCat']->value){
$_smarty_tpl->tpl_vars['itemCat']->_loop = true;
?>
								<?php if ($_smarty_tpl->tpl_vars['itemCat']->value['parent_id']){?> == 3}
									<option value="<?php echo $_smarty_tpl->tpl_vars['itemCat']->value['id'];?>
"
										<?php if ($_smarty_tpl->tpl_vars['item']->value['category_id']==$_smarty_tpl->tpl_vars['itemCat']->value['id']){?>selected<?php }?>>
										<?php echo $_smarty_tpl->tpl_vars['itemCat']->value['name'];?>

									</option>
								<?php }?>
							<?php } ?>
						</select>
					</td>
					<td><textarea id="itemDesc_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
</textarea></td>
					<td><input type="checkbox" id="itemStatus_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"checked="checked"</td>
					<td>	
						<?php if ($_smarty_tpl->tpl_vars['item']->value['image']){?>
							<img src="/www/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" width="70">
						<?php }?>
						<form action="/www/admin/upload/" method="post" enctype="multipart/form-data">
							<input type="file" name="filename"><br>
							<input type="hidden" name="itemId" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
							<input type="submit" value="Загрузить"><br>
						</form>
					</td>
					<td><input type="button" value="Сохранить" onclick="updateProduct(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);"></td>
				</tr>
			<?php }?>	
		<?php } ?>
</table><?php }} ?>