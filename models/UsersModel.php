<?php

function registerNewUser($db, $email, $pwdMD5, $name, $phone, $address){
	$email = htmlspecialchars(mysqli_real_escape_string($db, $email));
	$name = htmlspecialchars(mysqli_real_escape_string($db, $name));
	$phone = htmlspecialchars(mysqli_real_escape_string($db, $phone));
	$address = htmlspecialchars(mysqli_real_escape_string($db, $address));

	$sql = "INSERT INTO `users` (`email`, `pwd`, `name`, `phone`, `address`) VALUES ('{$email}', '{$pwdMD5}', '{$name}', '{$phone}', '{$address}')";
	
	$rs = mysqli_query($db, $sql);

	if($rs){
		$sql = "SELECT * FROM `users` WHERE (`email` = '{$email}' and `pwd` = '{$pwdMD5}') LIMIT 1";

		$rs = mysqli_query($db, $sql);
		$rs = createSmartyRsArray($rs);

		if(isset($rs[0]))
			$rs['success'] = 1;
		else
			$rs['success'] = 0;
	}
	else
		$rs['success'] = 0;
	
	
	return $rs;
}

function checkRegisterParams($email, $pwd1, $pwd2){
	$res = null;

	if(!$email){
		$res['success'] = false;
		$res['message'] = 'Введите email';
	}
	if(!$pwd1){
		$res['success'] = false;
		$res['message'] = 'Введите пароль';
	}
	if(!$pwd2){
		$res['success'] = false;
		$res['message'] = 'Введите повтор пароль';
	}

	if($pwd1 != $pwd2){
		$res['success'] = false;
		$res['message'] = 'Пароли не совпадают';
	}
	
	return $res;
}

function checkUserEmail($db, $email){
	$email = mysqli_real_escape_string($db, $email);
	
	$sql = "SELECT `id` FROM `users` WHERE `email` = '{$email}'";

	$rs = mysqli_query($db, $sql);
	$rs = createSmartyRsArray($rs);

	return $rs;
}

function loginUser($db, $email, $pwd)
{
    $email = htmlspecialchars(mysqli_real_escape_string($db, $email));
    $pwd = md5($pwd);
    
    $sql = "SELECT * FROM `users`  
            WHERE (`email` = '{$email}' and `pwd` = '{$pwd}')
            LIMIT 1";

    $rs = mysqli_query($db, $sql); 
  
    $rs = createSmartyRsArray($rs);
    if(isset($rs[0]))
       $rs['success'] = 1;
    else 
	   $rs['success'] = 0;

    
    return $rs;
}

function updateUserData($db, $name, $phone, $address, $pwd1, $pwd2, $curPwd)
{
   	$email   = htmlspecialchars(mysqli_real_escape_string($db, $_SESSION['user']['email']));
   	$name    = htmlspecialchars(mysqli_real_escape_string($db, $name));
   	$phone   = htmlspecialchars(mysqli_real_escape_string($db, $phone));
   	$address  = htmlspecialchars(mysqli_real_escape_string($db, $address));
   	$pwd1 = trim($pwd1);
   	$pwd2 = trim($pwd2);
   
   	$newPwd = null;
   	if( $pwd1 && ($pwd1 == $pwd2) )
	   $newPwd = md5($pwd1);
   
   
   	$sql = "UPDATE users SET ";
   
   	if($newPwd)
	   $sql .= "`pwd` = '{$newPwd}', ";
   
   
   	$sql .= " `name` = '{$name}', `phone` = '{$phone}', `address` = '{$address}' WHERE 
            `email` = '{$email}' AND `pwd` = '{$curPwd}' LIMIT 1";

   	$rs = mysqli_query($db, $sql); 	
	return $rs;
}

function getCurUserOrders($db)
{
	$userId = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : 0;
	$rs = getOrdersWithProductsByUser($db, $userId);
	
	return $rs;
}

function checkForSuperUser($db, $email, $pwd){
	$db_temp = $db;
	$link = @mysqli_connect("localhost", $email, $pwd);
	if($link)
		return true;
	return false;
}
