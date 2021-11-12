@php
    use App\Models\Product;
@endphp
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
            height: 300px;
        }
        .msg{
            border: 1px solid rgb(211, 204, 204);
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
            height: 90px;
            overflow-y: scroll;

        }
        .btn{
            float: left;margin-left:10px;
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
                @if (count($bugs) == 0)
                    <div class="alert alert-info alert-dismissible">
                        <h5><i class="icon fa fa-info"></i> توجه!</h5>
                          هنوز هیچ خطایی از طرف کاربر فرستاده نشده
                    </div>
                @else
                    @foreach ($bugs as $bug)
                        <div class="msg_suport">

                            <form action="{{route('admin.bug.destroy',$bug)}}" method="post">
                                @csrf
                                @method('delete')
                                <span>خطای در یافتی از طرف کاربر</span>
                                <div class="row">
                                    <div class="col-lg-8 col-sm-12">
                                        <div class="msg">
                                            {{$bug->bug}}
                                        </div><br>
                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        @if ($bug->image != null)
                                            <img src="{{Product::get_image($bug->image)}}" alt="خطا">
                                        @endif
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-danger"
                                onclick="return confirm('آیا مطمن هستید این خطا را حل شده است؟')">تایید و حذف </button>
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
  function slove(bugId){
      $.ajax({
          type:'patch',
          url:'/adminpanel/bug/'+bugId,
          data:{
            _token : '{{csrf_token()}}',
          },success:function(data){
              $('#slove-'+bugId).text('در حال حل این خطا ')
          }
      });
  }
</script>

@endsection

