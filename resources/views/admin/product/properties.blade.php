@php
    use App\Models\Product;
@endphp
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
                        @if ($properties_category->count() == 0)
                            <div class="alert alert-info alert-dismissible">
                                <h5><i class="icon fa fa-info"></i> توجه!</h5>
                                هنوز هیچ گروه ویژگی برای دسته بندی مربوط به {{$product->name}} ثبت نشده است.
                                <a href="{{route('admin.category.edit',$product->category)}}" class="btn btn-sm btn-dark"
                                style="text-decoration: none">ثبت گروه ویژگی</a>

                            </div>
                        @else
                            <div class="row">
                                <div class="col-lg-7 col-md-12 col-sm-12" class="property_product">
                                    @if ($properties_product->count() != 0)
                                        <div class="card">
                                            <!-- /.card-header -->
                                            <div class="card-body table-responsive p-0">
                                                <table class="table table-hover table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th >#</th>
                                                            <th >گروه ویژگی</th>
                                                            <th >نام ویژگی</th>
                                                            <th >مقدار</th>
                                                            <th >ویرایش</th>
                                                            <th >حذف</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($properties_product as $property_product)
                                                            <tr>
                                                                <td>{{$property_product->id}}</td>
                                                                <td>{{$property_product->propertyGroup()}}</td>
                                                                <td>{{$property_product->property()}}</td>
                                                                <td>
                                                                {{$property_product->value}}
                                                                </td>
                                                                <td>
                                                                    <form action="{{route('admin.product.property.edit',$property_product)}}" method="post">
                                                                        @csrf
                                                                        <button type="submit" class="btn btn-sm btn-info">ویرایش</button>
                                                                    </form>
                                                                </td>
                                                                <td>
                                                                    <form action="{{route('admin.product.property.destroy',$property_product)}}" method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                                        onclick="return confirm('آیا مطمن هستید می خواهید این ویژگی را برای این محصول حذف کنید؟')">حذف</button>
                                                                    </form>
                                                                </td>

                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                    @else
                                        <div class="alert alert-info alert-dismissible">
                                            <h5><i class="icon fa fa-info"></i> توجه!</h5>
                                            هنوز هیچ گروه ویژگی برای محصول {{$product->name}} ثبت نشده است.

                                        </div>
                                    @endif
                                <!-- /.card -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            <!-- /.card-header -->
                    <div class="card-body">
                        @if ($propertyGroups->count() == 0)
                        @else
                            <div class="row">
                                <div class="col-md-12">
                                            @foreach ($propertyGroups as $propertyGroup)
                                                <h4>گروه ویژگی : {{$propertyGroup->name }}</h4>&nbsp;
                                                @if ($propertyGroup->properties()->count() > 0 )
                                                    <br>

                                                        @foreach ($propertyGroup->properties as $property)
                                                            @php
                                                                $condition = 1;
                                                                $properties_product_group = $product->propertyProductGroup($propertyGroup);
                                                            @endphp
                                                            @foreach ($properties_product_group as $property_product)
                                                                @if ($property_product->property_id == $property->id)
                                                                    @php
                                                                        $condition = 0;
                                                                        break;
                                                                    @endphp
                                                                @endif
                                                            @endforeach
                                                            @if ($condition == 1)

                                                               <form action="{{route('admin.product.property.store',$product)}}" method="POST">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-lg-2">
                                                                                <label for="">{{$property->name}}</label>&nbsp;:
                                                                            </div>
                                                                            <div class="col-lg-5">
                                                                                <div class="input-group">
                                                                                    <input type="text"
                                                                                        name="propertyGroup-{{$propertyGroup->id}}-property-{{$property->id}}"
                                                                                        class="form-control">
                                                                                    <div class="input-group-btn">
                                                                                      <button class="btn btn-success" type="submit">
                                                                                        ثبت ویژگی
                                                                                      </button>
                                                                                    </div>
                                                                                  </div>

                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            @endif
                                                        @endforeach
                                                    <br><br>
                                                @endif
                                            @endforeach
                                </div>

                            </div>
                            <!-- /.row -->
                        @endif
                    </div>
                    <!-- /.card-body -->
                        @endif
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->

@endsection

