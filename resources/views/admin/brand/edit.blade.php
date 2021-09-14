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
                                <form action="{{route('admin.brand.update',$brand)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')
                                    <div class="form-group">
                                        <label for="name">عنوان برند</label>
                                        <input type="text" name="name" id="name" class="form-control select2"
                                        style="width: 100%;" value="{{$brand->name}}">
                                    </div>
                                    <div class="form-group">
                                        <input type="file" name="image">
                                        <img src="{{str_replace('public','/storage',$brand->image)}}"
                                        alt="{{$brand->name}}" width="100">
                                    </div>

                                    <div class="form-group" style="text-align: left">
                                        <input type="submit" class="btn btn-success btn-sm"
                                        value="ویرایش برند">
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

