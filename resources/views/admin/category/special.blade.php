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
                            <form action="{{route('admin.category.special.store')}}" method="POST">
                                @csrf
                                @if (count($categories) > 0)
                                       @php
                                           $special = $specialCategory->first();
                                       @endphp
                                        <select class="form-control select2" style="width: 100%;" name="category_id">
                                            <option selected="selected" value="">دسته بندی ویژه را وارد کنید...</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{$category->id}}"
                                                        @if ($specialCategory->count() > 0 &&
                                                        $special->category_id == $category->id)
                                                            selected
                                                        @endif
                                                        >{{$category->name}}</option>
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
                                <br>
                                <div class="form-group" style="text-align: left">
                                    <input type="submit" class="btn btn-success btn-sm"
                                    value="ثبت دسته بندی ویژه" >
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

