@extends('admin.layout.master')
@section('style')
    <style>
        .input_property{
            margin-right: 20px;
            margin-left: 5px;
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
                                <form action="{{route('admin.propertyGroup.store')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">عنوان گروه ویژگی</label>
                                        <input type="text" name="name" id="name" class="form-control select2"
                                        style="width: 100%;" required>
                                    </div>
                                    <div class="form-group">
                                        @foreach ($properties as $property)
                                            <input type="checkbox" name="properties[]" value="{{$property->id}}"
                                            class="input_property">{{$property->name}}
                                        @endforeach
                                    </div>
                                    <div class="form-group" style="text-align: left">
                                        <input type="submit" class="btn btn-success btn-sm"
                                        value="ثبت گروه ویژگی">
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

