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
              @if (count($comments) > 0)
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <td class="text-right">نظر شما</td>
                        <td class="text-right">محصولی که برای آن نظر ارسال کرده اید</td>
                        <td class="text-right">وضعیت</td>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $comment)
                                <tr>
                                    <td class="text-right">
                                        {{$comment->comment}}
                                    </td>
                                    <td class="text-left"><a href="{{route('client.product.show',$comment->product)}}">{{$comment->product->name}}</a></td>
                                    <td class="text-left">
                                        @if ($comment->is_confirm == 1)
                                            <input type="button" class="btn btn-sm btn-success" value="تایید شد و هم اکنون جز نظرات می باشد">
                                        @elseif ($comment->is_confirm == 0)
                                            <input type="button" value="در صف تایید" class="btn btn-sm btn-primary">
                                        @else
                                            <input type="button" value="نظر شما به دلیل مغایرت با قوانین سایت حذف شد" class="btn btn-sm btn-danger">
                                        @endif
                                    </td>

                                </tr>

                        @endforeach
                    </tbody>
                </table>
              @else
                <div class="alert alert-info alert-dismissible">
                    <h5><i class="icon fa fa-info"></i> توجه!</h5>
                    هیچ کامنی هنوز ثبت نشده است.
                </div>
              @endif
          </div>
        </div>
        <!--Middle Part End -->
      </div>
    </div>
  </div>
@endsection
