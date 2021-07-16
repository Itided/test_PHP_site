<h2>Заказы</h2>
{if !$rsOrders}
	<div align="center"><h2 style="color:red">Нет заказов!</h2><br/></div>
{else}
	<table border="1" cellpadding="1" cellspacing="1" style="margin-left: -30px;">
		<tr>
			<th>№</th>
			<th>Действие</th>
			<th>ID заказа</th>
			<th width="110">Статус</th>
			<th nowrap>Дата создания</th>
			<th>Дата оплаты</th>
			<th>Дополнительная информация</th>
			<th>Дата изменения заказа</th>
			<th style="text-align: center !important;">Уникальный ID чека</th>
		</tr>
		{foreach $rsOrders as $item name=orders}
			<tr>
				<td>{$smarty.foreach.orders.iteration}</td>

				<td><a href="#" onclick="showProducts('{$item['id']}'); return false;">
					Показать товар заказа</a>
				</td>

				<td align="center">{$item['id']}</td>

				<td>
					<p align="center">
						<input type="checkbox" style="width: 20px;height: 20px;" id="itemStatus_{$item['id']}" 
							{if $item['status']} checked="checked"{/if} disabled="disabled">Оплачен
					</p>
				</td>

				<td align="center">{$item['date_created']}</td>

				<td>
					<p align="center">
						<input id="datePayment_{$item['id']}" type="text" value="{$item['date_payment']}">
						<input type="button" value="Сохранить" onclick="updateDatePayment('{$item['id']}');">
					</p>
				</td>

				<td nowrap>{$item['comment']}</td>

				<td>{$item['date_modification']}</td>
				
				<td>{md5($item['id'])}</td>
			</tr>
			<tr class="hideme" id="purchaseForOrderId_{$item['id']}">
				<td colspan="9">
					{if $item['children']}
						<table border="1" cellpadding="1" cellspacing="1" width="100%">
							<tr>
								<th>№</th>
								<th>ID</th>
								<th>Название</th>
								<th>Цена</th>
								<th>Количество</th>
							</tr>
							{foreach $item['children'] as $itemChild name=products}
								<tr>
									<td>{$smarty.foreach.products.iteration}</td>

									<td align="center">{$itemChild['id']}</td>

									<td align="center">
										<a href="/www/product/{$itemChild['id']}/">{$itemChild['name']}</a>
									</td>

									<td align="center">{$itemChild['price']}</td>

									<td align="center">{$itemChild['amount']}</td>
								</tr>
							{/foreach}
						</table>
					{/if}
				</td>
			</tr>
		{/foreach}
	</table>
{/if}