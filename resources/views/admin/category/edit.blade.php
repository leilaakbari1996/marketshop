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
                            <form action="{{route('admin.category.update',$categoryMain)}}" method="POST">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label for="category_id">والد</label>
                                    <select class="form-control select2" style="width: 100%;" name="category_id">
                                        <option selected="selected" value="">لطفا دسته بندی والد را انتخاب کنید...</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}"
                                                @if ($categoryMain->category_id == $category->id)
                                                     selected
                                                @endif
                                                >{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">عنوان دسته بندی</label>
                                    <input type="text" name="name" id="name" class="form-control select2"
                                    style="width: 100%;" value="{{$categoryMain->name}}">
                                </div>
                                <div class="form-group" style="text-align: left">
                                    <input type="submit" class="btn btn-success btn-sm"
                                    value=" ویرایش دسته بندی" >
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

