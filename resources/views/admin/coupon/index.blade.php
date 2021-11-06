@extends('admin.layout.master')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
                @if (count($coupons) == 0)
                    <div class="alert alert-info alert-dismissible">
                        <h5><i class="icon fa fa-info"></i> توجه!</h5>
                          هنوز هیچ کد تخفیفی ثبت نشده است!
                         <a href="{{route('admin.coupon.create')}}" style="text-decoration: none"
                         class="btn btn-sm btn-dark">ثبت کد تخفیف</a>
                    </div>
                @else
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>نام</td>
                                <td>مقدار</td>
                                <td>تاریخ شروع</td>
                                <td>تاریخ پایان</td>
                                <td>ویرایش</td>
                                <td>حذف</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coupons as $coupon)
                                <tr>
                                    <td>{{$coupon->id}}</td>
                                    <td>{{$coupon->name}}</td>
                                    <td>{{$coupon->value}}</td>
                                    <td>{{$coupon->starts_at}}</td>
                                    <td>{{$coupon->expires_at}}</td>
                                    <td>
                                        @if($coupon->expires_at < $date && $coupon->expires_at != null)
                                            <button class='btn btn-danger btn-sm'>این کد تخفیف منقضی شده است</button>
                                            <a href="{{route('admin.coupon.edit',$coupon)}}"
                                            class="btn btn-sm btn-info">ویرایش</a>
                                        @else
                                            <a href="{{route('admin.coupon.edit',$coupon)}}"
                                            class="btn btn-sm btn-info">ویرایش</a>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{route('admin.coupon.destroy',$coupon)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-sm btn-danger" value="حذف"
                                                onclick="return confirm('آیا مطمن هستید می خواهید این کد تخفیف را حذف کنید؟')">
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
<script>
  $(function () {
    $("#example1").DataTable({
        "language": {
            "paginate": {
                "next": "بعدی",
                "previous" : "قبلی"
            }
        },
        "info" : false,
    });
    $('#example2').DataTable({
        "language": {
            "paginate": {
                "next": "بعدی",
                "previous" : "قبلی"
            }
        },
      "info" : false,
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "autoWidth": false
    });
  });
</script>

@endsection
