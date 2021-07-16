<?php //контроллер страницы котегории (/category/1)

//include models
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

function indexAction($smarty, $db){
	$catId = isset($_GET['id']) ? $_GET['id'] : null;
	if($catId == null) 
		exit();

	$rsCategory = null;
	$rsProducts = null;
	$rsCategory = getCatById($db, $catId);
	if($rsCategory['parent_id']==0)
		$rsChildCats = getChildrenForCat($db, $catId);
	else
		$rsProducts = getProductsByCat($db, $catId);

	$rsCategories = getAllMainCatsWithChildren($db);

	if(isset($_SESSION['user']['discount']))
		$smarty->assign('discount', 1);

	$smarty->assign('pageTitle', 'Товары категории ' . $rsCategories['name']);

	$smarty->assign('rsCategory', $rsCategory);	
	$smarty->assign('rsProducts', $rsProducts);
	$smarty->assign('rsChildCats', $rsChildCats);	

	$smarty->assign('rsCategories', $rsCategories);	

	
	loadTemplate($smarty, 'header');
	loadTemplate($smarty, 'category');
	loadTemplate($smarty, 'footer');
}


