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

function newCategory(){
	var postData = getData('#blockNewCategory');

	$.ajax({
		type: 'POST',
		async: true,
		url: "/www/admin/addnewcat/",
        data: postData,
		dataType: 'json',
		success: function(data){
			if(data['success']){
				alert(data['message']);
				$('#newCategoryName').val('');
				location.reload(true);
			} else {
				alert(data['message']);
            }
		}
	}); 
}

function updateCat(itemId){
	var parentId = $('#parentId_' + itemId).val();
	var newName = $('#itemName_' + itemId).val();
	var postData = {itemId: itemId, parentId: parentId, newName: newName};

	$.ajax({
		type: 'POST',	
		async: true,
		url: "/www/admin/updatecategory/",
        data: postData,
		dataType: 'json',
		success: function(data){
				alert(data['message']);
				location.reload(true);
		}
	}); 
}

function displayImage(){
	function readURL(e) {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                $(reader).load(function(e) { 
                    $('#upload-img').attr('src', e.target.result); 
                    $("#upload-img").show();
                });
                reader.readAsDataURL(this.files[0]);
            }
        }
    $("#upload").change(readURL);
}


function updateProduct(itemId){
	var itemName = $('#itemName_' + itemId).val();
	var itemPrice = $('#itemPrice_' + itemId).val();
	var itemCatId = $('#itemCatId_' + itemId).val();
	var itemDesc = $('#itemDesc_' + itemId).val();
	var itemStatus = $('#itemStatus_' + itemId).attr('checked');

	if(!itemStatus){
		itemStatus = 1;
	}
	else{
		itemStatus = 0;
	}

	var postData = {itemId: itemId, itemName: itemName, itemPrice: itemPrice, 
								itemCatId: itemCatId, itemDesc: itemDesc, itemStatus: itemStatus};

	$.ajax({
		type: 'POST',	
		async: true,
		url: "/www/admin/updateproduct/",
        data: postData,
		dataType: 'json',
		success: function(data){
				alert(data['message']);
				location.reload(true);
		}
	});
}

function showDelProducts(){
	if (document.getElementById('showDeletedProducts').checked) {
		$('.delItems').show();
	}
	else {
		$('.delItems').hide();
	}
}

function showProducts(id){
	var objName = "#purchaseForOrderId_" + id;
	if( $(objName).css('display') != 'table-row' ) { //if hidden
		$(objName).show();
	} else {
		$(objName).hide();
	}
}

function updateDatePayment(itemId){
	var datePayment = $('#datePayment_' + itemId).val();

	var postData = {itemId: itemId, datePayment: datePayment};

	$.ajax({
		type: 'POST',	
		async: true,
		url: "/www/admin/setorderdatepayment/",
        data: postData,
		dataType: 'json',
		success: function(data){
			if(data['success']){
				alert(data['message']);
				location.reload(true);
			}
			else{
				alert(data['message']);
			}
		}
	});
}
