<div align="center"><h2 style="color:red">Панель администратора</h2></div><br/>
<style>
	td,th{
		white-space: nowrap;
	}
</style>
<div align="center" style='padding-left:170px;'><h3 style="color:green">Статистика</h3>
	<table id="tStat">
		<tbody>
		<tr>
			<td>Количество зарег пользователей</td>
			<th>{$statistics['users']}</th>
		</tr>
		<tr>
			<td>Количество продуктов на сайте</td>
			<th>{$statistics['products']}</th>
		</tr>
		<tr>
			<td>Количество проданных товаров</td>
			<th>{$statistics['orders']}</th>
		</tr>
		<tr>
			<td>Всего заработано денег</td>
			<th>{$statistics['earned']} грн</th>
		</tr>
		</tbody>
	</table>
</div>