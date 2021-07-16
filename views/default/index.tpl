
<div class="container">
        <div class="d-flex flex-wrap">
        {foreach $rsProducts as $item name=products}
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">
                        <a href="../www/product/{$item['id']}/">{$item['name']}</a>
                    </h4>
                </div>
                <div class="card-body">
                    <a href="../www/product/{$item['id']}/">
                        <img style="margin-left: 40px;" src="../www/images/products/{$item['image']}"/>
                    </a>
                    <a href="../www/product/{$item['id']}/" class="btn btn-lg btn-block btn-outline-primary"><span>{$item['price']} грн</span>
                    </a>
                </div>
            </div>
        {/foreach}
        </div>

</div>
