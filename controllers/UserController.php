<?php //controller product page (/product/2)

//include models
include_once '../models/CategoriesModel.php';
include_once '../models/UsersModel.php';
include_once '../models/OrdersModel.php';
include_once '../models/PurchaseModel.php';


//ajax регистрация пользователя. Инициализация сессионной переменной $_SESSION['user']
function registerAction($smarty, $db){
	$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
	$email = trim($email);
	
	$pwd1 = isset($_REQUEST['pwd1']) ? $_REQUEST['pwd1'] : null;
	$pwd2 = isset($_REQUEST['pwd2']) ? $_REQUEST['pwd2'] : null;

	$phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : null;
	$address = isset($_REQUEST['address']) ? $_REQUEST['address'] : null;
	$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
	$name = trim($name);

	$resData = null;
	$resData = checkRegisterParams($email, $pwd1, $pwd2);
	
	if($resData || checkUserEmail($db, $email) || checkForSuperUser($db, $email, $pwd1)==true){
		$resData['success'] = false;
		$resData['message'] = "User with this email - '{$email}' already registered";
	}
	
	if(!$resData){
		$pwdMD5 = md5($pwd1);

		$userData = registerNewUser($db, $email, $pwdMD5, $name, $phone, $address);
		
		if($userData['success']){
			$resData['message'] = "User successfully registered";
			$resData['success'] = 1;
			
			$userData = $userData[0];
			$resData['userName'] = $userData['name'] ? $userData['name'] : $userData['email'];
			$resData['userEmail'] = $email;

			$_SESSION['user'] = $userData;
			$_SESSION['user']['displayName'] = $userData['name'] ? $userData['name'] : $userData['email'];
		}
		else{
			$resData['message'] = "Registration error";
			$resData['success'] = 0;
		}

	}
	echo json_encode($resData);
}

function logoutAction(){
	if(isset($_SESSION['user'])){
		unset($_SESSION['user']);
		unset($_SESSION['cart']);
	}

	redirect('/');
}

function loginAction($smarty, $db){
	$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $email = trim($email);
    
    $pwd = isset($_REQUEST['pwd']) ? $_REQUEST['pwd'] : null;
    $pwd = trim($pwd);
	
	$userData = loginUser($db, $email, $pwd);
	
	if($userData['success']){
        $userData = $userData[0];

		$_SESSION['user'] = $userData;
		$_SESSION['user']['displayName'] = $userData['name'] ? $userData['name'] : $userData['email'];
		
		$resData = $_SESSION['user'];
		$rsUserOrders = getCurUserOrders($db);

		if(count($rsUserOrders) > 1){
			$_SESSION['user']['discount'] = 1;
			$smarty->assign('discount', 1);
		}
		$resData['success'] = 1;		
    } else {
    	if(checkForSuperUser($db, $email, $pwd)){
    		$_SESSION['admin'] = 1;
    		$db = mysqli_connect("localhost", $email, $pwd);
			mysqli_select_db($db, "furniture");
    		$resData['success'] = 0;
    		$resData['admin'] = 1;
    		$resData['message'] = 'Вы вошли как супер пользователь'; 
    		echo json_encode($resData);
    		return;
    	}
        $resData['success'] = 0; 
        $resData['message'] = 'Неверный логин или пароль'; 
    }
    
    echo json_encode($resData);
}

function indexAction($smarty, $db){
    // если пользователь не залогинен, то редирект на главную стрницу
	if(!isset($_SESSION['user']))
       redirect('/');
    
    
    // получаем список категорий для меню
    $rsCategories = getAllMainCatsWithChildren($db);
	
	// получаем список заказов пользователя
	$rsUserOrders = getCurUserOrders($db);

	if(isset($_SESSION['user']['discount']))
		$smarty->assign('discount', 1);
	
	//debug($rsUserOrders);
    $smarty->assign('pageTitle', 'Страница пользователя');
    $smarty->assign('rsCategories', $rsCategories);
	$smarty->assign('rsUserOrders', $rsUserOrders);
	
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'user');
    loadTemplate($smarty, 'footer');
}

function updateAction($smarty, $db){
	//> если пользователь не залогинен, то выходим
    if(!isset($_SESSION['user']))
       redirect('/');
	//<

	//> инициализация переменных
    $resData = array();
    $phone  = isset($_REQUEST['phone'])  ? $_REQUEST['phone']	: null;
    $address = isset($_REQUEST['address']) ? $_REQUEST['address']	: null;
    $name   = isset($_REQUEST['name'])   ? $_REQUEST['name']	: null;
	$pwd1	= isset($_REQUEST['pwd1'])	 ? $_REQUEST['pwd1']	: null;
    $pwd2	= isset($_REQUEST['pwd2'])	 ? $_REQUEST['pwd2']	: null;
	$curPwd = isset($_REQUEST['curPwd']) ? $_REQUEST['curPwd']	: null;
	//<
	
	// проверка правильности пароля (введенный и тот под которым залогинились)
	$curPwdMD5 = md5($curPwd);
	if(!$curPwd || ($_SESSION['user']['pwd'] != $curPwdMD5)){
		$resData['success'] = 0;
		$resData['message'] = 'Текущий пароль не верный';
		echo json_encode($resData);
		return false;
	}
	
	// обновление данных пользователя 
	$res = updateUserData($db, $name, $phone, $address, $pwd1, $pwd2, $curPwdMD5);
	if($res){
		$resData['success'] = 1;
		$resData['message'] = 'Данные сохранены';
		$resData['userName'] = $name;
		
		$_SESSION['user']['name']	= $name;
		$_SESSION['user']['phone']	= $phone;
		$_SESSION['user']['address'] = $address;
			
		$newPwd = $_SESSION['user']['pwd'];
		if( $pwd1 && ($pwd1 == $pwd2) )
			$newPwd = md5(trim($pwd1));
		

		$_SESSION['user']['pwd'] = $newPwd;
		$_SESSION['user']['displayName'] = $name ? $name : $_SESSION['user']['email'];
		
	} else {
		$resData['success'] = 0;
		$resData['message'] = 'Ошибка сохранения данных';
	}
	
	echo json_encode($resData);
}