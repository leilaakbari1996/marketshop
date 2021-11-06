@extends('admin.layout.master')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>نقش</td>
                                <td>ویرایش</td>
                                <td>حذف</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{$role->id}}</td>
                                    <td>{{$role->title}}</td>
                                    <td><a href="{{route('admin.role.edit',$role)}}"
                                        class="btn btn-sm btn-info">ویرایش</a></td>
                                    <td>
                                        <form action="{{route('admin.role.destroy',$role)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-sm btn-danger" value="حذف"
                                                onclick="return confirm('آیا مطمن هستید می خواهید این نقش را حذف کنید؟')">
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
