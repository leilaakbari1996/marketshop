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
              @if (count($supports) > 0)
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <td class="text-right">پیام ارسالی شما</td>
                        <td class="text-right">جواب ادمین</td>
                        <td class="text-right">وضعیت</td>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($supports as $support)
                                <tr>
                                    <td class="text-right"><div class="text-primary">{{$support->msg}}</div></td>
                                    <td class="text-right">
                                        @if ($support->answer != null )
                                        {{$support->answer}}
                                        @endif
                                    </td>
                                    <td class="text-left">
                                        @if ($support->status == 1)
                                            <input type="button" value="پیام شما تایید شد." class="btn btn-sm btn-success">
                                        @elseif ($support->status == 0)
                                            <input type="button" value="در صف تایید" class="btn btn-sm btn-primary">
                                        @else
                                            <input type="button" value=" پیام شما به دلیل مغایرت با قوانین سایت حذف شد" class="btn btn-sm btn-danger">
                                        @endif
                                    </td>

                                </tr>

                        @endforeach
                    </tbody>
                </table>
              @endif
          </div>
        </div>
        <!--Middle Part End -->
      </div>
    </div>
  </div>
@endsection
