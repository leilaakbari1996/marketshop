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
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{route('admin.product.property.update',$product)}}" method="POST">
                                    @csrf
                                    @method('patch')
                                    <div class="form-group">
                                        @foreach ($propertyGroups as $propertyGroup)

                                                <h4>{{$propertyGroup->name }}</h4>&nbsp;
                                                <br>
                                                <div class="row">
                                                    @if ($propertyGroup->properties()->count() == 0 )
                                                        <div class="alert alert-info alert-dismissible">
                                                            <h5><i class="icon fa fa-info"></i> توجه!</h5>
                                                            هنوز هیچ ویژگی به گروه ویژگی {{$propertyGroup->name}} اضاف نشده
                                                            <a href="{{route('admin.propertyGroup.edit',$propertyGroup)}}" class="btn btn-sm btn-dark"
                                                            style="text-decoration: none">ثبت ویژگی در گروه ویژگی {{$propertyGroup->name}}</a>

                                                        </div>
                                                    @endif
                                                    @foreach ($propertyGroup->properties as $property)
                                                        <div class="col-lg-2">
                                                            <label for="">{{$property->name}}</label>&nbsp;:
                                                        </div>
                                                        <div class="col-lg-8">
                                                            @php
                                                                $is_check = $properties->where('property_id',$property->id)->where('property_group_id',$propertyGroup->id);
                                                            @endphp
                                                            <input type="text"
                                                            name="propertyGroup-{{$propertyGroup->id}}-property-{{$property->id}}"
                                                            class="form-control"  value="
                                                                @if ($is_check->count() > 0)
                                                                    @php
                                                                        $query = $is_check->first();
                                                                        echo $query->value;

                                                                    @endphp

                                                                @endif
                                                            "><br>


                                                        </div>
                                                        <div class="col-lg-2"></div>
                                                    @endforeach
                                                </div><br><br>

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
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
@endsection

