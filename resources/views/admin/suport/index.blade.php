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
                @if (count($suports) == 0)
                    <div class="alert alert-info alert-dismissible">
                        <h5><i class="icon fa fa-info"></i> توجه!</h5>
                          هنوز هیچ پیامی از طرف کاربران فرستاده نشده...
                    </div>
                @else
                    @foreach ($suports as $suport)
                        <div class="msg_suport">
                            <form action="{{route('admin.suport.store')}}" method="POST">
                                @csrf
                                <h3>{{$suport->user->name}}</h3>
                                <span>پیام کاربر</span>
                                <input type="hidden" value="{{$suport->id}}" name="id">
                                <div class="msg">
                                    {{$suport->msg}}
                                </div><br>
                                <label for="answer">جواب پشتیبان</label>
                                <div>
                                    <textarea name="answer" class="form-control"></textarea>
                                </div><br>
                                <input type="submit" style="float: left" value="فرستادن پاسخ پشتیبانی" class="btn btn-sm btn-success">
                                <div class="clear"></div>
                            </form>
                            <form action="{{route('admin.suport.update',$suport)}}" method="post">
                                @csrf
                                @method('patch')
                                <button type="submit" class="btn btn-sm btn-success" style="float: left;margin-left:10px"
                                onclick="Confirmation({{$suport->id}})">تایید </button>
                                <div class="clear">
                            </form>
                        </div>
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

