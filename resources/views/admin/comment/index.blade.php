@extends('admin.layout.master')
@section('style')
    <style>
        .msg_suport{
            box-shadow: -1px 6px 31px -7px rgba(0,0,0,0.75);
            -webkit-box-shadow: -1px 6px 31px -7px rgba(0,0,0,0.75);
            -moz-box-shadow: -1px 6px 31px -7px rgba(0,0,0,0.75);
            margin: 20px;
            margin-bottom: 40px;
            padding: 10px;
            height: 350px;
        }
        .msg{
            border: 1px solid rgb(211, 204, 204);
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }
    </style>
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
                @if (count($comments) == 0)
                    <div class="alert alert-info alert-dismissible">
                        <h5><i class="icon fa fa-info"></i> توجه!</h5>
                          هنوز هیچ نظری ثبت نشده است...
                    </div>
                @else
                    @foreach ($comments as $comment)
                        <div class="msg_suport">
                            <form action="{{route('admin.comment.update',$comment)}}" method="POST">
                                @csrf
                                @method('patch')
                                <h3>{{$comment->user->name}}</h3>
                                <span>نظر کاربر</span>
                                <input type="hidden" value="{{$comment->id}}" name="id">
                                <div class="msg">
                                    {{$comment->comment}}
                                </div><br>
                                <button type="submit" class="btn btn-sm btn-success" style="float: left;margin-left:10px"
                                onclick="Confirmation({{$comment->id}})">تایید </button>
                            </form>
                            <form action="{{route('admin.comment.destroy',$comment)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger" style="float: left;margin-left:10px"
                                onclick="return confirm('آیا مطمن هستید می خواهید این نظر را حذف کنید؟')">حذف </button>
                                <div class="clear"></div>
                            </form>
                        </div>

                    @endforeach
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

