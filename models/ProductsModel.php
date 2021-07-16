<?php //model for products

function getLastProducts($db, $limit = null){
	$sql = "SELECT * FROM `products` ORDER BY `id` DESC";

	if($limit)
		$sql .= " LIMIT {$limit}";

	$rs = mysqli_query($db, $sql);
	
	return createSmartyRsArray($rs);
}

function getProductsByCat($db, $itemId){
	$itemId = intval($itemId);
	$sql = "SELECT * FROM `products` WHERE `category_id` = '{$itemId}'";
	$rs = mysqli_query($db, $sql);

	return createSmartyRsArray($rs);
}

function getProductById($db, $itemId){
	$itemId = intval($itemId);
	$sql = "SELECT * FROM `products` WHERE `id` = '{$itemId}'";
	$rs = mysqli_query($db, $sql);
	
	return mysqli_fetch_assoc($rs);
}

function getProductsFromArray($db, $itemsIds){
	$strIds = implode(', ', array_keys($itemsIds));
	$sql = "SELECT * FROM `products` WHERE `id` in ({$strIds})";
	$rs = mysqli_query($db, $sql);

	return createSmartyRsArray($rs);
}

function getProducts($db){
	$sql = "SELECT * FROM `products` ORDER BY `category_id`";
	$rs = mysqli_query($db, $sql);

	return createSmartyRsArray($rs);
}

function insertProduct($db, $itemName, $itemPrice, $itemDesc, $itemCat){
	$sql = "INSERT INTO `products` SET  `name` = '{$itemName}', 
										`price` = '{$itemPrice}', 
										`description` = '{$itemDesc}',
										`category_id` = '{$itemCat}'";								
	$rs = mysqli_query($db, $sql);
	return $rs;
}

function updateProduct($db, $itemId, $itemName, $itemPrice, $itemStatus, 
								$itemDesc, $itemCat, $newFileName=null){
	$set=array();

	if($itemName)
		$set[] = "`name` = '{$itemName}'";
	if($itemPrice > 0)
		$set[] = "`price` = '{$itemPrice}'";
	if($itemStatus !== null)
		$set[] = "`status` = '{$itemStatus}'";
	if($itemDesc)
		$set[] = "`description` = '{$itemDesc}'";
	if($itemCat)
		$set[] = "`category_id` = '{$itemCat}'";
	if($newFileName)
		$set[] = "`image` = '{$newFileName}'";

	$setStr = implode($set, ", ");
	
	$sql = "UPDATE `products` SET {$setStr} WHERE `id` = '{$itemId}'";
	$rs = mysqli_query($db, $sql);

	return $rs;
}

function updateProductImage($db, $itemId, $newFileName){
	$rs = updateProduct($db, $itemId, null, null, null, null, null, $newFileName);
	return $rs;
}

function isBike($db, $rsProduct){
	$sql = "SELECT `parent_id` FROM `categories` WHERE id = '{$rsProduct['category_id']}'";

	$rs = mysqli_query($db, $sql);
	$rs = mysqli_fetch_assoc($rs);

	$sql = "SELECT `name` FROM `categories` WHERE id = '{$rs['parent_id']}'";
	$rs = mysqli_query($db, $sql);
	$rs = mysqli_fetch_assoc($rs);
	if($rs['name'] === 'Велосипеды')
		return true;
	return false;
}

function setBikeFeatures($db, $order_id, $item){
	$sql = "INSERT INTO `bike_features` SET  `order_id` = '{$order_id}',
										`product_id` = '{$item['id']}', 
										`type` = '{$item['type']}', 
										`frame` = '{$item['frame']}',
										`color` = '{$item['color']}'";
	//debug($sql, 0);														
	$rs = mysqli_query($db, $sql);
	return $rs;
}

function getTypee($db, $rsProduct){
	$sql = "SELECT `name` FROM `categories` WHERE id = '{$rsProduct['category_id']}'";
	$rs = mysqli_query($db, $sql);
	$rs = mysqli_fetch_assoc($rs)['name'];
	return $rs;
}

function getTypeById($db, $id){
	$sql = "SELECT `category_id` FROM `products` WHERE id = '{$id}'";

	$rs = mysqli_query($db, $sql);
	$rs = mysqli_fetch_assoc($rs)['category_id'];

	$sql = "SELECT `name` FROM `categories` WHERE id = '{$rs}'";
	$rs = mysqli_query($db, $sql);
	$rs = mysqli_fetch_assoc($rs)['name'];

	return $rs;
}

function getFrames($db){
	$sql = "SHOW COLUMNS FROM bike_features WHERE field = 'frame'";

	$rs = createSmartyRsArray(mysqli_query($db, $sql));

	$segments = str_replace("'", "", $rs[0]['Type']); 
	$segments = str_replace("enum", "", $segments); 
	$segments = str_replace("(", "", $segments); 
	$segments = str_replace(")", "", $segments); 
	$segmentList = explode(',', $segments);
	return $segmentList;
}


function getColors($db){
	$sql = "SHOW COLUMNS FROM bike_features WHERE field = 'color'";

	$rs = createSmartyRsArray(mysqli_query($db, $sql));

	$segments = str_replace("'", "", $rs[0]['Type']); 
	$segments = str_replace("enum", "", $segments); 
	$segments = str_replace("(", "", $segments); 
	$segments = str_replace(")", "", $segments); 
	$segmentList = explode(',', $segments);
	return $segmentList;
}