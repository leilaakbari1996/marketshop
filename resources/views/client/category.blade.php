@extends('client.layout.master')

@section('content')
    <div id="container">
        <div class="container">
        <!-- Breadcrumb Start-->
        <ul class="breadcrumb">
            <li><a href="{{route('client.index')}}"><i class="fa fa-home"></i></a></li>
            @if ($categoryMain->parent)
                <li><a href="{{route('client.category.index',$categoryMain->parent)}}">
                    {{$categoryMain->parent->name}}</a></li>
                @if ($categoryMain->parent->parent)
                    <li><a href="{{route('client.category.index',$categoryMain->parent->parent)}}">
                        {{$categoryMain->parent->parent->name}}</a></li>
                @endif
            @endif
            <li>{{$categoryMain->name}}</li>
        </ul>
        <!-- Breadcrumb End-->
        <div class="row">
            <!--Left Part Start -->
            <aside id="column-left" class="col-sm-3 hidden-xs">
            <h3 class="subtitle">دسته ها</h3>
            <div class="box-category">
                <ul id="cat_accordion">
                    @foreach ($categories as $category)
                        <li><a href="{{route('client.category.index',$category)}}">{{$category->name}}</a>
                            @if ($category->childrens()->count() > 0)
                                <span class="down"></span>
                                <ul>
                                    @foreach ($category->childrens as $subcategory)
                                        <li>
                                            <a href="{{route('client.category.index',$subcategory)}}">
                                               {{$subcategory->name}}
                                            </a>
                                            @if ($subcategory->childrens()->count() > 0)
                                                <span class="down"></span>
                                                <ul>
                                                    @foreach ($subcategory->childrens as $child)
                                                        <li>
                                                            <a href="{{route('client.category.index',$child)}}">
                                                                {{$child->name}}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
            <h3 class="subtitle">پرفروش ها</h3>
            <div class="side-item">
                <div class="product-thumb clearfix">
                <div class="image"><a href="product.html"><img src="image/product/apple_cinema_30-50x75.jpg" alt="تی شرت کتان مردانه" title="تی شرت کتان مردانه" class="img-responsive" width="100"/></a></div>
                <div class="caption">
                    <h4><a href="product.html">تی شرت کتان مردانه</a></h4>
                    <p class="price"><span class="price-new">110000 تومان</span> <span class="price-old">122000 تومان</span> <span class="saving">-10%</span></p>
                </div>
                </div>
                <div class="product-thumb clearfix">
                <div class="image"><a href="product.html"><img src="image/product/iphone_1-50x75.jpg" alt="آیفون 7" title="آیفون 7" class="img-responsive" /></a></div>
                <div class="caption">
                    <h4><a href="product.html">آیفون 7</a></h4>
                    <p class="price"> 2200000 تومان </p>
                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span></div>
                </div>
                </div>
                <div class="product-thumb clearfix">
                <div class="image"><a href="product.html"><img src="image/product/macbook_1-50x75.jpg" alt="آیدیا پد یوگا" title="آیدیا پد یوگا" class="img-responsive" /></a></div>
                <div class="caption">
                    <h4><a href="product.html">آیدیا پد یوگا</a></h4>
                    <p class="price"> 900000 تومان </p>
                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                </div>
                </div>
                <div class="product-thumb clearfix">
                <div class="image"><a href="product.html"><img src="image/product/sony_vaio_1-50x75.jpg" alt="کفش راحتی مردانه" title="کفش راحتی مردانه" class="img-responsive" /></a></div>
                <div class="caption">
                    <h4><a href="product.html">کفش راحتی مردانه</a></h4>
                    <p class="price"> <span class="price-new">32000 تومان</span> <span class="price-old">12 میلیون تومان</span> <span class="saving">-25%</span> </p>
                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                </div>
                </div>
                <div class="product-thumb clearfix">
                <div class="image"><a href="product.html"><img src="image/product/FinePix-Long-Zoom-Camera-50x75.jpg" alt="دوربین فاین پیکس" title="دوربین فاین پیکس" class="img-responsive" /></a></div>
                <div class="caption">
                    <h4><a href="product.html">دوربین فاین پیکس</a></h4>
                    <p class="price">122000 تومان</p>
                </div>
                </div>
            </div>
            <h3 class="subtitle">ویژه</h3>
            <div class="side-item">
                <div class="product-thumb clearfix">
                <div class="image"><a href="product.html"><img src="image/product/macbook_pro_1-50x75.jpg" alt=" کتاب آموزش باغبانی " title=" کتاب آموزش باغبانی " class="img-responsive" /></a></div>
                <div class="caption">
                    <h4><a href="product.html">کتاب آموزش باغبانی</a></h4>
                    <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">120000 تومان</span> <span class="saving">-26%</span> </p>
                </div>
                </div>
                <div class="product-thumb clearfix">
                <div class="image"><a href="product.html"><img src="image/product/samsung_tab_1-50x75.jpg" alt="تبلت ایسر" title="تبلت ایسر" class="img-responsive" /></a></div>
                <div class="caption">
                    <h4><a href="product.html">تبلت ایسر</a></h4>
                    <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">240000 تومان</span> <span class="saving">-5%</span> </p>
                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                </div>
                </div>
                <div class="product-thumb clearfix">
                <div class="image"><a href="product.html"><img src="image/product/apple_cinema_30-50x75.jpg" alt="تی شرت کتان مردانه" title="تی شرت کتان مردانه" class="img-responsive" /></a></div>
                <div class="caption">
                    <h4><a href="http://demo.harnishdesign.net/opencart/marketshop/v1/index.php?route=product/product&amp;product_id=42">تی شرت کتان مردانه</a></h4>
                    <p class="price"> <span class="price-new">110000 تومان</span> <span class="price-old">122000 تومان</span> <span class="saving">-10%</span> </p>
                </div>
                </div>
                <div class="product-thumb clearfix">
                <div class="image"><a href="product.html"><img src="image/product/nikon_d300_1-50x75.jpg" alt="دوربین دیجیتال حرفه ای" title="دوربین دیجیتال حرفه ای" class="img-responsive" /></a></div>
                <div class="caption">
                    <h4><a href="product.html">دوربین دیجیتال حرفه ای</a></h4>
                    <p class="price"> <span class="price-new">92000 تومان</span> <span class="price-old">98000 تومان</span> <span class="saving">-6%</span> </p>
                </div>
                </div>
                <div class="product-thumb clearfix">
                <div class="image"><a href="product.html"><img src="image/product/nikon_d300_5-50x75.jpg" alt="محصولات مراقبت از مو" title="محصولات مراقبت از مو" class="img-responsive" /></a></div>
                <div class="caption">
                    <h4><a href="product.html">محصولات مراقبت از مو</a></h4>
                    <p class="price"> <span class="price-new">66000 تومان</span> <span class="price-old">90000 تومان</span> <span class="saving">-27%</span> </p>
                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                </div>
                </div>
                <div class="product-thumb clearfix">
                <div class="image"><a href="product.html"><img src="image/product/macbook_air_1-50x75.jpg" alt="لپ تاپ ایلین ور" title="لپ تاپ ایلین ور" class="img-responsive" /></a></div>
                <div class="caption">
                    <h4><a href="product.html">لپ تاپ ایلین ور</a></h4>
                    <p class="price"> <span class="price-new">10 میلیون تومان</span> <span class="price-old">12 میلیون تومان</span> <span class="saving">-5%</span> </p>
                </div>
                </div>
            </div>
            <div class="banner owl-carousel">
                <div class="item"> <a href="#"><img src="image/banner/small-banner1-265x350.jpg" alt="small banner" class="img-responsive" /></a> </div>
                <div class="item"> <a href="#"><img src="image/banner/small-banner-265x350.jpg" alt="small banner1" class="img-responsive" /></a> </div>
            </div>
            </aside>
            <!--Left Part End -->
            <!--Middle Part Start-->
            <div id="content" class="col-sm-9">
            <h1 class="title">{{$categoryMain->name}}</h1>

            <h3 class="subtitle">بهبود جستجو</h3>
            <div class="category-list row">
                            <div class="col-sm-3">
            <ul class="list-item">
                            <li><a href="category.html">صوتی و تصویری (3)</a></li>
                            <li><a href="category.html">لوازم خانگی (2)</a></li>
                        </ul>
            </div>
                    <div class="col-sm-3">
            <ul class="list-item">
                            <li><a href="category.html">موبایل و تبلت (2)</a></li>
                            <li><a href="category.html">لپ تاپ (3)</a></li>
                        </ul>
            </div>
                    <div class="col-sm-3">
            <ul class="list-item">
                            <li><a href="category.html">رومیزی (0)</a></li>
                            <li><a href="category.html">دوربین (0)</a></li>
                        </ul>
            </div>
                        </div>

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
                @foreach ($products as $product)
                    <div class="product-layout product-list col-xs-12">
                        <div class="product-thumb">
                            <div class="image">
                                <a href="{{route('client.product.show',$product)}}">
                                    <img src="{{str_replace('public','/storage',$product->image)}}"
                                    alt="{{$product->name}} " title="{{$product->name}} " width="150" class="img-responsive" />
                                </a>
                            </div>
                            <div>
                            <div class="caption">
                                <h4><a href="{{route('client.product.show',$product)}}"> {{$product->name}} </a></h4>
                                <p class="description">  {{$product->desc}}...</p>
                                <p class="price"> <span class="price-new">در حال تکمیل</span> <span class="price-old">120000 تومان</span> <span class="saving">-26%</span> <span class="price-tax">بدون مالیات : 90000 تومان</span> </p>
                            </div>
                            <div class="button-group">
                                <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                <div class="add-to-links">
                                <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی ها" onClick=""><i class="fa fa-heart"></i> <span>افزودن به علاقه مندی ها</span></button>
                                <button type="button" data-toggle="tooltip" title="مقایسه این محصول" onClick=""><i class="fa fa-exchange"></i> <span>مقایسه این محصول</span></button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                @endforeach
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
    <!--Footer Start-->
    <footer id="footer">
        <div class="fpart-first">
        <div class="container">
            <div class="row">
            <div class="contact col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <h5>درباره مارکت شاپ</h5>
                <p>قالب HTML فروشگاهی مارکت شاپ. این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html نوشتاری یا تصویری را در آن قرار دهید.</p>
                <img alt="" src="image/logo-small.png">
            </div>
            <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
                <h5>اطلاعات</h5>
                <ul>
                <li><a href="about-us.html">درباره ما</a></li>
                <li><a href="about-us.html">اطلاعات 0 تومان</a></li>
                <li><a href="about-us.html">حریم خصوصی</a></li>
                <li><a href="about-us.html">شرایط و قوانین</a></li>
                </ul>
            </div>
            <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
                <h5>خدمات مشتریان</h5>
                <ul>
                <li><a href="contact-us.html">تماس با ما</a></li>
                <li><a href="#">بازگشت</a></li>
                <li><a href="sitemap.html">نقشه سایت</a></li>
                </ul>
            </div>
            <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
                <h5>امکانات جانبی</h5>
                <ul>
                <li><a href="#">برند ها</a></li>
                <li><a href="#">کارت هدیه</a></li>
                <li><a href="#">بازاریابی</a></li>
                <li><a href="#">ویژه ها</a></li>
                </ul>
            </div>
            <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
                <h5>حساب من</h5>
                <ul>
                <li><a href="#">حساب کاربری</a></li>
                <li><a href="#">تاریخچه سفارشات</a></li>
                <li><a href="#">لیست علاقه مندی</a></li>
                <li><a href="#">خبرنامه</a></li>
                </ul>
            </div>
            </div>
        </div>
        </div>
        <div class="fpart-second">
        <div class="container">
            <div id="powered" class="clearfix">
            <div class="powered_text pull-left flip">
                <p>کپی رایت © 2016 فروشگاه شما</p>
            </div>
            <div class="social pull-right flip"> <a href="#" target="_blank"> <img data-toggle="tooltip" src="image/socialicons/facebook.png" alt="Facebook" title="Facebook"></a> <a href="#" target="_blank"> <img data-toggle="tooltip" src="image/socialicons/twitter.png" alt="Twitter" title="Twitter"> </a> <a href="#" target="_blank"> <img data-toggle="tooltip" src="image/socialicons/google_plus.png" alt="Google+" title="Google+"> </a> <a href="#" target="_blank"> <img data-toggle="tooltip" src="image/socialicons/pinterest.png" alt="Pinterest" title="Pinterest"> </a> <a href="#" target="_blank"> <img data-toggle="tooltip" src="image/socialicons/rss.png" alt="RSS" title="RSS"> </a> </div>
            </div>
            <div class="bottom-row">
            <div class="custom-text text-center">
                <p>این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html نوشتاری یا تصویری را در آن قرار دهید.<br> لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>
            </div>
            <div class="payments_types"> <a href="#" target="_blank"> <img data-toggle="tooltip" src="image/payment/payment_paypal.png" alt="paypal" title="PayPal"></a> <a href="#" target="_blank"> <img data-toggle="tooltip" src="image/payment/payment_american.png" alt="american-express" title="American Express"></a> <a href="#" target="_blank"> <img data-toggle="tooltip" src="image/payment/payment_2checkout.png" alt="2checkout" title="2checkout"></a> <a href="#" target="_blank"> <img data-toggle="tooltip" src="image/payment/payment_maestro.png" alt="maestro" title="Maestro"></a> <a href="#" target="_blank"> <img data-toggle="tooltip" src="image/payment/payment_discover.png" alt="discover" title="Discover"></a> <a href="#" target="_blank"> <img data-toggle="tooltip" src="image/payment/payment_mastercard.png" alt="mastercard" title="MasterCard"></a> </div>
            </div>
        </div>
        </div>
        <div id="back-top"><a data-toggle="tooltip" title="بازگشت به بالا" href="javascript:void(0)" class="backtotop"><i class="fa fa-chevron-up"></i></a></div>
    </footer>
    <!--Footer End-->
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
