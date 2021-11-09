@php
    use App\Models\Product;
@endphp
@extends('client.layout.master')

@section('content')
    <div id="container">
        <div class="container">
        <!-- Breadcrumb Start-->
        <ul class="breadcrumb">
            <li><a href="{{route('client.index')}}"><i class="fa fa-home"></i></a></li>
            <li><a href="#">برند ها</a></li>
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
            <h1 class="title">برند ها</h1>
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
            @if (count($brands) == 0)
                <div class="text-danger">هنوز هیچ برندی ثبت نشده است.لطفا صبور باشید.</div>
            @else
                <div class="row products-category">
                    @foreach ($brands as $brand)
                        <div class="product-layout product-list col-xs-12">
                            <img src="{{Product::get_image($brand->image)}}" alt="{{$brand->name}}" width="100px">
                            <p>{{$brand->name}}</p>
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
                        <div class="col-sm-6 text-right">نمایش 1 تا 12 از {{count($brands)}} (مجموع 2 صفحه)</div>
                    </div>
                </div>
                <!--Middle Part End -->
            @endif
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
