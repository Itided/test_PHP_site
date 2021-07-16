<?php /* Smarty version Smarty-3.1.6, created on 2020-05-29 11:46:25
         compiled from "../views/default\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20376487875e6cfe573c2930-01576493%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '345bdb8f839f160ac4fa3a7e53630c8be64410e5' => 
    array (
      0 => '../views/default\\index.tpl',
      1 => 1590741982,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20376487875e6cfe573c2930-01576493',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5e6cfe578a92d',
  'variables' => 
  array (
    'rsProducts' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e6cfe578a92d')) {function content_5e6cfe578a92d($_smarty_tpl) {?>
<div class="container">
        <div class="d-flex flex-wrap">
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsProducts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">
                        <a href="../www/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
                    </h4>
                </div>
                <div class="card-body">
                    <a href="../www/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/">
                        <img style="margin-left: 40px;" src="../www/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
"/>
                    </a>
                    <a href="../www/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/" class="btn btn-lg btn-block btn-outline-primary"><span><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
 грн</span>
                    </a>
                </div>
            </div>
        <?php } ?>
        </div>

</div>
<?php }} ?>