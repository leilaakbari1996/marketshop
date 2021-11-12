@php
    use App\Models\Product;
@endphp
@extends('client.layout.master')
@section('style')
    <style>
        @media only screen and (max-width: 500px) {
            .tabs{
                padding-right: 0;
            }
        }

    </style>
@endsection
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
                <ul id="tabs" class="tabs" >
                    <li><a href="#tab-featured">ویژه</a></li>
                    <li><a href="#tab-latest">جدیدترین</a></li>
                    <li><a href="#tab-bestseller">پرفروش</a></li>
                    <li><a href="#tab-special">پیشنهادی</a></li>
                </ul>
                <div id="tab-featured" class="tab_content">
                    <div class="owl-carousel product_carousel_tab">
                        @if (count($specialProducts) > 0)
                            @foreach ($specialProducts as $product)
                                <div class="clearfix">
                                    @include('client.product.product',[
                                        'product' => $product
                                    ])
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
                        @if (count($newProducts) > 0)
                            @foreach ($newProducts as $newProduct)
                                @include('client.product.product',[
                                    'product' => $newProduct
                                ])
                            @endforeach
                        @else
                        <div class="alert alert-info alert-dismissible">
                            <h5><i class="icon fa fa-info"></i></h5>
                              هنوز هیچ محصولی ثبت نشده است لطفا صبور باشید...
                        </div>
                        @endif
                    </div>
                </div>
                <div id="tab-bestseller" class="tab_content">
                    <div class="owl-carousel product_carousel_tab">

                        @if (count($bestsellers) > 0)
                            @foreach ($bestsellers as $id)
                                @php
                                    $product = Product::query()->where('id',$id)->first();
                                @endphp
                                <div class="clearfix">
                                    @include('client.product.product',[
                                        'product' => $product
                                    ])
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
                <div id="tab-special" class="tab_content">
                    <div class="owl-carousel product_carousel_tab">
                        @if ($propesalProducts->count() == 0)
                            <div class="alert alert-info alert-dismissible">
                                <h5><i class="icon fa fa-info"></i></h5>
                                در این گروه هنوز هیچ محصولی ثبت نشده است لطفا صبور باشید...
                            </div>
                        @else
                            @foreach ($propesalProducts as $propesal)
                                @php
                                    $product = $propesal->get_product();
                                @endphp
                                @include('client.product.product',[
                                    'product' => $product
                                ])
                            @endforeach
                        @endif
                    </div>
                </div>
          </div>    <!-- محصولات Tab Start -->

          <!-- دسته ها محصولات Slider Start-->
          @if ($specialCategory->count() == 0)
            <div class="alert alert-info alert-dismissible">
                <h5><i class="icon fa fa-info"></i> توجه!</h5>
                هنوز هیچ دسته بندی ویژه ای ثبت نشده است.لصفا صبور باشد!
            </div>
         @else
            @php
                $specialCategory = $specialCategory->first();
            @endphp

                <h3 class="subtitle">{{$specialCategory->category->name}} - <a class="viewall"
                    href="{{route('client.category.index',$specialCategory->category)}}">نمایش همه</a>
                </h3>
                <div class="owl-carousel latest_category_carousel">
                    @foreach ($specialCategoryProduct as $product)
                        <div class="clearfix">
                            @include('client.product.product',[
                                'product' => $product
                            ])
                        </div>
                    @endforeach
                </div>


          @endif
          <!-- دسته ها محصولات Slider End-->
          @if (count($productOffers) > 0)
               <!-- دسته ها محصولات Slider Start -->
                <h3 class="subtitle">بیشترین تخفیفات - <a class="viewall" href="{{route('client.offer.index')}}">نمایش همه</a></h3>
                <div class="owl-carousel latest_category_carousel">
                    @foreach ($productOffers as $offer)
                        @php
                            $product = Product::query()->where('id',$offer)->first();
                        @endphp
                        <div class="clearfix">
                                @include('client.product.product',[
                                    'product' => $product
                                ])
                </div>
              @endforeach
          </div>
          <!-- دسته ها محصولات Slider End -->
          @endif

          <!-- برند Logo Carousel Start-->
          <div id="carousel" class="owl-carousel nxt">
                @foreach ($brands as $brand)
                    <div class="item text-center">
                        <a href="#">
                            <img src="{{str_replace('public','/storage',$brand->image)}}"
                            alt="{{$brand->name}}" class="img-responsive" width="150px"/>
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

@endsection

