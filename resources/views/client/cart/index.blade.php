@php
    use App\Models\Cart;
    use App\Models\Product;
@endphp
@extends('client.layout.master')
@section('content')
<div id="container">
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="{{route('client.index')}}"><i class="fa fa-home"></i></a></li>
        <li><a href="cart.html">{{$title}}</a></li>
      </ul>
      <div class="basket-empty">
          <div class="empty">
                @if (Cart::is_session('cart'))
                    @if (count(Cart::arrayCart()) > 0)
                            <!-- Breadcrumb End-->
                            <div class="row">
                                <!--Middle Part Start-->
                                <div id="content" class="col-sm-12">
                                <h1 class="title">{{$title}}</h1>
                                <div>
                                    @include('admin.layout.errors')
                                    <form class="form-horizontal" method="POST" action="{{route('client.order.record')}}">
                                        @csrf
                                        <table class="table table-bordered table-hover table-cart">
                                            <thead>
                                                <tr>
                                                <td class="text-center">تصویر</td>
                                                <td class="text-left">نام محصول</td>
                                                <td class="text-left">برند</td>
                                                <td class="text-right">قیمت واحد</td>
                                                <td class="text-right">عملیات</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($carts as $cart)
                                                    @php
                                                        $product = $cart['product'];
                                                    @endphp
                                                    <tr class="cart-row-{{$product->id}}">
                                                        <td class="text-center">
                                                            <a href="{{route('client.product.show',$product)}}">
                                                                <img src="{{$product->image_path}}" alt="{{$product->name}}"
                                                                title="{{$product->name}}" width="50" />
                                                            </a>
                                                        </td>
                                                        <td class="text-left"><a href="{{route('client.product.show',$product)}}">{{$product->name}}</a></td>
                                                        <td class="text-left"> {{$product->brand->name}}</td>
                                                        <td class="text-right"><div class="price"> {{$product->cost_with_discount}} تومان </div></td>
                                                        <td class="text-left"><div class="input-group btn-block quantity">
                                                            <input type="text" name="quantity"  value="{{$cart['quantity']}}" size="1"
                                                            class="form-control input-quantity-{{$product->id}} quantity-{{$product->id}}" />
                                                            <span class="input-group-btn">
                                                            <button type="button" data-toggle="tooltip" title="بروزرسانی" class="btn btn-primary" onclick="updateCart({{$product->id}},{{$product->number}})"><i class="fa fa-refresh"></i></button>
                                                            <button type="button" class="btn btn-danger" onClick="removeFromCart({{$product->id}})"><i class="fa fa-times-circle"></i></button>
                                                            </span></div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                            <h4 class="panel-title">پیش بینی هزینه ی حمل و نقل و مالیات</h4>
                                            </div>
                                            <div id="collapse-shipping" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <p>مقصد خود را جهت براورد هزینه ی 0 تومان وارد کنید.</p>
                                                        <div class="form-group required">
                                                            <label class="col-sm-2 control-label" for="address">آدرس</label>
                                                            <div class="col-sm-10">
                                                                <textarea name="address" id="address" placeholder="آدرس" class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group required">
                                                            <label class="col-sm-2 control-label" for="postcode">کد پستی</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" name="postcode" value="" placeholder="کد پستی" id="postcode"
                                                            class="form-control"  />
                                                            </div>
                                                        </div>
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
                                                                <button type="submit" class="btn btn-primary" style="float: left;"><i class="fa fa-share"></i>
                                                                    ادامه فرایند خرید</button>

                                                                <div class="pull-left"><a href="{{route('client.index')}}" class="btn btn-default">برگشت به فروشگاه</a></div>
                                                                <div class="clear"></div>

                                                            </p>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--Middle Part End -->
                            </div>
                        @else
                            <div style="text-align: center">
                                <img src="/storage/basket.png" alt="سبد خرید">
                                <h4 class="text-danger">سبد خرید شما خالی است!</h4>
                                <a class="btn btn-primary" href="{{route('client.index')}}">خرید از فروشگاه</a>
                            </div>
                        @endif
                @else
                    <div style="text-align: center">
                        <img src="/storage/basket.png" alt="سبد خرید">
                        <h4 class="text-danger">سبد خرید شما خالی است!</h4>
                        <a class="btn btn-primary" href="{{route('client.index')}}">خرید از فروشگاه</a>
                    </div>
                @endif
            </div>
      </div>
    </div>
</div>

@endsection
