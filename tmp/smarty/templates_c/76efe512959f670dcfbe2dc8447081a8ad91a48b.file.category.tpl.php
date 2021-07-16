<?php /* Smarty version Smarty-3.1.6, created on 2020-05-31 12:33:37
         compiled from "../views/default\category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19863657895e73c2f2495984-03261890%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '76efe512959f670dcfbe2dc8447081a8ad91a48b' => 
    array (
      0 => '../views/default\\category.tpl',
      1 => 1590917616,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19863657895e73c2f2495984-03261890',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5e73c2f2519b3',
  'variables' => 
  array (
    'discount' => 0,
    'rsCategory' => 0,
    'rsProducts' => 0,
    'rsChildCats' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e73c2f2519b3')) {function content_5e73c2f2519b3($_smarty_tpl) {?> 
 
	<?php if ($_smarty_tpl->tpl_vars['discount']->value){?>
        <div class="" style="margin-left: 140px;">
            <span style="vertical-align: middle;">Вам, как постоянному покупателю, предоставляется скидка</span>
            <img style="vertical-align: middle;" src="/www/images/10-off-sale-png-transparent-image.jpg" alt="">
        </div>
    <?php }else{ ?>
    	<div class="" style="margin-left: 140px; font-size: 20px; color: #a5a58e;">Сделайте два заказа и покупайте товары со скидкой!</div>
    <?php }?>
	<h1>Категории: <?php echo $_smarty_tpl->tpl_vars['rsCategory']->value['name'];?>
</h1>

	<?php if ($_smarty_tpl->tpl_vars['rsProducts']->value||$_smarty_tpl->tpl_vars['rsChildCats']->value){?>
		<div class="d-flex flex-wrap">
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsProducts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
			    <div class="card mb-4 shadow-sm">
	                <div class="card-header">
	                    <h4 class="my-0 font-weight-normal"><a href="../www/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></h4>
	                </div>
	                <div class="card-body">
	                    <a href="/www/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/">
	                        <img style="margin-left: 40px;" src="/www/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
"/>
	                    </a>
	                    <a href="/www/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/">
		                    <button type="button" class="btn btn-lg btn-block btn-outline-primary">
		                        <span><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
 грн</span>
		                    </button>
	                    </a>
	                </div>
	            </div>
			<?php } ?>
		</div>

		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsChildCats']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
			 <h2><a href="../www/category/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></h2>
		<?php } ?>
	<?php }else{ ?>
		<br/><br/><br/><br/><div align="center"><h1 style="color:red">Товаров нет!</h1><br/></div>
	<?php }?>
<?php }} ?>