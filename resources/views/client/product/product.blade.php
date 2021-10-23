<div class="product-thumb">
    <div class="image">
        <a href="{{route('client.product.show',$product)}}">
            <img src="{{str_replace('public','/storage',$product->image)}}"
            alt="{{$product->name}} " title="{{$product->name}} " width="100" class="img-responsive" />
        </a>
    </div>
    <div>
    <div class="caption">
        <h4><a href="{{route('client.product.show',$product)}}"> {{$product->name}} </a></h4>
        <p class="price">
            <span class="price-new">{{$product->cost_with_discount}} تومان   </span>&nbsp;&nbsp;&nbsp;
            @if ($product->offer > 0)
                <span class="price-old" style="font-size: 19px">{{$product->price}} تومان</span>
                <span class="saving">-{{$product->offer}}%</span>
            @endif
        </p>
    </div>
    <div class="button-group">
        @auth
            <button class="btn btn-lg btn-primary" type="button"
            @if ($product->is_cart)
                onClick="addToCart({{$product->id }},1)"
            @else
                onClick="addToCart({{$product->id }},0)"
            @endif
            >
                <span id="basket-{{$product->id}}">
                    @if ($product->is_cart)
                    بروز رسانی سبد خرید
                    @else
                        افزودن به سبد خرید
                    @endif
                </span>
            </button>
        @else
            <a href="{{route('client.register.create')}}">
                <button class="btn-primary" type="button"
                ><span>افزودن به سبد</span></button>
            </a>
        @endauth
        <div class="add-to-links">
            @auth
                <button class="like-{{$product->id}}" id="like-{{$product->id}}" type="button" data-toggle="tooltip"
                title="@if ($product->is_like)حذف از علاقه مندی ها@else افزودن به علاقه مندی ها@endif "
                onClick="like({{$product->id}})">
                    <i class="fa fa-heart
                        @if ($product->is_like)
                            like
                        @endif
                    " ></i>
                </button>
            @endauth
            <button type="button" data-toggle="tooltip" title="مقایسه این محصول" onClick=""><i class="fa fa-exchange"></i></button>
        </div>
    </div>
    </div>
</div>
