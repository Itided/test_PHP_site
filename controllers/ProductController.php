<?php //controller product page (/product/2)

//include models
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';


function indexAction($smarty, $db){
	$itemId = isset($_GET['id']) ? $_GET['id'] : null;
	if($itemId == null) 
		exit();

	
	$rsProduct = getProductById($db, $itemId); //get data about the product.

	//debug($rsProduct);
	$rsCategories = getAllMainCatsWithChildren($db);

	$smarty->assign('itemInCart', 0);
	if(in_array($itemId, array_keys($_SESSION['cart'])))
		$smarty->assign('itemInCart', 1);

	if(isBike($db, $rsProduct)){
		$smarty->assign('itsBike', true);	
    	$smarty->assign('rsColors', getColors($db));
    	$smarty->assign('rsFrames', getFrames($db));
	}
	if(isset($_SESSION['user']['discount']))
		$smarty->assign('discount', 1);

	$smarty->assign('pageTitle', '');
	$smarty->assign('rsCategories', $rsCategories);	
	$smarty->assign('rsProduct', $rsProduct);
	
	loadTemplate($smarty, 'header');
	loadTemplate($smarty, 'product');
	loadTemplate($smarty, 'footer');
}