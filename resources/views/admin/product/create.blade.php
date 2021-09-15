@extends('admin.layout.master')
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
                                            <a href="{{route('admin.brand.create')}}" class="btn btn-sm btn-dark"
                                            style="text-decoration: none">ثبت برند</a>

                                        </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">دسته بندی :</label>
                                        @if (count($categories) > 0)
                                            <select class="form-control select2" style="width: 100%;" name="category_id">
                                                <option selected="selected" value="">دسته بندی محصول را وارد کنید...</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        @else
                                        <div class="alert alert-info alert-dismissible">
                                            <h5><i class="icon fa fa-info"></i> توجه!</h5>
                                            هیچ دسته بندی ثبت نشده است.لطفا ابتدا دسته بندی را ثبت کنید.
                                            <a href="{{route('admin.category.create')}}" class="btn btn-sm btn-dark"
                                            style="text-decoration: none">ثبت دسته بندی</a>

                                        </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="image">تصویر</label>
                                        <input type="file" name="image">
                                    </div>
                                    <div class="form-group">
                                        <label for="number">تعداد</label>
                                        <input type="number" name="number" id="number" class="form-control select2">
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

