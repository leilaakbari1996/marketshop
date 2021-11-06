@php
    use App\Models\Orderdeital;
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
              @if (count($orders) > 0)
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <td class="text-center">تصویر</td>
                        <td class="text-left">نام محصول</td>
                        <td class="text-right">تعداد</td>
                        <td class="text-right">قیمت واحد</td>
                        <td>قیمت کل</td>
                        <td class="text-right">آدرس</td>
                        <td class="text-right">کد پستی</td>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            @php
                                $orderdeitals = Orderdeital::query()->where('order_id',$order->id)->get();
                            @endphp
                            @foreach ($orderdeitals as $orderdeital)
                                @php
                                    $product = $orderdeital->product;
                                @endphp
                                <tr>
                                    <td class="text-center">
                                        <a href="{{route('client.product.show',$product)}}">
                                            <img src="{{$product->image_path}}" alt="{{$product->name}}"
                                            title="{{$product->name}}" width="50" />
                                        </a>
                                    </td>
                                    <td class="text-left"><a href="{{route('client.product.show',$product)}}">{{$product->name}}</a></td>
                                    <td class="text-left">{{$orderdeital->quantity}}</td>
                                    <td class="text-right"><div class="price"> {{$orderdeital->amount_unit}} تومان </div></td>
                                    <td>{{$orderdeital->quantity*$orderdeital->amount_unit}}</td>
                                    <td class="text-right">{{$order->address}}</td>
                                    <td class="text-right">{{$order->postcode}}</td>
                                </tr>
                            @endforeach

                        @endforeach
                    </tbody>
                </table>
              @else
                <div class="alert alert-info alert-dismissible">
                    <h5><i class="icon fa fa-info"></i> توجه!</h5>
                    هنوز هیچ سفارشی ثبت نشده است.
                    <a href="{{route('client.index')}}" class="btn btn-sm btn-dark"
                    style="text-decoration: none">خرید از فروشگاه</a>

                </div>
              @endif
          </div>
        </div>
        <!--Middle Part End -->
      </div>
    </div>
  </div>
@endsection
