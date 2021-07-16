<h2>Категории</h2>

<div id="blockNewCategory">
	Новая категория:
	<input type="text" name="newCategoryName" value=""/><br />
	Является подкатегорией для
	<select name="generalCatId">
		<option value="0">Главная Категория
			{foreach $rsCategories as $item}
				<option value="{$item['id']}">{$item['name']}</option>
			{/foreach}
		</option>
	</select><br />
	<input type="button" onclick="newCategory();" value="Добавить категорию"/>
</div><br /><br />

<table border="1", cellpadding="1", cellspacing="1">
	<tr>
		<th>№</th>
		<th>ID</th>
		<th>Название</th>
		<th>Родительская категория</th>
		<th>Действие</th>
	</tr>
	{foreach $rsCategories as $item name=categories}
		<tr>
			<td>{$smarty.foreach.categories.iteration}</td>
			<td align="center">{$item['id']}</td>
			<td><input type="edit" id="itemName_{$item['id']}" value="{$item['name']}"></td>
			<td>
				<select id="parentId_{$item['id']}">
					<option value="0">Главная Категория</option>
					{foreach $rsMainCategories as $mainItem}
						<option value="{$mainItem['id']}"
							{if $item['parent_id'] == $mainItem['id']}selected{/if}>
							{$mainItem['name']}
						</option>
					{/foreach}
				</select>
			</td>
			<td>
				<input type="button" style="width: 100%; height: 30px;" value="Сохранить" onclick="updateCat({$item['id']});">
				<input type="button" style="height: 30px; cursor: crosshair"value="Удалить категорию с её товарами" onclick=";">
			</td>
		</tr>
	{/foreach}
</table>