<div id="leftColumn"> 
	<div id="leftMenu">
		<div class="menuCaption">Меню</div>
			{foreach $rsCategories as $item}
				<a href='/www/category/{$item['id']}/'>{$item['name']}</a><br />

				{if isset($item['children'])}
					{foreach $item['children'] as $chItem}
						<a class="aChild" href='/www/category/{$chItem['id']}/'>{$chItem['name']}</a><br />
					{/foreach}
				{/if}
			{/foreach}
	</div>
</div>
<div class="" style="position: absolute; right: 30px; top: 100px; z-index: 1;">
	{if isset($arUser)}
		<div id="userBox">
			<a style="color: red; font-size: 20px;" href="/www/user/" id="userLink">{$arUser['displayName']}</a><br />
			<a href="/www/user/logout/" onclick="logout();">Выход</a>
		</div>
	{else}
		<div id="userBox" class="hideme">
			<a href="#" id="userLink"></a><br />
			<a href="/www/user/logout/" onclick="logout();">Выход</a>
		</div>
	
		{if !isset($hideLoginBox)}
			<div id="loginBox">
				<div class="menuCaption">Авторизация</div>
				<input type="text" id="loginEmail" name="loginEmail" value=""/><br />
				<input type="password" id="loginPwd" name="loginPwd" value=""/><br />
				<input type="button" onclick="login();" value="Войти"/>
			</div>

			<div id="registerBox">
				<div class="menuCaption showHidden" onclick="showRegisterBox();">Регистрация</div>
				<div id="registerBoxHidden">
					email:<br />
					<input type="text" id="email" name="email" value=""><br />
					пароль:<br />
					<input type="password" id="pwd1" name="pwd1" value=""><br />
					повторить пароль:<br />
					<input type="password" id="pwd2" name="pwd2" value=""><br />
					<input type="button" onclick="registerNewUser();" value="Зарегестрироваться"><br />
				</div>
			</div>
		{/if}
	{/if}
</div>