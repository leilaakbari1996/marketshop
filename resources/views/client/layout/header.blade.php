@php
    use App\Models\Cart;
    use App\Models\Product;
@endphp
<!DOCTYPE html>
<html dir="rtl">
<head>
<meta charset="UTF-8" />
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="image/favicon.png" rel="icon" />
<title>{{$title}}</title>
<meta name="description" content="Responsive and clean html template design for any kind of ecommerce webshop">
<!-- CSS Part Start-->
<link rel="stylesheet" type="text/css" href="/client/js/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="/client/js/bootstrap/css/bootstrap-rtl.min.css" />
<link rel="stylesheet" type="text/css" href="/client/css/font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="/client/css/stylesheet.css" />
<link rel="stylesheet" type="text/css" href="/client/css/owl.carousel.css" />
<link rel="stylesheet" type="text/css" href="/client/css/owl.transitions.css" />
<link rel="stylesheet" type="text/css" href="/client/css/responsive.css" />
<link rel="stylesheet" type="text/css" href="/client/css/stylesheet-rtl.css" />
<link rel="stylesheet" type="text/css" href="/client/css/responsive-rtl.css" />
<link rel="stylesheet" type="text/css" href="/client/css/stylesheet-skin2.css" />
<style>
    .like{
        color: red;
    }
</style>
@yield('style')
<style>
    .btn-change{
        width: 27px;
        height: 27px;
        border-radius: 5px;
        margin: 5px;
    }
    .btn-input{
        height: 25px;
        width:25px;
        padding-right:8px;
        border: 0;
    }
    .btn-edit{
        border: 0;
        background: #fff;
    }
    .clear{
        clear: both;
    }
</style>
<!-- CSS Part End-->
</head>
<body>
<div class="wrapper-wide">
  <div id="header">
    <!-- Top Bar Start-->
    <nav id="top" class="htop">
      <div class="container">
        <div class="row"> <span class="drop-icon visible-sm visible-xs"><i class="fa fa-align-justify"></i></span>
          <div class="pull-left flip left-top">
            <div class="links">
              <ul>
                <li class="mobile"><i class="fa fa-phone"></i>+21 9898777656</li>
                <li class="email"><a href="mailto:info@marketshop.com"><i class="fa fa-envelope"></i>info@marketshop.com</a></li>
                <li class="wrap_custom_block hidden-sm hidden-xs"><a>بلاک سفارشی<b></b></a>
                  <div class="dropdown-menu custom_block">
                    <ul>
                      <li>
                        <table>
                          <tbody>
                            <tr>
                              <td><img alt="" src="image/banner/cms-block.jpg"></td>
                              <td><img alt="" src="image/banner/responsive.jpg"></td>
                            </tr>
                            <tr>
                              <td><h4>بلاک های محتوا</h4></td>
                              <td><h4>قالب واکنش گرا</h4></td>
                            </tr>
                            <tr>
                              <td>این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html نوشتاری یا تصویری را در آن قرار دهید.</td>
                              <td>این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html نوشتاری یا تصویری را در آن قرار دهید.</td>
                            </tr>
                            <tr>
                              <td><strong><a class="btn btn-default btn-sm" href="#">ادامه مطلب</a></strong></td>
                              <td><strong><a class="btn btn-default btn-sm" href="#">ادامه مطلب</a></strong></td>
                            </tr>
                          </tbody>
                        </table>
                      </li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
            <div id="language" class="btn-group">
              <button class="btn-link dropdown-toggle" data-toggle="dropdown"> <span> <img src="image/flags/gb.png" alt="انگلیسی" title="انگلیسی">انگلیسی <i class="fa fa-caret-down"></i></span></button>
              <ul class="dropdown-menu">
                <li>
                  <button class="btn btn-link btn-block language-select" type="button" name="GB"><img src="image/flags/gb.png" alt="انگلیسی" title="انگلیسی" /> انگلیسی</button>
                </li>
                <li>
                  <button class="btn btn-link btn-block language-select" type="button" name="GB"><img src="image/flags/ar.png" alt="عربی" title="عربی" /> عربی</button>
                </li>
              </ul>
            </div>
            <div id="currency" class="btn-group">
              <button class="btn-link dropdown-toggle" data-toggle="dropdown"> <span> تومان <i class="fa fa-caret-down"></i></span></button>
              <ul class="dropdown-menu">
                <li>
                  <button class="currency-select btn btn-link btn-block" type="button" name="EUR">€ Euro</button>
                </li>
                <li>
                  <button class="currency-select btn btn-link btn-block" type="button" name="GBP">£ Pound Sterling</button>
                </li>
                <li>
                  <button class="currency-select btn btn-link btn-block" type="button" name="USD">$ USD</button>
                </li>
              </ul>
            </div>
          </div>
          @auth
            <div id="top-links" class="nav pull-right flip">
                <ul>
                    @php
                        $user = auth()->user();
                    @endphp
                    <li class="btn btn-sm btn-warning" style="margin-top:15px">
                        <a href="{{route('client.user.show',$user)}}"
                        style="text-decoration: none;color:#fff;font-size:15px">{{$user->name}}</a>
                    </li>
                    <li class="btn btn-sm btn-danger" style="margin-top:15px">
                        <a href="{{route('client.user.logout')}}"
                        style="text-decoration: none;color:#fff;font-size:15px">خروج</a>
                    </li>
                </ul>
            </div>
          @else
            <div id="top-links" class="nav pull-right flip">
                <ul>
                <li class="btn btn-sm btn-warning" style="margin-top:15px"><a href="{{route('client.register.create')}}"
                    style="text-decoration: none;color:#fff;font-size:15px">ورود/ثبت نام</a></li>
                </ul>
            </div>
          @endauth
        </div>
      </div>
    </nav>
    <!-- Top Bar End-->
    <!-- Header Start-->
    <header class="header-row">
      <div class="container">
        <div class="table-container">
          <!-- Logo Start -->
          <div class="col-table-cell col-lg-6 col-md-6 col-sm-12 col-xs-12 inner">
            <div id="logo"><a href="index.html"><img class="img-responsive" src="image/logo.png" title="MarketShop" alt="MarketShop" /></a></div>
          </div>
          <!-- Logo End -->
          <!-- Mini Cart Start-->
          <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div id="cart">
              <button type="button" data-toggle="dropdown" data-loading-text="بارگذاری ..." class="heading dropdown-toggle">
                    <span class="cart-icon pull-left flip"></span>
                    <span id="cart-total">
                        <span class="totalItem">{{Cart::totalItem()}}</span>
                        آیتم -
                        <span class="totalPriceWithDiscount">

                            {{Cart::totalPriceWithDiscount()}}
                        </span>
                        تومان
                    </span>
                </button>
                <ul class="dropdown-menu">
                        <li>
                            <table class="table">
                                <tbody id="cart-table-body">
                                    @if (Cart::is_session('cart'))
                                        @foreach ($carts as $itemCart)
                                                @php
                                                    $product = $itemCart['product'];
                                                @endphp
                                                <tr class="cart-row-{{$product->id}}">
                                                    <td class="text-center">
                                                        <a href="{{route('client.product.show',$product)}}">
                                                            <img class="img-thumbnail" title="{{$product->name}}" width="50"
                                                            alt="{{$product->name}}" src="{{Product::get_image($product->image)}}">
                                                        </a>
                                                    </td>
                                                    <td class="text-left">
                                                        <a href="{{route('client.product.show',$product)}}">{{$product->name}}</a>
                                                    </td>
                                                    <td class="text-right">
                                                        @include('client.product.quantity',[
                                                            'product' => $product,
                                                            'condition' => 1
                                                        ])
                                                    </td>
                                                    <td class="text-right">{{$product->cost_with_discount}} تومان</td>
                                                    <td class="text-center">
                                                        <button class="btn btn-danger btn-xs remove" title="حذف"
                                                        onClick="removeFromCart({{$product->id}})"
                                                        type="button"><i class="fa fa-times"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </li>
                        <li>
                            <div>
                                <table class="table table-bordered">
                                <tbody>
                                        <tr>
                                            <td class="text-right"><strong>جمع کل</strong></td>
                                            <td class="text-right"><span class="totalPrice">{{Cart::totalPrice()}}</span> تومان</td>
                                        </tr>
                                        <tr>
                                            <td class="text-right"><strong>کسر هدیه</strong></td>
                                            <td class="text-right"><span class="gift"> {{Cart::totalPrice() - Cart::totalPriceWithDiscount()}}</span> تومان</td>
                                        </tr>
                                        <tr>
                                            <td class="text-right"><strong>قابل پرداخت</strong></td>
                                            <td class="text-right"><span class="totalPriceWithDiscount">{{Cart::totalPriceWithDiscount()}}</span> تومان</td>
                                        </tr>
                                </tbody>
                                </table>
                                <p class="checkout">
                                    <a href="{{route('client.cart.index')}}" class="btn btn-primary">
                                        <i class="fa fa-shopping-cart"></i>
                                        مشاهده سبد
                                    </a>
                                    &nbsp;&nbsp;&nbsp;
                                    <a href="checkout.html" class="btn btn-primary">
                                        <i class="fa fa-share"></i>
                                            تسویه حساب
                                    </a>
                                    &nbsp;&nbsp;&nbsp;
                                </p>
                            </div>
                        </li>
                </ul>
            </div>
          </div>
          <!-- Mini Cart End-->
          <!-- جستجو Start-->
          <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12 inner">
            <div id="search" class="input-group">
              <input id="filter_name" type="text" name="search" value="" placeholder="جستجو" class="form-control input-lg" />
              <button type="button" class="button-search"><i class="fa fa-search"></i></button>
            </div>
          </div>
          <!-- جستجو End-->
        </div>
      </div>
    </header>
    <!-- Header End-->
    @include('client.layout.menu')
  </div>
