@extends('admin.layout.master')
@section('style')
    <link rel="stylesheet" href="/admin/dist/css/jquery-ui.css">
    <style>
        #is_date{
            box-shadow: 4px 5px 24px -1px rgba(0,0,0,0.98);
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
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
                                <form action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">نام محصول</label>
                                        <input type="text" name="name" id="name" class="form-control select2"
                                        style="width: 100%;">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">اسلاگ</label>
                                        <input type="text" name="slug" id="slug" class="form-control select2"
                                        style="width: 100%;">
                                    </div>
                                    <div class="form-group">
                                        <label for="brand_id">برند : </label>
                                        @if (count($brands) > 0)
                                            <select class="form-control select2" style="width: 100%;" name="brand_id">
                                                <option selected="selected" value="">برند محصول را وارد کنید...</option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                @endforeach
                                            </select>
                                        @else
                                            <div class="alert alert-info alert-dismissible">
                                                <h5><i class="icon fa fa-info"></i> توجه!</h5>
                                                هیچ برندی ثبت نشده است.لطفا ابتدا برند را ثبت کنید.
                                                @if ($check_brand)
                                                    <a href="{{route('admin.brand.create')}}" class="btn btn-sm btn-dark"
                                                    style="text-decoration: none">ثبت برند</a>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">دسته بندی :</label>
                                        @if (count($categories) > 0)
                                            <select class="form-control select2" style="width: 100%;" name="category_id"
                                            onchange="checkIsDate()" id="category_val">
                                                <option selected="selected" value="">دسته بندی محصول را وارد کنید...</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{$category->id}}" class="category_id_val">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        @else
                                        <div class="alert alert-info alert-dismissible">
                                            <h5><i class="icon fa fa-info"></i> توجه!</h5>
                                            هیچ دسته بندی ثبت نشده است.لطفا ابتدا دسته بندی را ثبت کنید.
                                            @if ($check_category)
                                                <a href="{{route('admin.category.create')}}" class="btn btn-sm btn-dark"
                                                style="text-decoration: none">ثبت دسته بندی</a>
                                            @endif
                                        </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="image">تصویر</label>
                                        <input type="file" name="image">
                                    </div>
                                    <div class="form-group">
                                        <label for="number">تعداد</label>
                                        <input type="text" name="number" id="number" class="form-control select2">
                                    </div>
                                    <div class="form-group">
                                        <label for="price">قیمت</label>
                                        <input type="text" name="price" class="form-control select2">
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">توضیحات</label>
                                        <textarea name="desc" id="desc" class="form-control select2"></textarea>
                                    </div>
                                    <div class="form-group" style="text-align: left">
                                        <input type="submit" class="btn btn-success btn-sm"
                                        value="ثبت محصول">
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
        function checkIsDate(){
            var categoryId = document.getElementById("category_val").value;// id category selected.
            $.ajax({
                type:'get',
                url :'/adminpanel/category/isCheckDate/'+categoryId,
                data:{
                    _token : '{{csrf_token()}}',
                },success:function(data){
                    if(data.is_date == 1){
                        $('#is_date').text('سلام');
                    }else{
                        $('#is_date').text('ki');
                    }

                }
            });

        }
        function checkNumber(){

        }
        function recording(){

        }
    </script>
@endsection

