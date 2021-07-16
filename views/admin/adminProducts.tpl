<h2>Товар</h2>
<table border="1", cellpadding="1", cellspacing="1">
	<caption>Добавить продукт</caption>
	<tr>
		<th>Название</th>
		<th>Цена</th>
		<th>Категория</th>
		<th>Описание</th>
		<th>Изображение</th>
		<th>Сохранить</th>
		<tr>
			<form action="/www/admin/addproduct/" method="post" enctype="multipart/form-data">
				<td><input type="edit" name="itemName" value=""></td>
				<td><input type="edit" name="itemPrice" value=""></td>
				<td>
					<select name="itemCatId">
						{foreach $rsCategories as $itemCat}
							{if $itemCat['parent_id']} == 3}
								<option value="{$itemCat['id']}">{$itemCat['name']}</option>
							{/if}
						{/foreach}
					</select>
				</td>
				<td><textarea name="itemDesc"></textarea></td>
				<td>	
					<img width="100" src="#" class="hideme" id="upload-img" alt="image" />
					<input type="file" name="filename" id="upload" onclick="displayImage();"><br>
				</td>
				<td><input type="submit" value="Сохранить"></td>
			</form>
		</tr>
	</tr>
</table><br>

<input type="checkbox" id="showDeletedProducts" onchange="showDelProducts();" value="Yes">Показывать удалённые продукты

<table border="1", cellpadding="1", cellspacing="1" style="margin-left: -100px;">
	<caption>Редактировать продукт</caption>
	<tr>
		<th>№</th>
		<th>ID</th>
		<th>Название</th>
		<th>Цена</th>
		<th>Категория</th>
		<th>Описание</th>
		<th>Удалить</th>
		<th>Изображение</th>
		<th>Сохранить</th>
		{foreach $rsProducts as $item name=products}
			{if $item['status'] == 1}
				<tr>
					<td>{$smarty.foreach.products.iteration}</td>
					<td align="center">{$item['id']}</td>
					<td><input type="edit" id="itemName_{$item['id']}" value="{$item['name']}"></td>
					<td><input type="edit" id="itemPrice_{$item['id']}" value="{$item['price']}"></td>
					<td>
						<select id="itemCatId_{$item['id']}">
							{foreach $rsCategories as $itemCat}
								{if $itemCat['parent_id']} == 3}
									<option value="{$itemCat['id']}"
										{if $item['category_id'] == $itemCat['id']}selected{/if}>
										{$itemCat['name']}
									</option>
								{/if}
							{/foreach}
						</select>
					</td>
					<td><textarea id="itemDesc_{$item['id']}">{$item['description']}</textarea></td>
					<td><input type="checkbox" id="itemStatus_{$item['id']}"></td>
					<td>	
						{if $item['image']}
							<img src="/www/images/products/{$item['image']}" width="70">
						{/if}
						<form action="/www/admin/upload/" method="post" enctype="multipart/form-data">
							<input type="file" name="filename"><br>
							<input type="hidden" name="itemId" value="{$item['id']}">
							<input type="submit" value="Загрузить"><br>
						</form>
					</td>
					<td><input type="button" value="Сохранить" onclick="updateProduct({$item['id']});"></td>
				</tr>
			{/if}	
		{/foreach}

		{foreach $rsProducts as $item name=products}
			{if $item['status'] == 0}
				<tr class="delItems">
					<td>{$smarty.foreach.products.iteration}</td>
					<td align="center">{$item['id']}</td>
					<td><input type="edit" id="itemName_{$item['id']}" value="{$item['name']}"></td>
					<td><input type="edit" id="itemPrice_{$item['id']}" value="{$item['price']}"></td>
					<td>
						<select id="itemCatId_{$item['id']}">
							{foreach $rsCategories as $itemCat}
								{if $itemCat['parent_id']} == 3}
									<option value="{$itemCat['id']}"
										{if $item['category_id'] == $itemCat['id']}selected{/if}>
										{$itemCat['name']}
									</option>
								{/if}
							{/foreach}
						</select>
					</td>
					<td><textarea id="itemDesc_{$item['id']}">{$item['description']}</textarea></td>
					<td><input type="checkbox" id="itemStatus_{$item['id']}"checked="checked"</td>
					<td>	
						{if $item['image']}
							<img src="/www/images/products/{$item['image']}" width="70">
						{/if}
						<form action="/www/admin/upload/" method="post" enctype="multipart/form-data">
							<input type="file" name="filename"><br>
							<input type="hidden" name="itemId" value="{$item['id']}">
							<input type="submit" value="Загрузить"><br>
						</form>
					</td>
					<td><input type="button" value="Сохранить" onclick="updateProduct({$item['id']});"></td>
				</tr>
			{/if}	
		{/foreach}
</table>