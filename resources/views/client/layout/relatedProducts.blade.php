    <div class="row">
        @foreach ($relatedProducts as $product)
            <div class="col-lg-3">
                @include('client.product.product',[
                    'product' => $product
                ])
            </div>
        @endforeach
    </div>



