<?php 

//include model of categories
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

function testAction(){
	echo "IndexController.php > testAction";
}

//Formation of the home page.
function indexAction($smarty, $db){

	$rsCategories = getAllMainCatsWithChildren($db); //получаем все главные котегории с их дочерними 
	$rsProducts = getLastProducts($db, 18);
	shuffle($rsProducts);

	if(isset($_SESSION['user']['discount']))
		$smarty->assign('discount', 1);

	$smarty->assign('pageTitle', 'Главная страница сайта');
	
	$smarty->assign('rsCategories', $rsCategories);	
	$smarty->assign('rsProducts', $rsProducts);	


	loadTemplate($smarty, 'header');
	loadTemplate($smarty, 'index');
	loadTemplate($smarty, 'footer');
}
