<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{$pageTitle}</title>
	<link rel="stylesheet" type="text/css" href="/{$templateWebPath}css/main.css">
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
					{if $cartCntItems>0} {$cartCntItems} {else} 0 {/if}
				</span>
			</svg>
		</a>
		<a class="btn btn-outline-primary" href="/">Главная</a>		
	</header>
	<main>
		{include file='leftColumn.tpl'}

		<div id="centerColumn">