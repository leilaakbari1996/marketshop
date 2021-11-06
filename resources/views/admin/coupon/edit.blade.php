@extends('admin.layout.master')
@section('style')
    <link rel="stylesheet" href="/admin/dist/css/jquery-ui.css">
@endsection
@section('content')
            <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{route('admin.coupon.update',$coupon)}}" method="POST">
                                    @csrf
                                    @method('patch')
                                    <div class="form-group">
                                        <label for="name">عنوان کد تخفیف</label>
                                        <input type="text" value="{{$coupon->name}}" name="name" id="name" class="form-control select2"
                                        style="width: 100%;" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="value">مقدار کد تخفیف(به تومان)</label>
                                        <input type="text" name="value" value="{{$coupon->value}}" id="value" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="starts_at">تاریخ شروع این کد تخفیف</label>
                                        <input type="text"  name="starts_at" value="{{$coupon->starts_at}}" class="form-control date" style="width: 50%;">
                                    </div>
                                    <div class="form-group">
                                        <label for="expires_at">تاریخ پایان این کد تخفیف</label>
                                        <input type="text" name="expires_at" value="{{$coupon->expires_at}}" class="form-control date" style="width: 50%;">
                                    </div>
                                    <div class="form-group" style="text-align: left">
                                        <input type="submit" class="btn btn-success btn-sm"
                                        value="ویرایش کد تخفیف">
                                    </div>

                                </form>
                            </div>

                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
@endsection

@section('script')
    <script src="/admin/dist/js/jquery-1.12.4.js"></script>
    <script src="/admin/dist/js/jquery-ui.js"></script>
    <script>
        $( function() {
            $('.date').datepicker();  
            $('.date').datepicker({
                    format: 'dd/mm/yy'
            });      
        });
    </script>
@endsection
