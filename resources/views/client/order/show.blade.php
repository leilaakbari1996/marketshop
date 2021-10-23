@php
    use App\Models\Cart;
@endphp
@extends('client.layout.master')
@section('content')
<div id="container">
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="#">حساب کاربری</a></li>
        <li><a href="wishlist.html">{{$title}}</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
          <h1 class="title">{{$title}}</h1>
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td class="text-center">تصویر</td>
                  <td class="text-left">نام محصول</td>
                  <td class="text-right">مقدار</td>
                  <td class="text-right">قیمت خرید</td>
                </tr>
              </thead>
              <tbody>
                  @foreach ($orderdeitals as $orderdeital)
                    @php
                        $product = $orderdeital->product;
                    @endphp
                    <tr>
                        <td class="text-center">
                            <a href="{{route('client.product.show',$product)}}">
                                <img src="{{$product->image_path}}" alt="{{$product->name}}"
                                title="{{$product->name}}" />
                            </a>
                        </td>
                        <td class="text-left"><a href="{{route('client.product.show',$product)}}">{{$product->name}}</a></td>
                        <td class="text-left">{{$orderdeital->quantity}}</td>
                        <td class="text-right"><div class="price"> {{$orderdeital->amount_unit}} تومان </div></td>
                    </tr>
                  @endforeach
              </tbody>
            </table>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td class="text-right"><strong>جمع کل</strong></td>
                        <td class="text-right"><span class="totalPrice">{{$order->price}}</span> تومان</td>
                    </tr>
                    <tr>
                        <td><strong>آدرس</strong></td>
                        <td>{{$order->address}}</td>
                    </tr>
                    <tr>
                        <td><strong>کد پستی</strong></td>
                        <td>{{$order->postcode}}</td>
                    </tr>
                </tbody>
            </table>
          </div>
        </div>
        <!--Middle Part End -->
      </div>
    </div>
  </div>
@endsection
