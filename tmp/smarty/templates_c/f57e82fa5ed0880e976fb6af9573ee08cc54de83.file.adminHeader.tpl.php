<?php /* Smarty version Smarty-3.1.6, created on 2020-05-17 20:18:53
         compiled from "../views/admin\adminHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8263844595e7f13df0d3747-34035396%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f57e82fa5ed0880e976fb6af9573ee08cc54de83' => 
    array (
      0 => '../views/admin\\adminHeader.tpl',
      1 => 1589735929,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8263844595e7f13df0d3747-34035396',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5e7f13df54503',
  'variables' => 
  array (
    'pageTitle' => 0,
    'templateWebPath' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e7f13df54503')) {function content_5e7f13df54503($_smarty_tpl) {?><!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
	<link rel="stylesheet" type="text/css" href="/<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
css/main.css">
	<link rel="shortcut icon" href="#" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script type="text/javascript" src="../../../www/js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="/<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
js/admin.js"></script>
</head>
<body>
	<div id="header">
		<h1>Управление сайтом</h1>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ('adminLeftColumn.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div id="centerColumn"><?php }} ?>