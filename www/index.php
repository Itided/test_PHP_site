<?php 

session_start();

if(!isset($_SESSION['cart'])) //если в сессии нету массива карзины - создаём его
	$_SESSION['cart'] = array();

include_once '../config/config.php'; //Initialization settings
include_once '../config/db.php';
include_once '../library/mainFunctions.php'; //Main functions

//Determine which controller we will work with.
$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Index';
//Determine which function we will work with.
$actionName = isset($_GET['action']) ? $_GET['action'] : 'index';

if(isset($_SESSION['user']))
	$smarty->assign('arUser', $_SESSION['user']);

//инициализируем колличество элементов в корзине
$smarty->assign('cartCntItems', count($_SESSION['cart']));

loadPage($smarty, $db, $controllerName, $actionName);