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
                                <form action="{{route('admin.product.property.update',$productProperty)}}" method="POST">
                                    @csrf
                                    @method('patch')
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <label for="">{{$property}}</label>&nbsp;:
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="input-group">
                                                    <input type="text" value="{{$productProperty->value}}"
                                                        name="propertyGroup-{{$productProperty->property_group_id}}-property-{{$productProperty->property_id}}"
                                                        class="form-control">
                                                    <div class="input-group-btn">
                                                      <button class="btn btn-success" type="submit">
                                                        ویرایش ویژگی
                                                      </button>
                                                    </div>
                                                  </div>

                                            </div>

                                        </div>
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

