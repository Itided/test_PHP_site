<?php /* Smarty version Smarty-3.1.6, created on 2020-05-28 15:11:15
         compiled from "../views/default\product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15502655085ebecfe4242661-57703324%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5df48fe23d6db1928059ffcf8dc8290e0a3146e' => 
    array (
      0 => '../views/default\\product.tpl',
      1 => 1590667873,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15502655085ebecfe4242661-57703324',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5ebecfe42b187',
  'variables' => 
  array (
    'rsProduct' => 0,
    'itemInCart' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ebecfe42b187')) {function content_5ebecfe42b187($_smarty_tpl) {?>
<link rel="stylesheet" href="https://loft-mebel.com.ua/themes/default-bootstrap/css/product.css?v=1.23" type="text/css" media="all" />
<link rel="stylesheet" href="https://sofino.ua/static/styles/style.css?v=18.52.07">
<style>
	.img-garant{
		position: absolute;
	    top: 144px;
    	left: 306px;
	    object-fit: contain;
	    width: 150px !important;
	}
	.product-params-descr{
		margin-top: 80px;
	}
	.product-params-descr .p-div{
		border: 1px solid;
	}
	.product-params-descr .p1{
		margin-right: 10px;
		border-right: 1px solid;
		padding-right: 3px;
	}
</style>
<h2><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['name'];?>
</h2>

<img style="width: 575px; height: 575px; float: left;" src="../../../www/images/products/<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['image'];?>
">
<?php if ($_smarty_tpl->tpl_vars['rsProduct']->value['guarantee']){?>
	<img class="img-garant-product" src="/www/images/garantia-2-goda-umnyj-svet121928.gif" alt="">
<?php }?>
<div class="" style="display: inline-block; position: relative;">
		<span style="font-size: 30px; color: red;"><?php echo intval($_smarty_tpl->tpl_vars['rsProduct']->value['price']/1000);?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['price']%1000;?>
</span> грн<br>
	<br><br>
	<a id="removeCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
" <?php if (!$_smarty_tpl->tpl_vars['itemInCart']->value){?> class="hideme"<?php }?> href="#" onClick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
); return false;" alt="Удалить из корзины">Удалить из корзины</a>
	<a id="addCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
"<?php if ($_smarty_tpl->tpl_vars['itemInCart']->value){?> class="hideme"<?php }?> href="#" onClick="addToCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
); return false;" alt="Добавить в корзину">Добавить в корзину</a>
</div>

<p style="width: 630px;"><span style="display: block; text-align: center; margin-top: -90px;"> </span><br /><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['description'];?>
</p><?php }} ?>