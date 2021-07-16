{* страница заказа *}

<style>
	.item{
		font-size: 18px;
    	font-family: cursive;
    	font-style: italic;
    	font-variant-caps: unicase;
	}
</style>

<h2>Данные заказа</h2>
<form id="frmOrder" action="/www/cart/saveorder/" method="POST">
	<table>
		<caption style="font-size: 20px; color: red;">
			Всего: 
			{$rsServ['price']} грн<br>
			{if $rsServ['delivery']} С нашей доставкой<br>{/if}
			{if $rsServ['inst']} С нашей сборкой и установкой<br>{/if}
		</caption>
		<tr>
	         <td>№</td>
	         <td>Наименование</td>
	         <td>Количество</td>
	         <td>Цена за еденицу</td>
	         <td>Стоимость</td>
	     </tr>
		 
		{foreach $rsProducts as $item name=products}
			<tr>
				<td>{$smarty.foreach.products.iteration}</td>
				<td><a href="/www/product/{$item['id']}/">{$item['name']}</a></td>
				<td align="center">  
					<span id="itemCnt_{$item['id']}">
					  <input type="hidden" name="itemCnt_{$item['id']}" value="{$item['cnt']}" /> 
						{$item['cnt']}
					</span>
				</td>
				<td>  
					<span id="itemPrice_{$item['id']}">
					   <input type="hidden" name="itemPrice_{$item['id']}" value="{$item['price']}" /> 
						{$item['price']} грн
				   </span>
				 </td>
				<td>  
					 <span id="itemRealPrice_{$item['id']}">
						 <input type="hidden" name="itemRealPrice_{$item['id']}" value="{$item['realPrice']}" /> 
						{$item['realPrice']} грн
					 </span>
				</td>
				{if $item['frame']}
					<tr>
						<td colspan="6">
							&#8195;Тип: <span class="item">{$item['type']}</span><br>
							&#8195;Подвеска: <span class="item">{$item['frame']}</span><br>
							&#8195;Цвет: <span class="item">{$item['color']}</span><br>
						</td>
					</tr>
				{/if}
			</tr>
		{/foreach}
	</table>

	{if isset($arUser)}
		{$buttonClass = ""}
		<h2>Данные заказчика</h2>
		<div id="orderUserInfoBox" {$buttonClass}>
			{$name = $arUser['name']}
			{$phone = $arUser['phone']}
			{$address = $arUser['address']}
			<table>
					<tr>
						<td>Имя*</td>
						<td><input type="text" id="name"   name="name"  value="{$name}" /></td>
					</tr>
					<tr>
						<td>Тел*</td>
						<td><input type="text" id="phone"  name="phone" value="{$phone}" /></td>
					</tr>
					<tr>
						<td>Адрес*</td>
						<td><textarea style="width: 167px;" id="address" name="address" />{$address}</textarea></td>
					</tr>
			</table>   
		</div>
	{else}	
		<div id="loginBox">
			<div class="menuCaption">Авторизация</div>
				<table>
				<tr>
					<td>Логин</td>
					<td><input type="text" id="loginEmail" name="loginEmail" value=""/></td>
				</tr>
				<tr>
					<td>Пароль</td>
					<td><input type="password" id="loginPwd" name="loginPwd" value=""/></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="button" onclick="login();" value="Войти"/></td>
				</tr>
				</table> 
		</div> 
		<div id="registerBox">или <br />
	            <div class="menuCaption">Регистрация нового пользователя:</div>
	            email* :<br />
	            <input type="text" id="email" name="email" value=""/><br />
	            пароль* : <br />
	            <input type="password" id="pwd1" name="pwd1" value=""/><br />
	            повторить пароль* :<br />
	            <input type="password" id="pwd2" name="pwd2" value=""/><br />

	            <table>
					<tr>
						<td>Имя*</td>
						<td><input type="text" id="name"   name="name"  value="" /></td>
					</tr>
					<tr>
						<td>Тел*</td>
						<td><input type="text" id="phone"  name="phone" value="" /></td>
					</tr>
					<tr>
						<td>Адрес*</td>
						<td><textarea style="width: 167px;" id="address" name="address" /></textarea></td>
					</tr>
				</table>

	            <input type="button" onclick="registerNewUser();" value="Зарегистрироваться"/>
	        </div>
		{$buttonClass = "class='hideme'"}
	{/if}
	<input {$buttonClass} id="btnSaveOrder" type="button" value="Оформить заказ" onclick="saveOrder();"/>
</form>