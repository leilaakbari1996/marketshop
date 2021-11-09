@extends('client.layout.master')
@section('style')
    <style>
        .h3{
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        @include('admin.layout.success')
        <h4 class="h3">لطفا خطایی که به آن بر خوردید رایادداشت کنید.</h4><br>
        <form method="POST" action="{{route('client.bug.store')}}">
            @csrf
            <div class="form-group">
                 <textarea name="bug" id="bug" style="width: 100%"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" style="float: left;border-radius:5px">ثبت خطا</button>
            <div class="clear"></div><br>
        </form>
    </div>
@endsection





