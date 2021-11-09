@php
    use App\Models\Cart;
    use App\Models\Product;
@endphp
@extends('client.layout.master')
@section('style')
    <link rel="stylesheet" href="/client/css/image-zoom.css" />
    <style>
        .answer{
            background: green;
            color: white;
            padding: 5px;

        }

    </style>
@endsection
@section('content')
  <div id="container">
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li itemscope>
            <a href="{{route('client.index')}}" itemprop="url"><span itemprop="title"
                ><i class="fa fa-home"></i></span>
            </a>
        </li>
        @if ($product->category->parent)
            @if ($product->category->parent->parent)
                <li><a href="{{route('client.category.index',$product->category->parent->parent)}}" class="link" style="text-decoration: none">
                    {{$product->category->parent->parent->name}}</a>
                </li>
            @endif
            <li><a href="{{route('client.category.index',$product->category->parent)}}" class="link">
                {{$product->category->parent->name}}</a>
            </li>
        @endif
        <li>
            <a href="{{route('client.category.index',$product->category)}}" class="link">
            {{$product->category->name}}</a>
        </li>
        <li><a href="#" class="link">{{$product->name}}</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-9">
          <div itemscope>
            <h1 class="title" itemprop="name">{{$product->name}}</h1>
            <div class="row product-info">
              <div class="col-sm-6">
                    <div class="image">
                        <div id="zoom-img">
                            <img class="img-responsive" itemprop="image" id='image<a href="https://www.jqueryscript.net/zoom/">Zoom</a>'
                            src="{{$product->image_path}}"
                            title="{{$product->name}}" alt="{{$product->name}}"
                             width="80%">

                        </div>
                    </div>
                    @if (count($pictures) > 0)
                        <div class="center-block text-center"><span class="zoom-gallery"><i class="fa fa-search"></i> برای مشاهده گالری روی تصویر کلیک کنید</span></div>
                        <div class="image-additional my-gallery" id="gallery_01">
                            @foreach ($pictures as $picture)
                                <a class="thumbnail" href="#" data-zoom-image="{{Product::get_image($picture->image)}}"
                                data-image="{{Product::get_image($picture->image)}}" title="گالری تصاویر">
                                    <img src="{{Product::get_image($picture->image)}}" class="gallery-image" title="گالری تصاویر}" alt = "گالری تصاویر"
                                    width="70px"/>
                                </a>
                            @endforeach
                        </div>
                    @endif
              </div>
              <div class="col-sm-6">
                <ul class="list-unstyled description">
                  <li><b>برند :</b> <a href="#"><span itemprop="brand">{{$product->brand->name}}</span></a></li>
                  <li><b>کد محصول :</b> <span itemprop="mpn">محصول {{$product->id}}</span></li>
                  <li><b>امتیازات خرید:</b> 700</li>
                  <li><b>وضعیت موجودی :</b>
                        @if ($product->number != 0)
                            <span class="instock">موجود</span></li>
                        @else
                            <span class="btn btn-danger"> موجود نیست</span></li>
                        @endif
                </ul>
                <ul class="price-box">
                   <li class="price" itemprop="offers" itemscope>
                    <span class="price-new">{{$product->cost_with_discount}} تومان   </span>&nbsp;&nbsp;&nbsp;
                        @if ($product->offer > 0)
                            <span class="price-old" style="font-size: 19px">{{$product->price}} تومان</span>
                        @endif
                   </li>

                </ul>
                <div id="product">


                  <div class="cart">
                      @if ($product->number < 16 && $product->number != 0)
                          <div class="text-danger">تعداد کالای باقی مانده در انبار {{$product->number}} عدد می باشد.</div>
                      @endif
                        <br><br><div>
                            @include('client.product.quantity',[
                                'product' => $product,
                                'condition' => 0
                            ])
                            @auth
                                @php
                                    if($product->is_cart){
                                        $cart = Cart::get_session('cart');
                                    }
                                @endphp
                                <button class="btn btn-lg btn-primary" type="button"
                                @if ($product->number == 0)
                                   disabled
                                @else
                                    @if ($product->is_cart)
                                        onClick="addToCart({{$product->id }},1)"
                                    @else
                                        onClick="addToCart({{$product->id }},0)"
                                    @endif
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
                                    <button class="btn btn-lg btn-primary" type="button"
                                    ><span>افزودن به سبد</span></button>
                                </a>
                            @endauth
                        </div>
                        <div>

                            @auth
                            <button class="like-{{$product->id}} wishlist" id="like-{{$product->id}}" type="button" data-toggle="tooltip"

                                onClick="like({{$product->id}})">
                                    <i class="fa fa-heart
                                        @if ($product->is_like)
                                            like
                                        @endif
                                    " ></i><span id="like-span-{{$product->id}}">@if ($product->is_like)حذف از علاقه مندی ها@else افزودن به علاقه مندی ها@endif</span>
                                </button>
                        @endauth
                      <br />
                      <button type="button" class="wishlist" onClick=""><i class="fa fa-exchange"></i> مقایسه این محصول</button>
                    </div>
                  </div>
                </div>
                <div class="rating" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                  <meta itemprop="ratingValue" content="0" />
                </div>
                <hr>
                <!-- AddThis Button BEGIN -->
                <div class="addthis_toolbox addthis_default_style"> <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_google_plusone" g:plusone:size="medium"></a> <a class="addthis_button_pinterest_pinit" pi:pinit:layout="horizontal" pi:pinit:url="http://www.addthis.com/features/pinterest" pi:pinit:media="http://www.addthis.com/cms-content/images/features/pinterest-lg.png"></a> <a class="addthis_counter addthis_pill_style"></a> </div>
                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-514863386b357649"></script>
                <!-- AddThis Button END -->
              </div>
            </div>
            @include('admin.layout.success')
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab-description" data-toggle="tab">توضیحات</a></li>
              <li><a href="#tab-specification" data-toggle="tab">مشخصات</a></li>
              <li><a href="#tab-review" data-toggle="tab">ثبت و دیدن نظرات </a></li>
            </ul>
            <div class="tab-content">
              <div itemprop="description" id="tab-description" class="tab-pane active">
                <div>
                   <p><b>{{$product->desc}}</b></p>
                </div>
              </div>
              <div id="tab-specification" class="tab-pane">
                <div id="tab-specification" class="tab-pane">
                    @if ($product->is_property_for_product)
                        @foreach ($propertyGroups as $propertyGroup)
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="2"><strong>{{$propertyGroup->propertyGroup()}}</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                            <tr>
                                                <td>{{$propertyGroup->property()}}</td>
                                                <td>{{$propertyGroup->value}}</td>
                                            </tr>

                                    </tbody>
                                </table>
                        @endforeach
                    @else
                       <p>هنوز هیچ مشخصاتی ثبت نشده است.</p>
                    @endif
              </div>
              </div>
              <div id="tab-review" class="tab-pane">
                  <div id="review">
                    <div>
                        <h2>نظر یا پیشنهاد شما</h2>
                        <form action="{{route('client.comment.store',$product)}}" method="post">
                            @csrf
                            <div class="form-group required">
                                <div class="col-sm-12">
                                <label for="input-name" class="control-label">ایمیل</label>
                                <input type="email" class="form-control" id="email" name="email"
                                @auth value="{{auth()->user()->email}}" disabled @endauth dir="ltr">
                                </div>
                            </div><br>
                            <div class="form-group required">
                                <div class="col-sm-12">
                                    <label for="input-review" class="control-label">نظر شما</label>
                                    <textarea class="form-control" id="comment"  name="comment"></textarea>
                                </div>
                            </div><br>
                            <div class="form-group required">
                                <div class="col-sm-12">
                                <label class="control-label">رتبه</label>
                                &nbsp;&nbsp;&nbsp; بد&nbsp;
                                <input type="radio" value="1" name="rating">
                                &nbsp;
                                <input type="radio" value="2" name="rating">
                                &nbsp;
                                <input type="radio" value="3" name="rating">
                                &nbsp;
                                <input type="radio" value="4" name="rating">
                                &nbsp;
                                <input type="radio" value="5" name="rating">
                                &nbsp;خوب</div>
                            </div>
                            <div class="buttons">
                                <div class="pull-right">
                                    <button class="btn btn-primary" id="button-review" type="submit" >ادامه</button>
                                </div>
                            </div>
                        </form>
                        @if ($comments->count() > 0)
                            <h2> مشاهده ی نظرات ({{$comments->count()}})</h2>
                            @foreach ($comments as $comment)
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <td style="width: 50%;"><strong><span>{{$comment->user->name}}</span></strong></td>
                                            <td class="text-right"><span>{{$comment->created_at}}</span></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><p>{{$comment->comment}}</p>
                                            <div class="rating">
                                                <span class="fa">
                                                    <?php
                                                        for($i=0 ; $i < $comment->rating ; $i++){

                                                            ?> <i class="fas fa-star"></i><?php
                                                        }
                                                        $shom = 5 - $comment->rating;
                                                        if($shom > 0){
                                                            for($i=0 ; $i < $shom ; $i++){
                                                                ?> <i class="fas fa-star" style="color: rgb(209, 197, 197)"></i><?php
                                                            }
                                                        }
                                                    ?>
                                                </span>  </div></td>
                                        </tr>
                                    </tbody>
                                </table>
                            @endforeach
                        @else
                            <h2>هنوز هیچ نظری ثبت نشده است...</h2>
                        @endif

                    </div>
                    <div class="text-right"></div>
                  </div>
              </div>
            </div>
            @if ($relatedProducts->count() != 0)
                <h3 class="subtitle">محصولات مرتبط</h3>
                <div class="owl-carousel" style="display: block">
                    @include('client.layout.relatedProducts',[
                        'relatedProducts' => $relatedProducts
                    ])
                </div>
            @endif
          </div>
        </div>
        <!--Middle Part End -->
        <!--Right Part Start -->
        <aside id="column-right" class="col-sm-3 hidden-xs">
            @include('client.layout.menubar')
        </aside>
        <!--Right Part End -->
      </div>
    </div>
  </div>
  <!-- Twitter Side Block Start -->
  <div id="twitter_footer" class="twit-right sort-order-1">
    <div class="twitter_icon"><i class="fa fa-twitter"></i></div>
    <a class="twitter-timeline" href="https://twitter.com/" data-chrome="nofooter noscrollbar transparent" data-theme="light" data-tweet-limit="2" data-related="twitterapi,twitter" data-aria-polite="assertive" data-widget-id="347621595801608192">توییت های @</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
  </div>
  <!-- Twitter Side Block End -->
  <!-- Facebook Side Block Start -->
  <div id="facebook" class="fb-right sort-order-2">
    <div class="facebook_icon"><i class="fa fa-facebook"></i></div>
    <div class="fb-page" data-href="#" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true" data-show-posts="false">
      <div class="fb-xfbml-parse-ignore">
        <blockquote cite="#"><a href="#">سايت شما</a></blockquote>
      </div>
    </div>
    <div id="fb-root"></div>
    <script>
        <script src="/client/jquery.min.js"></script>
        $(function(){
  $('#imageZoom').imageZoom();
});
$(function(){
  $('.my-gallery').imageZoom({
    $(this).imageZoom();
  });
});
$(function(){
  $('.my-gallery').imageZoom({
    $(this).imageZoom({
      zoom: 200
    });
  });
});
    (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
  </div>
  <!-- Facebook Side Block End -->

<!-- JS Part Start-->

<script type="text/javascript">
// Elevate Zoom for Product Page image
$("#zoom_01").elevateZoom({
	gallery:'gallery_01',
	cursor: 'pointer',
	galleryActiveClass: 'active',
	imageCrossfade: true,
	zoomWindowFadeIn: 500,
	zoomWindowFadeOut: 500,
	zoomWindowPosition : 11,
	lensFadeIn: 500,
	lensFadeOut: 500,
	loadingIcon: 'image/progress.gif'
	});
//////pass the images to swipebox
$("#zoom_01").bind("click", function(e) {
  var ez =   $('#zoom_01').data('elevateZoom');
	$.swipebox(ez.getGalleryList());
  return false;
});
</script>
<!-- JS Part End-->
</body>
</html>
@endsection
