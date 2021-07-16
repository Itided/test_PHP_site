<?php /* Smarty version Smarty-3.1.6, created on 2020-05-31 12:29:44
         compiled from "../views/default\user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13590042865e7a2539d5c100-41803910%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '63ee73149e09ac8b024db0d49e528d996d357c0d' => 
    array (
      0 => '../views/default\\user.tpl',
      1 => 1590917381,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13590042865e7a2539d5c100-41803910',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5e7a2539ee432',
  'variables' => 
  array (
    'arUser' => 0,
    'rsUserOrders' => 0,
    'item' => 0,
    'itemChild' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e7a2539ee432')) {function content_5e7a2539ee432($_smarty_tpl) {?>
<style>
    .ord td{
        color: black;
    }
        tr:hover{
        background: unset !important;
    }
    .ord tr, td, th{
        white-space: nowrap;
    }
    tr, td, th{
        text-align: center;
    }
</style>
<h1>Ваши регистрационные даные:</h1>
<table border="0">
        <tr>
            <td>Логин (email)</td>
            <td><?php echo $_smarty_tpl->tpl_vars['arUser']->value['email'];?>
</td>
        </tr>
        <tr>
            <td>Имя</td>
            <td><input type="text" id="newName" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['name'];?>
"/></td>
        </tr>
        <tr>
            <td>Тел</td>
            <td><input type="text" id="newPhone" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['phone'];?>
"/></td>
        </tr>
        <tr>
            <td>Адрес</td>
            <td><textarea style="width: 167px;" id="newAdress"/><?php echo $_smarty_tpl->tpl_vars['arUser']->value['address'];?>
</textarea></td>
        </tr>
        <tr>
            <td>Новый пароль</td>
            <td><input type="password" id="newPwd1" value=""/></td>
        </tr>
        <tr>
            <td>Повтор пароля</td>
            <td><input type="password" id="newPwd2" value=""/></td>
        </tr>
        <tr>
            <td>Для того чтобы сохранить данные введите текущий пароль: </td>
            <td><input type="password" id="curPwd" value=""/></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="button" value="Сохранить изменения" onClick="updateUserData();"/></td>
        </tr>
</table>
		
<h2>Заказы:</h2>
<?php if (!$_smarty_tpl->tpl_vars['rsUserOrders']->value){?>
    Нет заказов
<?php }else{ ?>
    <table border="3" cellpadding="1" cellspacing="1" class="ord">
        <tr>
            <th>№</th>
            <th>Действие</th>
            <th>ID заказа</th>
            <th>Статус</th>
            <th>Дата создания</th>
            <th>Дата оплаты</th>
            <th>Информация</th>
            <th style="text-align: center !important;">Уникальный ID чека</th>
        </tr>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsUserOrders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['orders']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['orders']['iteration']++;
?>
            <tr>
                <td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['orders']['iteration'];?>
</td>
                <td nowrap><a href="#" onclick="showProducts('<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
'); return false;" >Показать заказ</a></td>
                <td align="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
                <td align="center" style="color: red; margin-top: -20px; padding-top: 50px;">
                    <?php if ($_smarty_tpl->tpl_vars['item']->value['status']==1){?>Оплачен<?php }else{ ?>Не оплачен<?php }?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['date_created'];?>
</td>
                <td align="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['date_payment'];?>
&nbsp;</td>
                <td nowrap align="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['comment'];?>
</td>
                <td><?php echo md5($_smarty_tpl->tpl_vars['item']->value['id']);?>
</td>
            </tr>
			
			<tr class="hideme" id="purchasesForOrderId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" >
                <td colspan="8">
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
							<td align="center"><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['product_id'];?>
</td>
							<td align="center"><a href="/www/product/<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['product_id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['name'];?>
</a></td>
                            <td align="center"><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['price'];?>
 грн</td>
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
<?php }?>		<?php }} ?>