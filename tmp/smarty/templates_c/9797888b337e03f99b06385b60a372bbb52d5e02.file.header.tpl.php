<?php /* Smarty version Smarty-3.1.6, created on 2020-05-30 19:29:03
         compiled from "../views/default\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14858943955e6d37b0c23e41-03302537%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9797888b337e03f99b06385b60a372bbb52d5e02' => 
    array (
      0 => '../views/default\\header.tpl',
      1 => 1590856136,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14858943955e6d37b0c23e41-03302537',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5e6d37b0da92e',
  'variables' => 
  array (
    'pageTitle' => 0,
    'templateWebPath' => 0,
    'cartCntItems' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e6d37b0da92e')) {function content_5e6d37b0da92e($_smarty_tpl) {?><!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
	<link rel="stylesheet" type="text/css" href="/<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
css/main.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" >
	<link rel="shortcut icon" href="#" />
	<script type="text/javascript" src="../../../www/js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="../../../www/js/main.js"></script>
</head>
<body>
	<header id="header" class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
		<a href="/"><img src="/www/images/logo22.png" style="object-fit: contain; height: 90px;" alt=""></a>
		<a href="/"><img src="/www/images/logo.png" style="object-fit: contain; width: 300px;" alt=""></a>
		<a href='/www/cart/' title="Перейти в корзину">
			<svg class="bi bi-bag sss" width="3em" height="3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" d="M14 5H2v9a1 1 0 001 1h10a1 1 0 001-1V5zM1 4v10a2 2 0 002 2h10a2 2 0 002-2V4H1z" clip-rule="evenodd"/>
				<path d="M8 1.5A2.5 2.5 0 005.5 4h-1a3.5 3.5 0 117 0h-1A2.5 2.5 0 008 1.5z"/>
				<span id="cartCntItems">
					<?php if ($_smarty_tpl->tpl_vars['cartCntItems']->value>0){?> <?php echo $_smarty_tpl->tpl_vars['cartCntItems']->value;?>
 <?php }else{ ?> 0 <?php }?>
				</span>
			</svg>
		</a>
		<a class="btn btn-outline-primary" href="/">Главная</a>		
	</header>
	<main>
		<?php echo $_smarty_tpl->getSubTemplate ('leftColumn.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


		<div id="centerColumn"><?php }} ?>