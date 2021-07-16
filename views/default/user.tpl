{* страница пользователя *}
<style>
    .ord td{
        color: black;
    }
        tr:hover{
        background: unset !important;
    }
    .ord tr, td, th{
        white-space: nowrap;
    }
    tr, td, th{
        text-align: center;
    }
</style>
<h1>Ваши регистрационные даные:</h1>
<table border="0">
        <tr>
            <td>Логин (email)</td>
            <td>{$arUser['email']}</td>
        </tr>
        <tr>
            <td>Имя</td>
            <td><input type="text" id="newName" value="{$arUser['name']}"/></td>
        </tr>
        <tr>
            <td>Тел</td>
            <td><input type="text" id="newPhone" value="{$arUser['phone']}"/></td>
        </tr>
        <tr>
            <td>Адрес</td>
            <td><textarea style="width: 167px;" id="newAdress"/>{$arUser['address']}</textarea></td>
        </tr>
        <tr>
            <td>Новый пароль</td>
            <td><input type="password" id="newPwd1" value=""/></td>
        </tr>
        <tr>
            <td>Повтор пароля</td>
            <td><input type="password" id="newPwd2" value=""/></td>
        </tr>
        <tr>
            <td>Для того чтобы сохранить данные введите текущий пароль: </td>
            <td><input type="password" id="curPwd" value=""/></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="button" value="Сохранить изменения" onClick="updateUserData();"/></td>
        </tr>
</table>
		
<h2>Заказы:</h2>
{if !$rsUserOrders}
    Нет заказов
{else}
    <table border="3" cellpadding="1" cellspacing="1" class="ord">
        <tr>
            <th>№</th>
            <th>Действие</th>
            <th>ID заказа</th>
            <th>Статус</th>
            <th>Дата создания</th>
            <th>Дата оплаты</th>
            <th>Информация</th>
            <th style="text-align: center !important;">Уникальный ID чека</th>
        </tr>
        {foreach $rsUserOrders as $item name=orders}
            <tr>
                <td>{$smarty.foreach.orders.iteration}</td>
                <td nowrap><a href="#" onclick="showProducts('{$item['id']}'); return false;" >Показать заказ</a></td>
                <td align="center">{$item['id']}</td>
                <td align="center" style="color: red; margin-top: -20px; padding-top: 50px;">
                    {if $item['status'] == 1}Оплачен{else}Не оплачен{/if}
                </td>
                <td>{$item['date_created']}</td>
                <td align="center">{$item['date_payment']}&nbsp;</td>
                <td nowrap align="center">{$item['comment']}</td>
                <td>{md5($item['id'])}</td>
            </tr>
			
			<tr class="hideme" id="purchasesForOrderId_{$item['id']}" >
                <td colspan="8">
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
							<td align="center">{$itemChild['product_id']}</td>
							<td align="center"><a href="/www/product/{$itemChild['product_id']}/">{$itemChild['name']}</a></td>
                            <td align="center">{$itemChild['price']} грн</td>
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