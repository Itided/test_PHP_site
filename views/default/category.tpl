 {*Page of categories*}

	<div class="" style="margin-left: 140px; font-size: 20px; color: #a5a58e;">Сделайте два заказа и покупайте товары со скидкой!</div>
	<h1>Категории: {$rsCategory['name']}</h1>

	{if $rsProducts or $rsChildCats}
		<div class="d-flex flex-wrap">
			{foreach $rsProducts as $item name=products}
			    <div class="card mb-4 shadow-sm">
	                <div class="card-header">
	                    <h4 class="my-0 font-weight-normal"><a href="../www/product/{$item['id']}/">{$item['name']}</a></h4>
	                </div>
	                <div class="card-body">
	                    <a href="/www/product/{$item['id']}/">
	                        <img style="margin-left: 40px;" src="/www/images/products/{$item['image']}"/>
	                    </a>
	                    <a href="/www/product/{$item['id']}/">
		                    <button type="button" class="btn btn-lg btn-block btn-outline-primary">
		                        <span>{$item['price']} грн</span>
		                    </button>
	                    </a>
	                </div>
	            </div>
			{/foreach}
		</div>

		{foreach $rsChildCats as $item name=childCats}
			 <h2><a href="../www/category/{$item['id']}/">{$item['name']}</a></h2>
		{/foreach}
	{else}
		<br/><br/><br/><br/><div align="center"><h1 style="color:red">Товаров нет!</h1><br/></div>
	{/if}
