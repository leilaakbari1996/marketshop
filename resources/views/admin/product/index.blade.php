@extends('admin.layout.master')
@section('style')
    <style>
        .table{

            overflow-x: auto;
            white-space: nowrap;

        }
    </style>
@endsection
@section('content')

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-body div">

                @if (count($products) == 0)
                    <div class="alert alert-info alert-dismissible">
                        <h5><i class="icon fa fa-info"></i> توجه!</h5>
                          هنوز هیچ محصولی ثبت نشده است!
                         <a href="{{route('admin.product.create')}}" style="text-decoration: none"
                         class="btn btn-sm btn-dark">ثبت محصول</a>
                    </div>
                @else
                    <table id="example2" class="table table-bordered table-hover div-table">
                        <thead>
                            <tr>
                                <td >#</td>
                                <td >نام</td>
                                <td>اسلاگ</td>
                                <td>دسته بندی</td>
                                <td>برند</td>
                                <td>قیمت</td>
                                <td>تعداد</td>
                                <td>تخفیف</td>
                                <td>تصویر</td>
                                <td>گالری تصاویر</td>
                                <td>ویرایش</td>
                                <td>حذف</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td >{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td >{{$product->slug}}</td>
                                    <td>{{$product->category->name}}</td>
                                    <td >{{$product->brand->name}}</td>
                                    <td >{{$product->price}}</td>
                                    <td>{{$product->number}}</td>
                                    <td >
                                        @if($product->offer > 0)
                                            <a href="{{route('admin.product.offer.edit',$product)}}" class="btn btn-sm btn-primary"
                                            data-toggle="tooltip" title="برای ویرایش تخفیف مربوط به این محصول روی  این گزینه کلیک کنید.">{{$product->offer}}%</a>
                                        @else
                                            <a href="{{route('admin.product.offer.create',$product)}}" class="btn btn-sm btn-success">ایجاد تخفیف</a>
                                        @endif
                                    </td>
                                    <td >
                                        <img src="{{str_replace('public','/storage',$product->image)}}"
                                        alt="{{$product->name}}" width="50">
                                    </td>
                                    <td >
                                        <a class="btn btn-primary" style="color:#fff"
                                        href="{{route('admin.picture.create',$product)}}">گالری تصاویر</a>
                                    </td>
                                    <td ><a href="{{route('admin.product.edit',$product)}}"
                                        class="btn btn-sm btn-info">ویرایش</a></td>
                                    <td >
                                        <form action="{{route('admin.product.destroy',$product)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-sm btn-danger" value="حذف"
                                                onclick="return confirm('آیا مطمن هستید می خواهید این محصول را حذف کنید؟')">
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
