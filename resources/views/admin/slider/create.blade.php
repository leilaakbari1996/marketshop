@extends('admin.layout.master')
@php
    use App\Models\Product;
@endphp
@section('content')
            <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <h4>شما فقط مستوانید 3 اسلایدر را انتخاب کنید...</h4>
                    <div class="card card-default">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                        <form action="{{route('admin.slider.store')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="image">تصویر اسلایدر   : </label>
                                                <input type="file" name="image">
                                            </div>
                                            <div class="form-group" style="text-align: left">
                                                <input type="submit" class="btn btn-success btn-sm"
                                                value="ثبت اسلایدر">
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

