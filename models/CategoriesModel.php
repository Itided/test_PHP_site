<?php 

function getChildrenForCat($db, $catId){
	$sql = "SELECT * FROM `categories` WHERE `parent_id` = '{$catId}' ORDER BY id DESC";
	$rs = mysqli_query($db, $sql);

	return createSmartyRsArray($rs); 
}

function getAllMainCatsWithChildren($db){
	$sql = "SELECT * FROM `categories` WHERE `parent_id` = 0 ORDER BY id DESC";

	$rs = mysqli_query($db, $sql); //record set - набор записей


	$smartyRs = array();
	while($row = mysqli_fetch_assoc($rs)){

		$rsChildren = getChildrenForCat($db, $row['id']);

		if($rsChildren)
			$row['children'] = $rsChildren;
		$smartyRs[] = $row;
	}

	return $smartyRs; 
}

function getCatById($db, $catId){
	$catId = intval($catId);
	$sql = "SELECT * FROM `categories` WHERE `id` = '{$catId}'";
	$rs = mysqli_query($db, $sql);

	return mysqli_fetch_assoc($rs);
}

function getAllMainCategories($db){
	$sql = "SELECT * FROM `categories` WHERE `parent_id` = 0";
	$rs = mysqli_query($db, $sql);

	return createSmartyRsArray($rs);
}

function getAllCategories($db){
	$sql = "SELECT * FROM `categories` ORDER BY `parent_id` ASC";
	$rs = mysqli_query($db, $sql);

	return createSmartyRsArray($rs);
}

function insertCat($db, $catName, $carParentId=0){
	$sql = "INSERT INTO `categories`(`parent_id`, `name`) VALUES ('{$carParentId}', '{$catName}')";

	mysqli_query($db, $sql);
	$id = mysqli_insert_id($db);

	return $id;
}

function updateCategoryData($db, $itemId, $parentId=-1, $newName=''){
	$set = array();

	if($newName)
		$set[] = "`name` = '{$newName}'";
	if($parentId > -1)
		$set[] = "`parent_id` = '{$parentId}'";
	
	$setStr = implode($set, ", ");
	
	$sql = "UPDATE `categories` SET {$setStr} WHERE `id` = '{$itemId}'";
	$rs = mysqli_query($db, $sql);

	return $rs;
}