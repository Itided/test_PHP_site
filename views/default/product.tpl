{*product page*}
<link rel="stylesheet" href="https://loft-mebel.com.ua/themes/default-bootstrap/css/product.css?v=1.23" type="text/css" media="all" />
<link rel="stylesheet" href="https://sofino.ua/static/styles/style.css?v=18.52.07">
<style>
	.img-garant{
		position: absolute;
	    top: 144px;
    	left: 306px;
	    object-fit: contain;
	    width: 150px !important;
	}
	.product-params-descr{
		margin-top: 80px;
	}
	.product-params-descr .p-div{
		border: 1px solid;
	}
	.product-params-descr .p1{
		margin-right: 10px;
		border-right: 1px solid;
		padding-right: 3px;
	}
</style>
<h2>{$rsProduct['name']}</h2>

<img style="width: 575px; height: 575px; float: left;" src="../../../www/images/products/{$rsProduct['image']}">
{if $rsProduct['guarantee']}
	<img class="img-garant-product" src="/www/images/garantia-2-goda-umnyj-svet121928.gif" alt="">
{/if}
<div class="" style="display: inline-block; position: relative;">
		<span style="font-size: 30px; color: red;">{intval($rsProduct['price']/1000)}&nbsp;{$rsProduct['price']%1000}</span> грн<br>
	<br><br>
	<a id="removeCart_{$rsProduct['id']}" {if !$itemInCart} class="hideme"{/if} href="#" onClick="removeFromCart({$rsProduct['id']}); return false;" alt="Удалить из корзины">Удалить из корзины</a>
	<a id="addCart_{$rsProduct['id']}"{if $itemInCart} class="hideme"{/if} href="#" onClick="addToCart({$rsProduct['id']}); return false;" alt="Добавить в корзину">Добавить в корзину</a>
</div>

<p style="width: 630px;"><span style="display: block; text-align: center; margin-top: -90px;"> </span><br />{$rsProduct['description']}</p>