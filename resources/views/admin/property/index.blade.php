@extends('admin.layout.master')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
                @if (count($properteis) == 0)
                    <div class="alert alert-info alert-dismissible">
                        <h5><i class="icon fa fa-info"></i> توجه!</h5>
                          هنوز گروه ویژگی ثبت نشده است!
                         <a href="{{route('admin.propertyGroup.create')}}" style="text-decoration: none"
                         class="btn btn-sm btn-dark">ثبت گروه ویژگی</a>
                    </div>
                @else
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td> ویژگی</td>
                                <td>ویرایش</td>
                                <td>حذف</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($properteis as $property)
                                <tr>
                                    <td>{{$property->id}}</td>
                                    <td>{{$property->name}}</td>
                                    <td>
                                        <a href="{{route('admin.property.edit',$property)}}"
                                        class="btn btn-primary btn-sm">ویرایش</a>
                                    </td>
                                    <td>
                                        <form action="{{route('admin.property.destroy',$property)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-sm btn-danger" value="حذف"
                                                onclick="return confirm('آیا مطمن هستید می خواهید این ویژگی را حذف کنید؟')">
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
