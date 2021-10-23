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
                                <form action="{{route('admin.propertyGroup.update',$propertyGroup)}}" method="POST">
                                    @csrf
                                    @method('patch')
                                    <div class="form-group">
                                        <label for="name">عنوان گروه ویژگی</label>
                                        <input type="text" name="name" id="name" class="form-control select2"
                                        style="width: 100%;" value="{{$propertyGroup->name}}">
                                    </div>
                                    <div class="form-group">
                                        @foreach ($properties as $property)
                                            <input type="checkbox" name="properties[]" value="{{$property->id}}"
                                            class="input_property"
                                            @foreach ($propertyGroup->properties as $propertyMain)
                                                @if ($propertyMain->id == $property->id)
                                                    checked
                                                @endif
                                            @endforeach
                                            >{{$property->name}}
                                        @endforeach
                                    </div>
                                    <div class="form-group" style="text-align: left">
                                        <input type="submit" class="btn btn-success btn-sm"
                                        value="ویرایش گروه ویژگی">
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

