@extends('client.layout.master')
@php
    use App\Models\Product;
@endphp
@section('content')
<div id="container">

    <div class="container">
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-xs-12">
          <!-- Slideshow Start-->
          <div class="slideshow single-slider owl-carousel">
              @foreach ($sliders as $slider)
                   <div class="item">
                        <a href="#">
                           <img class="img-responsive" src="{{Product::get_image($slider->image)}}"
                           alt="banner" style="max-height: 300px ;" width="100%" />
                        </a>
                    </div>
              @endforeach
          </div>
          <!-- Slideshow End-->
          <!-- محصولات Tab Start -->
          <br><br>
          <div id="product-tab" class="product-tab">
                <ul id="tabs" class="tabs">
                    <li><a href="#tab-featured">ویژه</a></li>
                    <li><a href="#tab-latest">جدیدترین</a></li>
                    <li><a href="#tab-bestseller">پرفروش</a></li>
                    <li><a href="#tab-special">پیشنهادی</a></li>
                </ul>
                <div id="tab-featured" class="tab_content">
                    <div class="owl-carousel product_carousel_tab">
                        @if (count($specialProducts) > 0)
                            @foreach ($specialProducts as $product)

                                <div class="product-thumb clearfix">
                                    <div class="image">
                                        <a href="{{route('client.product.show',$product)}}">
                                            <img src="{{str_replace('public','/storage',$product->image)}}"
                                            alt="{{$product->name}}" title="{{$product->name}}"
                                            class="img-responsive" width="150" />
                                        </a>
                                    </div>
                                    <div class="caption">
                                        <h4>
                                            <a href="{{route('client.product.show',$product)}}">{{$product->name}}</a>
                                        </h4>
                                        <p class="price">
                                            <span class="price-new">{{$product->cost_with_discount}} تومان</span>&nbsp;&nbsp;
                                            @if ($product->offer > 0)
                                                <span class="price-old" style="font-size: 14px">{{$product->price}} تومان</span>
                                                <span class="saving"> -{{$product->offer}}%</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="button-group">
                                        <button class="btn-primary" type="button" onClick="cart.add('42');"><span>افزودن به سبد</span></button>
                                        <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی ها" onClick=""><i class="fa fa-heart"></i></button>
                                        <button type="button" data-toggle="tooltip" title="مقایسه این محصول" onClick=""><i class="fa fa-exchange"></i></button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="alert alert-info alert-dismissible">
                                <h5><i class="icon fa fa-info"></i></h5>
                                 در این گروه هنوز هیچ محصولی ثبت نشده است لطفا صبور باشید...
                            </div>
                        @endif
                    </div>
                </div>
                <div id="tab-latest" class="tab_content">
                    <div class="owl-carousel product_carousel_tab">
                        @foreach ($newProducts as $newProduct)
                            <div class="product-thumb">
                                <div class="image">
                                    <a href="{{route('client.product.show',$newProduct)}}">
                                        <img src="{{Product::get_image($newProduct->image)}}"
                                        alt="{{$newProduct->name}}" title="{{$newProduct->name}}"
                                         class="img-responsive" width="150" />
                                    </a>

                                </div>
                                <div class="caption">
                                    <h4>
                                        <a href="{{route('client.product.show',$newProduct)}}"> {{$newProduct->name}} </a>
                                    </h4>
                                    <p class="price">
                                       <span class="price-new">{{$product->cost_with_discount}} تومان</span>&nbsp;&nbsp;
                                        @if ($product->offer > 0)
                                            <span class="price-old" style="font-size: 14px">{{$product->price}} تومان</span>
                                            <span class="saving"> -{{$product->offer}}%</span>
                                        @endif
                                   </p>
                                </div>
                                <div class="button-group">
                                    <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                    <div class="add-to-links">
                                    <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                    <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div id="tab-bestseller" class="tab_content">
                    <div class="owl-carousel product_carousel_tab">
                                <div class="product-thumb">
                                    <div class="image"><a href="product.html"><img src="image/product/FinePix-Long-Zoom-Camera-220x330.jpg" alt="دوربین فاین پیکس" title="دوربین فاین پیکس" class="img-responsive" /></a></div>
                                    <div class="caption">
                                    <h4><a href="product.html">دوربین فاین پیکس</a></h4>
                                    <p class="price"> 122000 تومان </p>
                                    </div>
                                    <div class="button-group">
                                    <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                    </div>
                                    </div>
                                </div>
                                <div class="product-thumb">
                                    <div class="image"><a href="product.html"><img src="image/product/nikon_d300_1-220x330.jpg" alt="دوربین دیجیتال حرفه ای" title="دوربین دیجیتال حرفه ای" class="img-responsive" /></a></div>
                                    <div class="caption">
                                    <h4><a href="product.html">دوربین دیجیتال حرفه ای</a></h4>
                                    <p class="price"> <span class="price-new">92000 تومان</span> <span class="price-old">98000 تومان</span> <span class="saving">-6%</span> </p>
                                    </div>
                                    <div class="button-group">
                                    <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                </div>
                <div id="tab-special" class="tab_content">
                    <div class="owl-carousel product_carousel_tab">
                                <div class="product-thumb">
                                    <div class="image"><a href="product.html"><img src="image/product/ipod_touch_1-220x330.jpg" alt="سامسونگ گلکسی s7" title="سامسونگ گلکسی s7" class="img-responsive" /></a></div>
                                    <div class="caption">
                                    <h4><a href="product.html">سامسونگ گلکسی s7</a></h4>
                                    <p class="price"> <span class="price-new">62000 تومان</span> <span class="price-old">122000 تومان</span> <span class="saving">-50%</span> </p>
                                    </div>
                                    <div class="button-group">
                                    <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                    </div>
                                    </div>
                                </div>
                                <div class="product-thumb">
                            <div class="image"><a href=""><img src="image/product/macbook_5-220x330.jpg" alt="ژل حمام بانوان" title="ژل حمام بانوان" class="img-responsive" /></a></div>
                            <div class="caption">
                                <h4><a href="product.html">ژل حمام بانوان</a></h4>
                                <p class="price"> <span class="price-new">19500 تومان</span> <span class="price-old">21900 تومان</span> <span class="saving">-4%</span> </p>
                            </div>
                            <div class="button-group">
                                <button class="btn-primary" type="button" onClick="cart.add('61');"><span>افزودن به سبد</span></button>
                                <div class="add-to-links">
                                <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick="wishlist.add('61');"><i class="fa fa-heart"></i></button>
                                <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick="compare.add('61');"><i class="fa fa-exchange"></i></button>
                                </div>
                            </div>
                            </div>
                                <div class="product-thumb">
                                    <div class="image"><a href="product.html"><img src="image/product/macbook_air_1-220x330.jpg" alt="لپ تاپ ایلین ور" title="لپ تاپ ایلین ور" class="img-responsive" /></a></div>
                                    <div class="caption">
                                    <h4><a href="product.html">لپ تاپ ایلین ور</a></h4>
                                    <p class="price"> <span class="price-new">10 میلیون تومان</span> <span class="price-old">12 میلیون تومان</span> <span class="saving">-5%</span> </p>
                                    </div>
                                    <div class="button-group">
                                    <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                    </div>
                                    </div>
                                </div>
                                <div class="product-thumb clearfix">
                            <div class="image"><a href="product.html"><img src="image/product/apple_cinema_30-220x330.jpg" alt="تی شرت کتان مردانه" title="تی شرت کتان مردانه" class="img-responsive" /></a></div>
                            <div class="caption">
                                <h4><a href="product.html">تی شرت کتان مردانه</a></h4>
                                <p class="price"><span class="price-new">110000 تومان</span> <span class="price-old">122000 تومان</span><span class="saving">-10%</span></p>
                            </div>
                            <div class="button-group">
                                <button class="btn-primary" type="button" onClick="cart.add('42');"><span>افزودن به سبد</span></button>
                                <div class="add-to-links">
                                <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی ها" onClick=""><i class="fa fa-heart"></i></button>
                                <button type="button" data-toggle="tooltip" title="مقایسه این محصول" onClick=""><i class="fa fa-exchange"></i></button>
                                </div>
                            </div>
                            </div>
                                <div class="product-thumb">
                                    <div class="image"><a href="product.html"><img src="image/product/macbook_pro_1-220x330.jpg" alt=" کتاب آموزش باغبانی " title=" کتاب آموزش باغبانی " class="img-responsive" /></a></div>
                                    <div class="caption">
                                    <h4><a href="product.html"> کتاب آموزش باغبانی </a></h4>
                                    <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">120000 تومان</span> <span class="saving">-26%</span> </p>
                                    </div>
                                    <div class="button-group">
                                    <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                    </div>
                                    </div>
                                </div>
                                <div class="product-thumb">
                                    <div class="image"><a href="product.html"><img src="image/product/samsung_tab_1-220x330.jpg" alt="تبلت ایسر" title="تبلت ایسر" class="img-responsive" /></a></div>
                                    <div class="caption">
                                    <h4><a href="product.html">تبلت ایسر</a></h4>
                                    <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">240000 تومان</span> <span class="saving">-5%</span> </p>
                                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                                    </div>
                                    <div class="button-group">
                                    <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                    </div>
                                    </div>
                                </div>
                                </div>

                </div>
          </div>    <!-- محصولات Tab Start -->
          <!-- Banner Start -->
          <div class="marketshop-banner">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><a href="#"><img src="image/banner/sample-banner-4-600x250.jpg" alt="2 Block Banner" title="2 Block Banner" /></a></div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><a href="#"><img src="image/banner/sample-banner-5-600x250.jpg" alt="2 Block Banner 1" title="2 Block Banner 1" /></a></div>
            </div>
          </div>
          <!-- Banner End -->
          <!-- دسته ها محصولات Slider Start-->
          <div class="category-module" id="latest_category">
            <h3 class="subtitle">{{$specialCategory->category->name}} - <a class="viewall"
                href="{{route('client.category.index',$specialCategory->category)}}">نمایش همه</a></h3>
            <div class="category-module-content">
              <ul id="sub-cat" class="tabs">
                  @foreach ($specialCategory->category->childrens as $subCategorySpecial)
                    <li><a href="#tab-cat{{$subCategorySpecial->id}}">
                        {{$subCategorySpecial->name}}</a>
                    </li>
                  @endforeach
              </ul>
              @foreach ($specialCategory->category->childrens as $subCategorySpecial)
                <div id="tab-cat{{$subCategorySpecial->id}}" class="tab_content">
                    <div class="owl-carousel latest_category_tabs">
                        @foreach ($subCategorySpecial->products as $product)
                            <div class="product-thumb">
                                <div class="image">
                                    <a href="{{route('client.product.show',$product)}}">
                                        <img src="{{str_replace('public','/storage',$product->image)}}"
                                        alt="{{$product->name}}" title="{{$product->name}}"
                                        class="img-responsive" width="100" />
                                    </a>
                                </div>
                                <div class="caption">
                                <h4><a href="{{route('client.product.show',$product)}}">{{$product->name}}</a></h4>
                                <p class="price">
                                    <span class="price-new">{{$product->cost_with_discount}} تومان</span>&nbsp;&nbsp;
                                    @if ($product->offer > 0)
                                        <span class="price-old" style="font-size: 14px">{{$product->price}} تومان</span>
                                        <span class="saving"> -{{$product->offer}}%</span>
                                     @endif
                                </p>
                                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                                </div>
                                <div class="button-group">
                                <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                <div class="add-to-links">
                                    <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                    <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
              <div id="tab-cat2" class="tab_content">
                <div class="owl-carousel latest_category_tabs">
                  <div class="product-thumb">
                    <div class="image"><a href="product.html"><img src="image/product/ipod_shuffle_1-220x330.jpg" alt="لپ تاپ hp پاویلیون" title="لپ تاپ hp پاویلیون" class="img-responsive" /></a></div>
                    <div class="caption">
                      <h4><a href="product.html">لپ تاپ hp پاویلیون</a></h4>
                      <p class="price"> 122000 تومان </p>
                    </div>
                    <div class="button-group">
                      <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                      <div class="add-to-links">
                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="tab-cat3" class="tab_content">
                <div class="owl-carousel latest_category_tabs">
                  <div class="product-thumb">
                    <div class="image"><a href="product.html"><img src="image/product/FinePix-Long-Zoom-Camera-220x330.jpg" alt="دوربین فاین پیکس" title="دوربین فاین پیکس" class="img-responsive" /></a></div>
                    <div class="caption">
                      <h4><a href="product.html">دوربین فاین پیکس</a></h4>
                      <p class="price"> 122000 تومان </p>
                    </div>
                    <div class="button-group">
                      <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                      <div class="add-to-links">
                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                      </div>
                    </div>
                  </div>
                  <div class="product-thumb">
                    <div class="image"><a href="product.html"><img src="image/product/nikon_d300_1-220x330.jpg" alt="دوربین دیجیتال حرفه ای" title="دوربین دیجیتال حرفه ای" class="img-responsive" /></a></div>
                    <div class="caption">
                      <h4><a href="product.html">دوربین دیجیتال حرفه ای</a></h4>
                      <p class="price"> <span class="price-new">92000 تومان</span> <span class="price-old">98000 تومان</span> <span class="saving">-6%</span> </p>
                    </div>
                    <div class="button-group">
                      <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                      <div class="add-to-links">
                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="tab-cat4" class="tab_content">
                <div class="owl-carousel latest_category_tabs">
                  <div class="product-thumb">
                    <div class="image"><a href="product.html"><img src="image/product/samsung_tab_1-220x330.jpg" alt="تبلت ایسر" title="تبلت ایسر" class="img-responsive" /></a></div>
                    <div class="caption">
                      <h4><a href="product.html">تبلت ایسر</a></h4>
                      <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">240000 تومان</span> <span class="saving">-5%</span> </p>
                      <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                    </div>
                    <div class="button-group">
                      <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                      <div class="add-to-links">
                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                      </div>
                    </div>
                  </div>
                  <div class="product-thumb">
                    <div class="image"><a href="product.html"><img src="image/product/iphone_1-220x330.jpg" alt="آیفون 7" title="آیفون 7" class="img-responsive" /></a></div>
                    <div class="caption">
                      <h4><a href="product.html">آیفون 7</a></h4>
                      <p class="price"> 2200000 تومان </p>
                      <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                    </div>
                    <div class="button-group">
                      <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                      <div class="add-to-links">
                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                      </div>
                    </div>
                  </div>
                  <div class="product-thumb">
                    <div class="image"><a href="product.html"><img src="image/product/ipod_touch_1-220x330.jpg" alt="سامسونگ گلکسی s7" title="سامسونگ گلکسی s7" class="img-responsive" /></a></div>
                    <div class="caption">
                      <h4><a href="product.html">سامسونگ گلکسی s7</a></h4>
                      <p class="price"> <span class="price-new">62000 تومان</span> <span class="price-old">122000 تومان</span> <span class="saving">-50%</span> </p>
                    </div>
                    <div class="button-group">
                      <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                      <div class="add-to-links">
                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                      </div>
                    </div>
                  </div>
                  <div class="product-thumb">
                    <div class="image"><a href="product.html"><img src="image/product/palm_treo_pro_1-220x330.jpg" alt="موبایل HTC M7" title="موبایل HTC M7" class="img-responsive" /></a></div>
                    <div class="caption">
                      <h4><a href="product.html">موبایل HTC M7</a></h4>
                      <p class="price"> 377000 تومان </p>
                    </div>
                    <div class="button-group">
                      <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                      <div class="add-to-links">
                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="tab-cat5" class="tab_content">
                <div class="owl-carousel latest_category_tabs">
                  <div class="product-thumb">
                    <div class="image"><a href="product.html"><img src="image/product/samsung_tab_1-220x330.jpg" alt="تبلت ایسر" title="تبلت ایسر" class="img-responsive" /></a></div>
                    <div class="caption">
                      <h4><a href="product.html">تبلت ایسر</a></h4>
                      <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">240000 تومان</span> <span class="saving">-5%</span> </p>
                      <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                    </div>
                    <div class="button-group">
                      <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                      <div class="add-to-links">
                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                      </div>
                    </div>
                  </div>
                  <div class="product-thumb">
                    <div class="image"><a href="product.html"><img src="image/product/ipod_classic_1-220x330.jpg" alt="آیپاد نسل 5" title="آیپاد نسل 5" class="img-responsive" /></a></div>
                    <div class="caption">
                      <h4><a href="product.html">آیپاد نسل 5</a></h4>
                      <p class="price"> 122000 تومان </p>
                    </div>
                    <div class="button-group">
                      <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                      <div class="add-to-links">
                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                      </div>
                    </div>
                  </div>
                  <div class="product-thumb">
                    <div class="image"><a href="product.html"><img src="image/product/macbook_pro_1-220x330.jpg" alt=" کتاب آموزش باغبانی " title=" کتاب آموزش باغبانی " class="img-responsive" /></a></div>
                    <div class="caption">
                      <h4><a href="product.html"> کتاب آموزش باغبانی </a></h4>
                      <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">120000 تومان</span> <span class="saving">-26%</span> </p>
                    </div>
                    <div class="button-group">
                      <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                      <div class="add-to-links">
                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                      </div>
                    </div>
                  </div>
                  <div class="product-thumb">
                    <div class="image"><a href="product.html"><img src="image/product/macbook_air_1-220x330.jpg" alt="لپ تاپ ایلین ور" title="لپ تاپ ایلین ور" class="img-responsive" /></a></div>
                    <div class="caption">
                      <h4><a href="product.html">لپ تاپ ایلین ور</a></h4>
                      <p class="price"> <span class="price-new">10 میلیون تومان</span> <span class="price-old">12 میلیون تومان</span> <span class="saving">-5%</span> </p>
                    </div>
                    <div class="button-group">
                      <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                      <div class="add-to-links">
                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                      </div>
                    </div>
                  </div>
                  <div class="product-thumb">
                    <div class="image"><a href="product.html"><img src="image/product/macbook_1-220x330.jpg" alt="آیدیا پد یوگا" title="آیدیا پد یوگا" class="img-responsive" /></a></div>
                    <div class="caption">
                      <h4><a href="product.html">آیدیا پد یوگا</a></h4>
                      <p class="price"> 211000 تومان </p>
                      <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                    </div>
                    <div class="button-group">
                      <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                      <div class="add-to-links">
                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                      </div>
                    </div>
                  </div>
                  <div class="product-thumb">
                    <div class="image"><a href="product.html"><img src="image/product/ipod_nano_1-220x330.jpg" alt="پخش کننده موزیک" title="پخش کننده موزیک" class="img-responsive" /></a></div>
                    <div class="caption">
                      <h4><a href="product.html">پخش کننده موزیک</a></h4>
                      <p class="price"> 122000 تومان </p>
                    </div>
                    <div class="button-group">
                      <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                      <div class="add-to-links">
                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                      </div>
                    </div>
                  </div>
                  <div class="product-thumb">
                    <div class="image"><a href="product.html"><img src="image/product/FinePix-Long-Zoom-Camera-220x330.jpg" alt="دوربین فاین پیکس" title="دوربین فاین پیکس" class="img-responsive" /></a></div>
                    <div class="caption">
                      <h4><a href="product.html">دوربین فاین پیکس</a></h4>
                      <p class="price"> 122000 تومان </p>
                    </div>
                    <div class="button-group">
                      <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                      <div class="add-to-links">
                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                      </div>
                    </div>
                  </div>
                  <div class="product-thumb">
                    <div class="image"><a href="product.html"><img src="image/product/ipod_shuffle_1-220x330.jpg" alt="لپ تاپ hp پاویلیون" title="لپ تاپ hp پاویلیون" class="img-responsive" /></a></div>
                    <div class="caption">
                      <h4><a href="product.html">لپ تاپ hp پاویلیون</a></h4>
                      <p class="price"> 122000 تومان </p>
                    </div>
                    <div class="button-group">
                      <button class="btn-primary" type="button" onClick="cart.add('34');"><span>افزودن به سبد</span></button>
                      <div class="add-to-links">
                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick="wishlist.add('34');"><i class="fa fa-heart"></i></button>
                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick="compare.add('34');"><i class="fa fa-exchange"></i></button>
                      </div>
                    </div>
                  </div>
                  <div class="product-thumb">
                    <div class="image"><a href="product.html"><img src="image/product/ipod_touch_1-220x330.jpg" alt="سامسونگ گلکسی s7" title="سامسونگ گلکسی s7" class="img-responsive" /></a></div>
                    <div class="caption">
                      <h4><a href="product.html">سامسونگ گلکسی s7</a></h4>
                      <p class="price"> <span class="price-new">62000 تومان</span> <span class="price-old">122000 تومان</span> <span class="saving">-50%</span> </p>
                    </div>
                    <div class="button-group">
                      <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                      <div class="add-to-links">
                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                      </div>
                    </div>
                  </div>
                  <div class="product-thumb">
                    <div class="image"><a href="product.html"><img src="image/product/nikon_d300_1-220x330.jpg" alt="دوربین دیجیتال حرفه ای" title="دوربین دیجیتال حرفه ای" class="img-responsive" /></a></div>
                    <div class="caption">
                      <h4><a href="product.html">دوربین دیجیتال حرفه ای</a></h4>
                      <p class="price"> <span class="price-new">92000 تومان</span> <span class="price-old">98000 تومان</span> <span class="saving">-6%</span> </p>
                    </div>
                    <div class="button-group">
                      <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                      <div class="add-to-links">
                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="tab-cat6" class="tab_content">
                <div class="owl-carousel latest_category_tabs">
                  <div class="product-thumb">
                    <div class="image"><a href="product.html"><img src="image/product/ipod_classic_1-220x330.jpg" alt="آیپاد نسل 5" title="آیپاد نسل 5" class="img-responsive" /></a></div>
                    <div class="caption">
                      <h4><a href="product.html">آیپاد نسل 5</a></h4>
                      <p class="price"> 122000 تومان </p>
                    </div>
                    <div class="button-group">
                      <button class="btn-primary" type="button" onClick="cart.add('48');"><span>افزودن به سبد</span></button>
                      <div class="add-to-links">
                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                      </div>
                    </div>
                  </div>
                  <div class="product-thumb">
                    <div class="image"><a href="product.html"><img src="image/product/ipod_nano_1-220x330.jpg" alt="پخش کننده موزیک" title="پخش کننده موزیک" class="img-responsive" /></a></div>
                    <div class="caption">
                      <h4><a href="product.html">پخش کننده موزیک</a></h4>
                      <p class="price"> 122000 تومان </p>
                    </div>
                    <div class="button-group">
                      <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                      <div class="add-to-links">
                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- دسته ها محصولات Slider End-->

          <!-- دسته ها محصولات Slider Start -->
          <h3 class="subtitle">البسه - <a class="viewall" href="category.html">نمایش همه</a></h3>
          <div class="owl-carousel latest_category_carousel">
            <div class="product-thumb">
              <div class="image"><a href="product.html"><img src="image/product/iphone_6-220x330.jpg" alt="کرم مو آقایان" title="کرم مو آقایان" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="product.html">کرم مو آقایان</a></h4>
                <p class="price"> 42300 تومان </p>
                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
              </div>
              <div class="button-group">
                <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                <div class="add-to-links">
                  <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                  <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                </div>
              </div>
            </div>
            <div class="product-thumb">
              <div class="image"><a href="product.html"><img src="image/product/nikon_d300_5-220x330.jpg" alt="محصولات مراقبت از مو" title="محصولات مراقبت از مو" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="product.html">محصولات مراقبت از مو</a></h4>
                <p class="price"> <span class="price-new">66000 تومان</span> <span class="price-old">90000 تومان</span> <span class="saving">-27%</span> </p>
                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
              </div>
              <div class="button-group">
                <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                <div class="add-to-links">
                  <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                  <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                </div>
              </div>
            </div>
            <div class="product-thumb">
              <div class="image"><a href="product.html"><img src="image/product/nikon_d300_4-220x330.jpg" alt="کرم لخت کننده مو" title="کرم لخت کننده مو" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="product.html">کرم لخت کننده مو</a></h4>
                <p class="price"> 88000 تومان </p>
              </div>
              <div class="button-group">
                <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                <div class="add-to-links">
                  <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                  <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                </div>
              </div>
            </div>
            <div class="product-thumb">
              <div class="image"><a href=""><img src="image/product/macbook_5-220x330.jpg" alt="ژل حمام بانوان" title="ژل حمام بانوان" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="product.html">ژل حمام بانوان</a></h4>
                <p class="price"> <span class="price-new">19500 تومان</span> <span class="price-old">21900 تومان</span> <span class="saving">-4%</span> </p>
              </div>
              <div class="button-group">
                <button class="btn-primary" type="button" onClick="cart.add('61');"><span>افزودن به سبد</span></button>
                <div class="add-to-links">
                  <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick="wishlist.add('61');"><i class="fa fa-heart"></i></button>
                  <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick="compare.add('61');"><i class="fa fa-exchange"></i></button>
                </div>
              </div>
            </div>
            <div class="product-thumb">
              <div class="image"><a href="product.html"><img src="image/product/macbook_4-220x330.jpg" alt="عطر گوچی" title="عطر گوچی" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="product.html">عطر گوچی</a></h4>
                <p class="price"> 85000 تومان </p>
                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
              </div>
              <div class="button-group">
                <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                <div class="add-to-links">
                  <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                  <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                </div>
              </div>
            </div>
            <div class="product-thumb">
              <div class="image"><a href="product.html"><img src="image/product/macbook_3-220x330.jpg" alt="رژ لب گارنیر" title="رژ لب گارنیر" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="product.html">رژ لب گارنیر</a></h4>
                <p class="price"> 123000 تومان </p>
              </div>
              <div class="button-group">
                <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                <div class="add-to-links">
                  <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                  <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                </div>
              </div>
            </div>
            <div class="product-thumb">
              <div class="image"><a href="product.html"><img src="image/product/macbook_2-220x330.jpg" alt="عطر نینا ریچی" title="عطر نینا ریچی" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="product.html">عطر نینا ریچی</a></h4>
                <p class="price"> 110000 تومان </p>
              </div>
              <div class="button-group">
                <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                <div class="add-to-links">
                  <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                  <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                </div>
              </div>
            </div>
          </div>
          <!-- دسته ها محصولات Slider End -->

          <!-- برند Logo Carousel Start-->
          <div id="carousel" class="owl-carousel nxt">
                @foreach ($brands as $brand)
                    <div class="item text-center">
                        <a href="#">
                            <img src="{{str_replace('public','/storage',$brand->image)}}"
                            alt="{{$brand->name}}" class="img-responsive" />
                        </a>
                    </div>
                @endforeach
          </div>
          <!-- برند Logo Carousel End -->
        </div>
        <!--Middle Part End-->
      </div>
    </div>
  </div>
  <!-- Feature Box Start-->
    <div class="container">
      <div class="custom-feature-box row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="feature-box fbox_1">
            <div class="title">ارسال رایگان</div>
            <p>برای خرید های بیش از 100 هزار تومان</p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="feature-box fbox_2">
            <div class="title">پس فرستادن رایگان</div>
            <p>بازگشت کالا تا 24 ساعت پس از خرید</p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="feature-box fbox_3">
            <div class="title">کارت هدیه</div>
            <p>بهترین هدیه برای عزیزان شما</p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="feature-box fbox_4">
            <div class="title">امتیازات خرید</div>
            <p>از هر خرید امتیاز کسب کرده و از آن بهره بگیرید</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Feature Box End-->
@endsection
