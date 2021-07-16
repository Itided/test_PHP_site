{*cart page*}

	<h1>Корзина</h1>

	{if !$rsProducts}
		<br/><br/><br/><br/><h2 style="color:red">В корзине пусто!</h2><br/>
	{else}
		<table border="2" style="margin-left: 300px; margin-bottom: 50px;">
			<caption style="caption-side: initial; text-align: center;">Наши услуги</caption>
			<tr>
				<th>Название услуги</th>
				<th>Цена</th>
				<th>Добавить в заказ</th>
			</tr>
			<tr>
				<td>Доставка</td>
				<td>300 грн за один товар</td>
				<td align="center"><input onchange="conversionTotalPrice();" type="checkbox" name="delivery" id="delivery" value=""></td>
			</tr>
			<tr>
				<td>Сборка + установка</td>
				<td>100 грн за один товар</td>
				<td align="center"><input onchange="conversionTotalPrice();" type="checkbox" name="inst" id="inst" value=""></td>
			</tr>
		</table>

		<table style="margin-left: 300px;">
			<caption style="caption-side: initial; text-align: center;">Способ оплаты</caption>
			<tr>
				<th>Наличный</th>
				<th>&nbsp;&nbsp;&nbsp;</th>
				<th>Безналичный</th>
			</tr>
			<tr>
				<td align="center"><input type="radio" name="pay" class="pay" value="0" checked></td>
				<td>&nbsp;&nbsp;&nbsp;</td>
				<td align="center"><input type="radio" name="pay" value="1" class="pay"></td>
			</tr>
		</table>

		<div align="center"><h2>Данные заказа:</h2></div>
		<table id="ooFrm">
			<tr>
				<td>№</td>
				<td>Наименование</td>
				<td>Колличество</td>
				<td>Цена за единицу</td>
				<td>Цена</td>
				<td>Действие</td>
			</tr>
			{foreach $rsProducts as $item name=products}
				<tr class="prod">
					<td>{$smarty.foreach.products.iteration}</td>

					<td><a href="../product/{$item['id']}/">{$item['name']}</a></td>

					<td><input name="itemCnt_{$item['id']}" id="itemCnt_{$item['id']}" type="text" value="1" onchange="conversionPrice({$item['id']});"/></td>

					<td>
						<span id="itemPrice_{$item['id']}" value="{$item['price']}">
							{$item['price']}
						</span> грн
					</td>

					<td>
						<span id="itemRealPrice_{$item['id']}" value="{$item['price']}" class="iRealPrice">
							{$item['price']}
						</span> грн
					</td>

					<td>
						<a id="removeCart_{$item['id']}" href="#" onClick="removeFromCart({$item['id']}); return false;" title="Удалить из корзины">Удалить</a>
						<a id="addCart_{$item['id']}" class="hideme" href="#" onClick="addToCart({$item['id']}); return false;" title="Восстановить элемент">Восстановить</a>
					</td>
				</tr>
			{/foreach}
			<tr>
				<td style="text-align: center; padding-top: 20px;" colspan="3"><input type="submit" value="Оформить заказ" onclick="doOrder();" /></td>
				<td colspan="1" style="vertical-align: bottom;">Цена: <span id="Price" style="font-size: 20px; color: red;">130</span> грн</td>
			</tr>
		</table>
		<script>
			$(document).ready (function(){ conversionTotalPrice() });
		</script>
	{/if}
