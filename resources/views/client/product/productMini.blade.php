<div class="product-thumb clearfix">
    <div class="image">
        <a href="{{route('client.product.show',$product)}}">
            <img src="{{str_replace('public','/storage',$product->image)}}"
            alt="{{$product->name}} " title="{{$product->name}}" data-toggle="tooltip" width="100" class="img-responsive" />
        </a>
    </div>
    <div>
        <div class="caption">
            <h4><a href="{{route('client.product.show',$product)}}"> {{$product->name}} </a></h4>
            <p class="price">
                <span class="price-new">{{$product->cost_with_discount}} تومان   </span>&nbsp;&nbsp;&nbsp;
                @if ($product->offer > 0)
                    <span class="price-old">{{$product->price}} تومان</span>
                    <span class="saving">-{{$product->offer}}%</span>
                @endif
            </p>
        </div>
    </div>
</div>
