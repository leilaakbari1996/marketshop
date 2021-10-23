@extends('client.layout.master')

@section('content')
    <div id="container">
        <div class="container">
        <!-- Breadcrumb Start-->
        <ul class="breadcrumb">
            <li><a href="{{route('client.index')}}"><i class="fa fa-home"></i></a></li>
            <li><a href="{{route('client.user.show',auth()->user())}}">پروفایل</a></li>
            <li><a href="#">{{$title}}</a></li>
        </ul>
        <!-- Breadcrumb End-->
        <div class="row">
            <!--Left Part Start -->
            <aside id="column-left" class="col-sm-3 hidden-xs">
                @include('client.layout.menubar')
            </aside>
            <!--Left Part End -->
            <!--Middle Part Start-->
            <div id="content" class="col-sm-9">



            <div class="product-filter">
                <div class="row">
                <div class="col-md-4 col-sm-5">
                    <div class="btn-group">
                    <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip" title="List"><i class="fa fa-th-list"></i></button>
                    <button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip" title="Grid"><i class="fa fa-th"></i></button>
                    </div>
                    <a href="compare.html" id="compare-total">محصولات مقایسه (0)</a> </div>
                <div class="col-sm-2 text-right">
                    <label class="control-label" for="input-sort">مرتب سازی :</label>
                </div>
                <div class="col-md-3 col-sm-2 text-right">
                    <select id="input-sort" class="form-control col-sm-3">
                    <option value="" selected="selected">پیشفرض</option>
                    <option value="">نام (الف - ی)</option>
                    <option value="">نام (ی - الف)</option>
                    <option value="">قیمت (کم به زیاد)</option></option>
                    <option value="">قیمت (زیاد به کم)</option>
                    <option value="">امتیاز (بیشترین)</option>
                    <option value="">امتیاز (کمترین)</option>
                    <option value="">مدل (A - Z)</option>
                    <option value="">مدل (Z - A)</option>
                    </select>
                </div>
                <div class="col-sm-1 text-right">
                    <label class="control-label" for="input-limit">نمایش :</label>
                </div>
                <div class="col-sm-2 text-right">
                    <select id="input-limit" class="form-control">
                    <option value="" selected="selected">20</option>
                    <option value="">25</option>
                    <option value="">50</option>
                    <option value="">75</option>
                    <option value="">100</option>
                    </select>
                </div>
                </div>
            </div>
            <br />
            <div class="row products-category">
                @if ($products->count() > 0)
                    @foreach ($products as $product)
                        <div class="product-layout product-list col-xs-12">
                            @include('client.product.product',[
                                'product' => $product
                            ])
                        </div>
                    @endforeach

                @else
                    <div class="alert alert-info alert-dismissible">
                        <h5><i class="icon fa fa-info"></i> توجه!</h5>
                        هنوز هیچ محصولی به لیست علاقه نتدی های شما اضاف نشده است.
                    </div>
                @endif

            </div>
            <div class="row">
                <div class="col-sm-6 text-left">
                <ul class="pagination">
                    <li class="active"><span>1</span></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">&gt;</a></li>
                    <li><a href="#">&gt;|</a></li>
                </ul>
                </div>
                <div class="col-sm-6 text-right">نمایش 1 تا 12 از {{count($products)}} (مجموع 2 صفحه)</div>
            </div>
            </div>
            <!--Middle Part End -->
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
        <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    </div>
    <!-- Facebook Side Block End -->
@endsection





@extends('client.layout.master')
@section('style')
    <style>
        .delete{
            background:red;
            color:#fff;
            font-size:15px;
        }
        .owl-carousel{
            display: block;
        }
    </style>

@endsection

@section('content')
    <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <br>
                <ul class="breadcrumb">
                    <li><a href="{{route('client.index')}}"><i class="fa fa-home"></i></a></li>
                    <li><a href="{{route('client.user.show',auth()->user())}}">پروفایل</a></li>
                    <li><a href="#">{{$title}}</a></li>
                </ul>
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">

                            <h3 class="subtitle">{{$title}}</h3>
                            @if ($products->count() == 0)
                                <div class="alert alert-info alert-dismissible">
                                    <h5><i class="icon fa fa-info"></i> توجه!</h5>
                                    هنوز هیچ محصولی به لیست علاقه مندی های شما اضاف نشده.
                                </div>
                            @else

                                @foreach ($products as $product)
                                    <div class="col-lg-3">
                                        <div class="tab_content">
                                            <div class="owl-carousel product_carousel_tab">
                                                <div class="product-thumb">

                                                    <div class="image">
                                                        <a href="{{route('client.product.show',$product)}}">
                                                            <img src="{{str_replace('public','/storage',$product->image)}}"
                                                            alt="{{$product->name}}" title="{{$product->name}}"
                                                            class="img-responsive" width="100" />
                                                        </a>
                                                    </div>
                                                    <div class="caption">
                                                        <h4>
                                                            <a href="{{route('client.product.show',$product)}}">{{$product->name}}</a>
                                                        </h4>
                                                        <p class="price"><span class="price-new">{{$product->price}} تومان</span>
                                                            <span class="price-old">در حال تکمیل</span><span class="saving">
                                                            تکمیل</span></p>
                                                    </div>
                                                    <div class="button-group">
                                                        @if ($product->is_special == 1)
                                                            <input type="button"  onClick="SpecialProduct({{$product->id}})"
                                                            value="حذف از محصولات ویژه"
                                                            id="special-product-{{$product->id}}" class="btn btn-sm btn-danger">
                                                        @else
                                                            <input type="button" id="special-product-{{$product->id}}"
                                                            class="btn btn-sm btn-success"
                                                            onClick="SpecialProduct({{$product->id}})"
                                                            value="افزودن به محصولات ویژه">
                                                        @endif


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->




@endsection
@section('script')
    <script>

    /*function SpecialProduct(productId){
        $.ajax({
            type: "post",
            url:'/adminpanel/product/' + productId + '/special',
            data: {
                _token: "{{csrf_token()}}",

            },
            success : function(data){
                var icon = $('#special-product-'+productId);
                if(icon.hasClass('btn-danger')){
                    alert('محصول '+data.productName+' از محصولات ویژه حذف شد.');
                    icon.removeClass('btn-danger');
                    icon.addClass('btn-success');
                    icon.val('افزودن به محصولات ویژه')
                }else{
                    alert('محصول '+ data.productName +' به محصولات ویژه اضاف شد.');
                    icon.removeClass('btn-success');
                    icon.addClass('btn-danger');
                    icon.val('حذف از محصولات ویزه');
                }
            }

        })
    }*/
    </script>
@endsection


