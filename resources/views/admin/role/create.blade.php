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
                            <form action="{{route('admin.role.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">عنوان نقش</label>
                                    <input type="text" name="title" id="title" class="form-control select2"
                                    style="width: 100%;">
                                </div>
                                <div class="row">
                                    @foreach ($permissions as $permission)
                                        <div class="col-lg-3">
                                            <input type="checkbox" name="permissions[]" id="permissions"
                                            value="{{$permission->id}}">&nbsp; {{$permission->lable}}
                                        </div>
                                    @endforeach
                                </div>
                                <div class="form-group" style="text-align: left">
                                    <input type="submit" class="btn btn-success btn-sm"
                                    value="ثبت نقش" >
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

