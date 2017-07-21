<div class="product-list product-list-default">
    <div class="product-list-body">
@foreach ($products as $product)
    <div class="product">
        <div class="product-image"></div>
        <div class="product-new"></div>
        <div class="product-promo"></div>
        <h3>{{ $product->name }}</h3>
    </div>
@endforeach
    </div>
</div>