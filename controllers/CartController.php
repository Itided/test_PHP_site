<?php //(/cart/)

//include models
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';
include_once '../models/OrdersModel.php';
include_once '../models/PurchaseModel.php';

function addtocartAction($smarty, $db){
	$itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
	if(!$itemId) 
		return false;

	$frame = $_POST['frame'];
	$color = $_POST['color'];
	$resData = array();
	
	//если значение не найдено - добавляем 
	if(isset($_SESSION['cart']) && array_search($itemId, $_SESSION['cart']) === false){	
		if($frame && $color){
			$_SESSION['cart'][$itemId] = array();
			$_SESSION['cart'][$itemId]['id'] = $itemId;
			$_SESSION['cart'][$itemId]['type'] = getTypeById($db, $itemId);
			$_SESSION['cart'][$itemId]['frame'] = $frame;
			$_SESSION['cart'][$itemId]['color'] = $color;
		}
		$_SESSION['cart'][$itemId]['id'] = $itemId;

		$resData['cntItems'] = count($_SESSION['cart']);
		$resData['success'] = 1;
	}
	else
		$resData['success'] = 0;


	echo json_encode($resData);
}

function removefromcartAction(){
	//unset($_SESSION['cart']);
	$itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
	if(!$itemId) 
		exit();

	$resData = array();
	unset($_SESSION['cart'][$itemId]);
	//debug($_SESSION, 1);
	$resData['success'] = 1;
	$resData['cntItems'] = count($_SESSION['cart']);

	echo json_encode($resData);
}

function indexAction($smarty, $db){
	//debug($_SESSION['cart']);
	$rsProducts = isset($_SESSION['cart']) && count($_SESSION['cart'])>0 ? getProductsFromArray($db, $_SESSION['cart']) : null;  
	$rsCategories = getAllMainCatsWithChildren($db);

	if(isset($_SESSION['user']['discount']))
		$smarty->assign('discount', 1);

	$smarty->assign('pageTitle', 'Корзина');
	$smarty->assign('rsCategories', $rsCategories);	
	$smarty->assign('rsProducts', $rsProducts);
	
	loadTemplate($smarty, 'header');
	loadTemplate($smarty, 'cart');
	loadTemplate($smarty, 'footer');
}

function orderAction($smarty, $db){
	
	// получаем массив идентификаторов (ID) продуктов корзины
    $itemsIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
	//debug($_SESSION);
	// если корзина пуста то редиректим в корзину
    if(!$itemsIds){
		redirect('/www/cart/');
		return;
	}

	// получаем из массива $_POST количество покупаемых товаров
    $itemsCnt = array();
    foreach($itemsIds as $item){
		// формируем ключ для массива POST
        $postVar = 'itemCnt_' . $item['id'];
		// создаем элемент массива количества покупаемого товара
		// ключ массива - ID товара, значение массива - количество товара
		// $itemsCnt[1] = 3;  товар с ID == 1 покупают 3 штуки
		
        $itemsCnt[$item['id']] = isset($_SESSION['order'][$postVar]) ? $_SESSION['order'][$postVar] : null;
    }
	// получаем список продуктов по массиву корзины
    $rsProducts = getProductsFromArray($db, $itemsIds);
	
	// добавляем каждому продукту дополнительное поле 
	// "realPrice = количество продуктов * на цену продукта"
	// "cnt" = количество покупаемого товара
	
	// &$item - для того чтобы при изменении переменной $item 
	// менялся и элемент массива $rsProducts
	$i = 0;
    foreach($rsProducts as &$item){
        $item['cnt'] = isset($itemsCnt[$item['id']]) ? $itemsCnt[$item['id']] : 0;
        if($item['cnt'])
            $item['realPrice'] = $item['cnt'] * $item['price'];
        else {
            unset($rsProducts[$i]);
        }
        $i++;
    }
	//debug($rsProducts);
	if(!$rsProducts){
		echo "Корзина пуста";
		return;
	}
	
	// полученный массив покупаемых товаров помещаем в сессионную переменную
    $_SESSION['saleCart'] = $rsProducts;
    
	$rsCategories = getAllMainCatsWithChildren($db);
	
	// hideLoginBox переменная - флаг для того чтобы спрятать блоки логина и регистрации 
	// в боковой панели
	if(!isset($_SESSION['user'])){
		$smarty->assign('hideLoginBox', 1);
	}
	//debug($rsProducts);
	$serv = array();
	$serv['delivery'] =  $_SESSION['order']['delivery'];
    $serv['inst'] =  $_SESSION['order']['inst'];
    $serv['price'] =  $_SESSION['order']['price'];
    //debug($_SESSION);
    $smarty->assign('pageTitle', 'Заказ');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);
    $smarty->assign('rsServ', $serv);
     
    loadTemplate($smarty, 'header');
	loadTemplate($smarty, 'order');
	loadTemplate($smarty, 'footer');
 }

 function doorderAction($smarty, $db){
 	//debug($_POST);
 	if(!$_POST){
		return;
	}
    $_SESSION['order'] = $_POST;

    $resData = array();
    $resData['success'] = 1;

    echo json_encode($resData);
 }

 function saveorderAction($smarty, $db)
 {
	 // получаем массив покупаемых товаров
	$cart = isset($_SESSION['saleCart']) ? $_SESSION['saleCart'] : null;
	//debug($cart);
	// если корзина пуста, то формируем ответ с ошибкой, отдаем его в формате 
	// json и выходим из функции 
	if(!$cart){
		$resData['success'] = 0; 
        $resData['message'] = 'Нет товаров для заказа'; 
		echo json_encode($resData);
		return;
	}
	
	//дописать проверку есть ли они 
	$name	= $_POST['name'];
	$phone	= $_POST['phone'];
	$address = $_POST['address'];
	
	if($name && $phone && $address)
		$orderId = makeNewOrder($db, $name, $phone, $address);// создаем новый заказ и получаем его ID
	else{
		$resData['success'] = 0; 
        $resData['message'] = 'Не все данные заполнены!'; 
		echo json_encode($resData);
		return;
	}
	
	// если заказ не создан, то выдаем ошибку и завершаем функцию
	if(!$orderId){
		$resData['success'] = 0; 
        $resData['message'] = 'Ошибка создания заказа'; 
		echo json_encode($resData);
		return;
	} 
	
	// сохраняем товары для созданного заказа
	$res = setPurchaseForOrder($db, $orderId, $cart);
	//debug($cart);
	
	// если успешно, то формируем ответ, удаляем переменные корзины
	if($res){
		$resData['success'] = 1; 
        $resData['message'] = 'Заказ сохранен';
		unset($_SESSION['saleCart']);
		unset($_SESSION['cart']);
		unset($_SESSION['order']);
	} else {
        $resData['success'] = 0; 
        $resData['message'] = 'Ошибка внесения данных для заказа № ' . $orderId; 
    }
	
	echo json_encode($resData);
 }