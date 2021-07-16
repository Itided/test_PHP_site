function addToCart(itemId){
	var postData = {};
	try{
		var n = document.getElementById("frame").options.selectedIndex;
		var nn = document.getElementById("frame").options[n].value;
		postData['frame'] = nn;
		n = document.getElementById("color").options.selectedIndex;
		nn = document.getElementById("color").options[n].value;
		postData['color'] = nn;
		
	}catch{}
	console.log(postData);

	$.ajax({
		type: 'POST',
		async: true,
		url: "../../../www/cart/addtocart/" + itemId + '/',
		data: postData,
		dataType: 'json',
		success: function(data){
			if(data['success']){
				$('#cartCntItems').html(data['cntItems']);
				
				$('#addCart_' + itemId).hide();
				$('#removeCart_' + itemId).show();
			}
		}
	});
}

function removeFromCart(itemId){
	console.log("js - removeFromCart()");
	$.ajax({
		type: 'POST',
		async: true,
		url: "../../../www/cart/removefromcart/" + itemId + '/',
		dataType: 'json',
		success: function(data){
			if(data['success']){
				$('#cartCntItems').html(data['cntItems']);
				
				$('#addCart_' + itemId).show();
				$('#removeCart_' + itemId).hide();
			}
		}
	});
}

function conversionTotalPrice(){
	var sum = 0;
	var hData = {};

	var delivery = document.getElementsByName('delivery');
	var inst = document.getElementsByName('inst');
	var countProd = document.getElementsByClassName('prod');
	var realPrices = document.getElementsByClassName('iRealPrice');

    if (delivery[0].checked) {
    	sum += 300 * countProd.length;
    	hData['delivery'] = 300 * countProd.length;
    }

    if (inst[0].checked) {
    	sum += 100 * countProd.length;
    	hData['inst'] = 100 * countProd.length;
    }

    for (var i = 0; i < countProd.length; i++) {
    	sum += parseInt(realPrices[i].innerHTML);
    }

	$('#Price').html(sum);

	hData['price'] = sum;

	return hData;
}

function conversionPrice(itemId){
	var newCnt = $('#itemCnt_' + itemId).val();
	var itemPrice = $('#itemPrice_' + itemId).attr('value');
	var itemRealPrice = newCnt * itemPrice;

	$('#itemRealPrice_' + itemId).html(itemRealPrice);

	conversionTotalPrice();
}

function doOrder(){
	var postData = getData('#ooFrm');
	postData = Object.assign(postData, conversionTotalPrice());
	var pay = document.getElementsByClassName('pay');
    if (pay[1].checked) 
    	postData['pay'] = 1;

	$.ajax({
        type: 'POST',
        async: true,
        url: '/www/cart/doorder/',
        data: postData,
		dataType: 'json',
        success: function(data) {
        	if(data['success'])
            	location.replace('/www/cart/order/'); 
        }
    });
}

function getData(obj_form){
	var hData = {};
	$('input, textarea, select', obj_form).each(function(){
		if(this.name && this.name!=''){
			hData[this.name] = this.value;
			console.log('hData[' + this.name + '] = ' + hData[this.name]);
		}
	});
	return hData;
}

function registerNewUser(){
	var postData = getData('#registerBox');

	$.ajax({
		type: 'POST',
		async: true,
		url: "/www/user/register/",
		data: postData,
		dataType: 'json',
		success: function(data){
			if(data['success']){
				alert(data['message']);

			  //блок в левом столбце
				$('#registerBox').hide();
				
				$('#userLink').attr('href', '/www/user/');
				$('#userLink').html(data['userName']);
				$('#loginBox').hide();
				$('#userBox').show();
			  //

				//страница заказа
				$('#loginBox').hide();
				$('#btnSaveOrder').show();

				location.reload(true); //to display #orderUserInfoBox 
			}
			else{
				alert(data['message']);
			}
		}
	});
}

function logout() {
    console.log('Logout');
    $.ajax({
        type: 'POST',
        async: true,
        url: '/www/user/logout/',
        success: function() {
            console.log('user logged out');
            $('#registerBox').show();
            $('#userBox').hide();
        }
    });
}

function login(){
	var email = $('#loginEmail').val();
    var pwd   = $('#loginPwd').val();
    
    var postData = "email=" + email + "&pwd=" + pwd;
    
     $.ajax({
		type: 'POST',
		async: true,
		url: "/www/user/login/",
        data: postData,
		dataType: 'json',
		success: function(data){
			if(data['success']){
                $('#registerBox').hide();
                $('#loginBox').hide();
                
                $('#userLink').attr('href', '/www/user/');    
                $('#userLink').html(data['displayName']);
                $('#userBox').show();

				//> заполняем поля на странице заказа
				$('#name').val(data['name']);
				$('#phone').val(data['phone']);
				$('#address').val(data['address']);
				//<
				
				$('#btnSaveOrder').show();
				location.reload(true); //to display #orderUserInfoBox 
			} 
			else{
					if(data['admin']){
						alert(data['message']);
		                location.replace('/www/admin/');    
					}
					else
						alert(data['message']);
				}  
		}
            
            
	}); 
}

function showRegisterBox(){
	if($("#registerBoxHidden").css('display') != 'block') 
		$("#registerBoxHidden").show();
	else 
		$("#registerBoxHidden").hide();
}

function updateUserData(){
	console.log("js - updateUserData()");
    var phone  = $('#newPhone').val();
    var address = $('#newAdress').val();
    var pwd1   = $('#newPwd1').val();
    var pwd2   = $('#newPwd2').val();
    var curPwd = $('#curPwd').val();
	var name   = $('#newName').val();
    
	var postData = {phone: phone, 
					address: address, 
					pwd1: pwd1, 
					pwd2: pwd2, 
					curPwd: curPwd,
					name: name};
				
	$.ajax({
		type: 'POST',
		async: true,
		url: "/www/user/update/",
        data: postData,
		dataType: 'json',
		success: function(data){
			if(data['success']){
                $('#userLink').html(data['userName']);
				alert(data['message']);
			} else {
				alert(data['message']);
            }
		}
	}); 
  }

  function saveOrder(){
	var postData = getData('form'); //or getData('frmOrder');
	 $.ajax({
		type: 'POST',
		async: true,
		url: "/www/cart/saveorder/",
        data: postData,
		dataType: 'json',
		success: function(data){
			if(data['success']){
				alert(data['message']);
				document.location = '/www/user/';
			} else {
				alert(data['message']);
            }
		}
	 });
}

function showProducts(id){
	var objName = "#purchasesForOrderId_" + id;
	if( $(objName).css('display') != 'table-row' ) { //if hidden
		$(objName).show();
	} else {
		$(objName).hide();
	}
}