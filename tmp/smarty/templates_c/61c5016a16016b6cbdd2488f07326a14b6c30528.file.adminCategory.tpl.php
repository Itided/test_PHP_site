<?php /* Smarty version Smarty-3.1.6, created on 2020-03-29 14:02:44
         compiled from "../views/admin\adminCategory.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15593010735e7f8a17172cf9-55753699%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '61c5016a16016b6cbdd2488f07326a14b6c30528' => 
    array (
      0 => '../views/admin\\adminCategory.tpl',
      1 => 1585428451,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15593010735e7f8a17172cf9-55753699',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5e7f8a172e2e7',
  'variables' => 
  array (
    'rsCategories' => 0,
    'item' => 0,
    'rsMainCategories' => 0,
    'mainItem' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e7f8a172e2e7')) {function content_5e7f8a172e2e7($_smarty_tpl) {?><h2>Категории</h2>

<div id="blockNewCategory">
	Новая категория:
	<input type="text" name="newCategoryName" value=""/><br />
	Является подкатегорией для
	<select name="generalCatId">
		<option value="0">Главная Категория
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsCategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</option>
			<?php } ?>
		</option>
	</select><br />
	<input type="button" onclick="newCategory();" value="Добавить категорию"/>
</div><br /><br />

<table border="1", cellpadding="1", cellspacing="1">
	<tr>
		<th>№</th>
		<th>ID</th>
		<th>Название</th>
		<th>Родительская категория</th>
		<th>Действие</th>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsCategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['categories']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['categories']['iteration']++;
?>
		<tr>
			<td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['categories']['iteration'];?>
</td>
			<td align="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
			<td><input type="edit" id="itemName_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
"></td>
			<td>
				<select id="parentId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
					<option value="0">Главная Категория</option>
					<?php  $_smarty_tpl->tpl_vars['mainItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['mainItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsMainCategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['mainItem']->key => $_smarty_tpl->tpl_vars['mainItem']->value){
$_smarty_tpl->tpl_vars['mainItem']->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['mainItem']->value['id'];?>
"
							<?php if ($_smarty_tpl->tpl_vars['item']->value['parent_id']==$_smarty_tpl->tpl_vars['mainItem']->value['id']){?>selected<?php }?>>
							<?php echo $_smarty_tpl->tpl_vars['mainItem']->value['name'];?>

						</option>
					<?php } ?>
				</select>
			</td>
			<td>
				<input type="button" style="width: 100%; height: 30px;" value="Сохранить" onclick="updateCat(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);">
				<input type="button" style="height: 30px; cursor: crosshair"value="Удалить категорию с её товарами" onclick=";">
			</td>
		</tr>
	<?php } ?>
</table><?php }} ?>