@extends('admin.layout.master')
@php
    use App\Models\Product;
@endphp
@section('content')
            <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                    <div class="card card-default">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                        <form action="{{route('admin.slider.update',$slider)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('patch')
                                            <div class="form-group">
                                                <label for="image"> تصویر اسلایدر شماره ی {{$slider->id}} :  </label>
                                                <input type="file" name="image">
                                            </div>
                                            <div class="form-group">
                                                <img src="{{Product::get_image($slider->image)}}" alt="اسلایدر">
                                            </div>
                                            <div class="form-group" style="text-align: left">
                                                <input type="submit" class="btn btn-success btn-sm"
                                                value="ویرایش اسلایدر">
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

