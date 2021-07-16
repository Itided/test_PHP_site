<?php
/**
 * Модель для таблицы заказов (orders)
 * 
 */

/**
 * Создание заказа (без привязки товара)
 * 
 * @param string $name
 * @param string $phone
 * @param string $address
 * @return integer ID созданного заказа 
 */
function getProductsByIds($db, $items){
	$ids = implode(', ', $items);
	$sql = "SELECT * FROM `products` WHERE `id` in ({$ids})";
   	//debug($sql);
    $rs = mysqli_query($db, $sql);
    return createSmartyRsArray($rs);
}

function makeNewOrder($db, $name, $phone, $address)
{ //сделать защиту от иньекций
	//> инициализация переменных
	$userId		=	$_SESSION['user']['id'];

	$dateCreated	= date('Y.m.d H:i:s'); 
	$tempArr = array();
	if(isset($_SESSION['order']['pay'])){
		foreach ($_SESSION['saleCart'] as $key => $value) {
			$tempArr[] = $value['id'];
		}
		$prods = getProductsByIds($db, $tempArr);
	    $number = random_int(301111111, 401111111);
		$comment	=	"id пользователя: {$userId}<br />
						Вид оплаты: безналичный<br />
						Имя: {$name}<br />
						Дата: {$dateCreated}<br />
						Номер счёта: {$number}<br />";
						for ($i=0, $j=1; $i < count($prods); ++$i, ++$j){
							$comment .= "Название товара {$j}: {$prods[$i]['name']}<br />";
							$comment .= "Колличество товара {$j}: {$_SESSION['saleCart'][$i]['cnt']} ед<br />";
							$comment .= "Цена товара {$j} за 1ед: {$prods[$i]['price']} грн<br />";
						}

		$cash = 1;			
	}
	else{
		$comment	=	"id пользователя: {$userId}<br />
						Вид оплаты: наличный<br />
						Имя: {$name}<br />
						Дата: {$dateCreated}<br />";
	
		$cash = 0;
	}	
	if(isset($_SESSION['order']['delivery'])){
		$delivery = 1;
		$comment .= "С доставкой<br />";
	}
	else 
		$delivery = 0;
	if(isset($_SESSION['order']['inst'])){
		$assembly = 1;
		$comment .= "С сборкой и установкой<br />";
	}
	else 
		$assembly = 0;
	
	$comment .= "Телефон: {$phone}<br />";
	$comment .= "Адрес: {$address}";
	//debug($comment);
	$userIp			= $_SERVER['REMOTE_ADDR'];
	//<
	
	// формирование запроса к БД
	$sql = "INSERT INTO `orders` (`user_id`, `date_created`, `date_payment`, `status`, `cash`, `delivery`, `assembly`, `comment`, `user_ip`)  
           			  VALUES ('{$userId}', '{$dateCreated}', null, '0', '{$cash}', '{$delivery}', '{$assembly}', '{$comment}', '{$userIp}')";
           			  
   $rs = mysqli_query($db, $sql);
   
   // получить id созданного заказа
   if($rs){
	   $sql = "SELECT `id` FROM `orders` ORDER BY `id` DESC LIMIT 1";
	   $rs = mysqli_query($db, $sql);
	   // преобразование результатов запроса
	   $rs = createSmartyRsArray($rs);
	   
	   // возвращаем id созданного запроса
	   if(isset($rs[0]))
		   return $rs[0]['id'];
   }
   
    return false;
}


/**
 * Получить список заказов с привязкой к продуктам для пользователя $userId
 * 
 * @param integer $userId ID пользователя
 * @return array массив заказов с привязкой к продуктам 
 */
function getOrdersWithProductsByUser($db, $userId)
{	
	$userId = intval($userId);
	$sql = "SELECT * FROM `orders` WHERE `user_id` = '{$userId}' ORDER BY `id` DESC";
	
	$rs = mysqli_query($db, $sql); 
	$i = 0;
	$smartyRs = array();
    while ($row = mysqli_fetch_assoc($rs)) {
       	$rsChildren = getPurchaseForOrder($db, $row['id']);

        if($rsChildren){
            $row['children'] = $rsChildren;
			$smartyRs[] = $row;
        }
        ++$i; 
    }

   return $smartyRs;	
}

function getGuarantee($db, $id){
	$sql = "SELECT `guarantee` FROM `products` 
			WHERE (`id` = '{$id}')";
	$rs = mysqli_query($db, $sql); 

	return createSmartyRsArray($rs)[0];
}

function getFeatures($db, $order_id, $id){
	$sql = "SELECT `type`, `frame`, `color` FROM `bike_features` 
			WHERE (`product_id` = '{$id}' AND `order_id` = '{$order_id}')";
	//debug($sql, 0);
	$rs = mysqli_query($db, $sql); 
	return createSmartyRsArray($rs)[0];
}

function isBikeById($db, $id){
	$sql = "SELECT * FROM `bike_features` WHERE product_id = '{$id}'";
	//debug($sql);
	$rs = mysqli_query($db, $sql);

	if(createSmartyRsArray($rs))
		return true;
	return false;
}

function getOrders($db){
	$sql = "SELECT orders.*, users.name, users.email, users.phone, users.address FROM orders LEFT JOIN `users` ON orders.user_id = users.id ORDER BY `id` DESC";

	$rs = mysqli_query($db, $sql); 

	$smartyRs = array();
	while ($row = mysqli_fetch_assoc($rs)) {
		$rsChildren = getProductsForOrder($db, $row['id']);

		if($rsChildren){
			$row['children'] = $rsChildren;
			$smartyRs[] = $row;
		}
	}
	
	return $smartyRs;
}

function getProductsForOrder($db, $orderId){
	$sql = "SELECT * FROM `purchase` LEFT JOIN `products` ON purchase.product_id = products.id 
			WHERE (`order_id` = '{$orderId}')";

	$rs = mysqli_query($db, $sql); 
	return createSmartyRsArray($rs);
}

function updateOrderDatePayment($db, $itemId, $datePayment, $status){
	$sql = "UPDATE `orders` SET `date_payment` = '{$datePayment}', `status` = '{$status}'
			WHERE `id` = '{$itemId}'";

	$rs = mysqli_query($db, $sql);
	return $rs;
}

