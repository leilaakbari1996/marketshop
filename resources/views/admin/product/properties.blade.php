@extends('admin.layout.master')
@section('style')
    <style>
        .inp{
            margin: 5px;
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
                        @if ($propertyGroups->count() == 0)
                            <div class="alert alert-info alert-dismissible">
                                <h5><i class="icon fa fa-info"></i> توجه!</h5>
                                هنوز هیچ گروه ویژگی ثبت نشده است
                                <a href="{{route('admin.category.edit',$product->category)}}" class="btn btn-sm btn-dark"
                                style="text-decoration: none">ثبت گروه ویژگی</a>

                            </div>
                        @else
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{route('admin.product.property.store',$product)}}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            @foreach ($propertyGroups as $propertyGroup)
                                                @if ($propertyGroup->properties()->count() > 0 )
                                                    <h4>{{$propertyGroup->name }}</h4>&nbsp;
                                                    <br>
                                                    <div class="row">
                                                        @foreach ($propertyGroup->properties as $property)
                                                            <div class="col-lg-2">
                                                                <label for="">{{$property->name}}</label>&nbsp;:
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <input type="text"
                                                                name="propertyGroup-{{$propertyGroup->id}}-property-{{$property->id}}"
                                                                class="form-control"><br>
                                                            </div>
                                                        @endforeach
                                                    </div><br><br>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="form-group" style="text-align: left">
                                            <input type="submit" class="btn btn-success btn-sm"
                                            value="ثبت ویژگی">
                                        </div>

                                    </form>
                                </div>

                            </div>
                            <!-- /.row -->
                        @endif
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
@endsection

