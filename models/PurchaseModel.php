<?php

/**
 * Модель для таблицы продукции (purchase)
 * 
 */

/**
 *  Внесение в БД данных продуктов с привязкой к заказу
 *
 * @param integer $orderId ID заказа
 * @param array $cart массив корзины 
 * @return boolean TRUE в случае успешного добавления в БД
 */
function setPurchaseForOrder($db, $orderId, $cart)
{
	$sql = "INSERT INTO `purchase` (order_id, product_id, price, amount) VALUES ";
	
	$values = array();
	// формируем массив строк для запроса для каждого товара
	foreach ($cart as $item) 
		$values[] = "('{$orderId}', '{$item['id']}', '{$item['price']}', '{$item['cnt']}')";
	
	// преобразовываем массив в строку
	$sql .= implode($values, ', ');
    $rs = mysqli_query($db, $sql); 
   
	return $rs; 
}


function getPurchaseForOrder($db, $orderId)
{
    $sql = "SELECT `purchase`.*, `products`.`name` 
            FROM `purchase` 
            JOIN `products` ON purchase.product_id = products.id
            WHERE purchase.order_id = {$orderId}";
   
    $rs = mysqli_query($db, $sql);
    return createSmartyRsArray($rs); 
}



function totalEarned($db){
	$rs = mysqli_query($db, "SELECT * FROM `purchase`");
	$totalEarned = 0;

	while($row = mysqli_fetch_assoc($rs))
		$totalEarned += $row['price'] * $row['amount'];

	return $totalEarned;
}

function soldProd($db){
	$rs = mysqli_query($db, "SELECT `amount` FROM `purchase`");
	$count = 0;

	while($row = mysqli_fetch_assoc($rs)){
		$count += intval($row['amount']);
	}

	return $count;
}