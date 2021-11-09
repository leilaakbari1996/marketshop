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
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td class="text-right"><strong>مبلغ قابل پرداخت</strong></td>
                                        <td class="text-right"><span class="totalPriceWithDiscount"
                                            id="totalPriceWithDiscount">{{Cart::totalPriceWithDiscount()}}</span> تومان</td>
                                    </tr>
                                    <tr>
                                        <td><strong>آدرس</strong></td>
                                        <td><span id="address">{{$address}}</span></td>
                                    </tr>
                                    <tr>
                                        <td><strong>کد پستی</strong></td>
                                        <td><span id="codepost">{{$codepost}}</span></td>
                                    </tr>
                                </tbody>
                            </table>
                            <p>در صورتی که کد تخفیف در اختیار دارید میتوانید از آن در اینجا استفاده کنید.</p>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">استفاده از کوپن تخفیف</h4>
                                        </div>
                                        <div id="collapse-coupon" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <label class="col-sm-4 control-label" for="input-coupon">کد تخفیف خود را در اینجا وارد کنید</label>
                                                <div class="input-group">
                                                    <input type="text" name="coupon" value="" placeholder="کد تخفیف خود را در اینجا وارد کنید" id="input-coupon" class="form-control" />
                                                    <span class="input-group-btn">
                                                    <input type="button" value="اعمال کوپن" id="button-coupon" onclick="Coupon()"
                                                    data-loading-text="بارگذاری ..."  class="btn btn-primary" />
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <form action="{{route('client.payment.store')}}" method="POST">
                    @csrf
                    <input type="hidden" value="{{$address}}" name="address">
                    <input type="hidden" name="codepost" value="{{$codepost}}">
                    <input type="hidden" name="totalPriceWithDiscount" class="totalPriceWithDiscount"
                     value="{{Cart::totalPriceWithDiscount()}}">
                    @if (Cart::totalPriceWithDiscount() < 15000)
                        <input type="button" value="پرداخت و ثبت نهایی سفارش" class="btn btn-primary"
                        style="float:left " onclick="alert('مبلغ خرید باید بالای 15000تومان باشد.')">
                    @else
                        <input type="submit" value="پرداخت و ثبت نهایی سفارش" class="btn btn-primary"
                        style="float:left " >
                    @endif
                    <div class="clear"></div>
                </form>
                <!--Middle Part End -->
        </div>
    </div>
</div>
@endsection
