<?php 

include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';
include_once '../models/OrdersModel.php';
include_once '../models/PurchaseModel.php';

$smarty->setTemplateDir(TemplateAdminPrefix);
$smarty->assign('templateWebPath', TemplateAdminWebPath);

function indexAction($smarty, $db){
	if(!isset($_SESSION['admin']))
       redirect('/');

	$statistics = array();
	$statistics['users'] = createSmartyRsArray(mysqli_query($db, "SELECT COUNT(1) FROM `users`"))
	[0]["COUNT(1)"];
	$statistics['products'] = createSmartyRsArray(mysqli_query($db, "SELECT COUNT(1) FROM `products` WHERE 
	`status` = 1"))[0]["COUNT(1)"];
	$statistics['orders'] = soldProd($db);
	$statistics['earned'] = totalEarned($db);
	

	$smarty->assign('statistics', $statistics);
	$smarty->assign('pageTitle', 'Управление сайтом');

	loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'admin');
    loadTemplate($smarty, 'adminFooter');
}

function logoutAction(){
	if(isset($_SESSION['admin'])){
		unset($_SESSION['admin']);
		unset($_SESSION['admin']);
	}

	redirect('/');
}

function addnewcatAction($smarty, $db){
	if(!isset($_SESSION['admin']))
       redirect('/');
	$catName = $_POST['newCategoryName'];
	$catParentId = $_POST['generalCatId'];

	$res = insertCat($db, $catName, $catParentId);
	if($res){
		$resData['success'] = 1;
		$resData['message'] = 'Категория добавлена';
	}
	else{
		$resData['success'] = 0;
		$resData['message'] = 'Ошибка добавления категории';
	}

	echo json_encode($resData);
	return;
}

function categoryAction($smarty, $db){
	if(!isset($_SESSION['admin']))
       redirect('/');
	$rsCategories = getAllCategories($db);
	$rsMainCategories = getAllMainCategories($db);

	$smarty->assign('rsCategories', $rsCategories);
	$smarty->assign('rsMainCategories', $rsMainCategories);
	$smarty->assign('pageTitle', 'Управление сайтом');

	loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'adminCategory');
    loadTemplate($smarty, 'adminFooter');
}

function updatecategoryAction($smarty, $db){
	if(!isset($_SESSION['admin']))
       redirect('/');
	$itemId = $_POST['itemId'];
	$parentId = $_POST['parentId'];
	$newName = $_POST['newName'];

	$res = updateCategoryData($db, $itemId, $parentId, $newName);
	
	if($res){
		$resData['success'] = 1;
		$resData['message'] = 'Категория обновлена';
	}
	else{
		$resData['success'] = 0;
		$resData['message'] = 'Ошибка изменения данных категории';
	}

	echo json_encode($resData);
	return;
}

function productsAction($smarty, $db){
	if(!isset($_SESSION['admin']))
       redirect('/');
	$rsCategories = getAllCategories($db);
	$rsProducts = getProducts($db);

	$smarty->assign('rsCategories', $rsCategories);
	$smarty->assign('rsProducts', $rsProducts);
	$smarty->assign('pageTitle', 'Управление сайтом');

	loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'adminProducts');
    loadTemplate($smarty, 'adminFooter');
}

function addproductAction($smarty, $db){
	if(!isset($_SESSION['admin']))
       redirect('/');
	$itemName = $_POST['itemName'];
	$itemPrice = $_POST['itemPrice'];
	$itemDesc = $_POST['itemDesc'];
	$itemCat = $_POST['itemCatId'];
	
	$res = insertProduct($db, $itemName, $itemPrice, $itemDesc, $itemCat);
	
	if($res)
		uploadAction($smarty, $db, getLastProducts($db, 1)[0]['id'], $_FILES);
	else{
		echo "<SCRIPT>alert('Ошибка добавления товара');window.location.replace('/www/admin/products/');</SCRIPT>";
	}
}

function updateproductAction($smarty, $db){
	if(!isset($_SESSION['admin']))
       redirect('/');
	$itemId = $_POST['itemId'];
	$itemName = $_POST['itemName'];
	$itemPrice = $_POST['itemPrice'];
	$itemStatus = $_POST['itemStatus'];
	$itemDesc = $_POST['itemDesc'];
	$itemCat = $_POST['itemCatId'];

	$res = updateProduct($db, $itemId, $itemName, $itemPrice, $itemStatus, $itemDesc, $itemCat);
	
	if($res){
		$resData['success'] = 1;
		$resData['message'] = 'Изменения успешно внесены';
	}
	else{
		$resData['success'] = 0;
		$resData['message'] = 'Ошибка изменения данных';
	}

	echo json_encode($resData);
	return;
}

function uploadAction($smarty, $db, $itemId=null, $image=null){
	if(!isset($_SESSION['admin']))
       redirect('/');
	$maxSize = 2 * 1024 * 1024;
	
	if($image!==null){
		$_FILES = $image;
		$_POST['itemId'] = $itemId;
	}
	$itemId = $_POST['itemId'];
	
	//получаем расширение загружаемого файла
	$extension = pathinfo($_FILES['filename']['name'], PATHINFO_EXTENSION);

	$newFileName = $itemId . '.' . $extension;

	if($_FILES['filename']['size'] > $maxSize){
		echo "<SCRIPT>alert('Размер файла не должен превышать 2 мегабайта!');window.location.replace('/www/admin/products/');</SCRIPT>";
		return;
	}

	if(is_uploaded_file($_FILES['filename']['tmp_name'])){
		$res = move_uploaded_file($_FILES['filename']['tmp_name'], 
			$_SERVER['DOCUMENT_ROOT'] . '/www/images/products/' . $newFileName);
		if($res){
			$res = updateProductImage($db, $itemId, $newFileName);
			if($res && image===null)
				redirect('/www/admin/products/');
			else
				echo "<SCRIPT>alert('Товар успешно добавлен');window.location.replace('/www/admin/products/');</SCRIPT>";
		}
	}
	else
		echo "<SCRIPT>alert('Ошибка загрузки товара');window.location.replace('/www/admin/products/');</SCRIPT>";
}

function ordersAction($smarty, $db){
	if(!isset($_SESSION['admin']))
       redirect('/');
	$rsOrders = getOrders($db);

	$smarty->assign('rsOrders', $rsOrders);
	$smarty->assign('pageTitle', 'Заказы');

	loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'adminOrders');
    loadTemplate($smarty, 'adminFooter');
}

function setorderstatusAction($smarty, $db){
	if(!isset($_SESSION['admin']))
       redirect('/');
	$itemId = $_POST['itemId'];
	$itemStatus = $_POST['status'];

	$res = updateOrderStatus($db, $itemId, $itemStatus);
	if($res){
		$resData['success'] = 1;
	}
	else{
		$resData['success'] = 0;
		$resData['message'] = 'Ошибка установки статуса';
	}

	echo json_encode($resData);
	return;
}

function setorderdatepaymentAction($smarty, $db){
	if(!isset($_SESSION['admin']))
       redirect('/');
	$itemId = $_POST['itemId'];
	$datePayment = $_POST['datePayment'];

	$res = updateOrderDatePayment($db, $itemId, $datePayment, 1);
	if($res){
		$resData['success'] = 1;
		$resData['message'] = 'Время оплаты успешно установлено';
	}
	else{
		$resData['success'] = 0;
		$resData['message'] = 'Ошибка установки статуса';
	}

	echo json_encode($resData);
	return;
}