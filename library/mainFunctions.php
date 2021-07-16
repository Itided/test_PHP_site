<?php


function loadPage($smarty, $db, $controllerName, $actionName = 'index'){
	include_once PathPrefix . $controllerName . PathPostfix;

	$function = $actionName . 'Action';
	$function($smarty, $db);
}

//Преобразование результата работы выборки(SELECT) в ассоциативный массив
function createSmartyRsArray($rs){
	if(!rs) 
		return fasle;

	$smartyRs = array();
	while($row = mysqli_fetch_assoc($rs))
		$smartyRs[] = $row;

	return $smartyRs; 
}


function loadTemplate($smarty, $templateName){
	$smarty->display($templateName . TemplatePostfix);
}

function redirect($url){
	if(!$url)
		$url = '/';
	header("Location: {$url}");
	exit;
}

function debug($value=null, $die=1, $count=0){
	while($count>0){
		echo 'Debug: <br/><pre>';
		print_r($value);
		echo '</pre>';
		$t = 1;
		--$count;
	}
	if($t)
		die;
	echo 'Debug: <br/><pre>';
	print_r($value);
	echo '</pre>';
	if($die)
		die;
}
