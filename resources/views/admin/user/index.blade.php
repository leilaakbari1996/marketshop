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
                                <td>کاربر</td>
                                <td> نقش</td>
                                <td>حذف</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if ($user->role_id != null)
                                            <a href="{{route('admin.user.edit',$user)}}"
                                            class="btn btn-sm btn-info" data-toggle="tooltip" title="برای تغییر دادن نقش کاربر روی این گزینه کلیک کنید.">{{$user->role->title}}</a>
                                        @else
                                            <a href="{{route('admin.user.edit',$user)}}"
                                            class="btn btn-sm btn-info">ویرایش نقش</a>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{route('admin.user.destroy',$user)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-sm btn-danger" value="حذف" onclick="return confirm('آیا مطمن هستید می خواهید این کاربر را حذف کنید؟')">
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
