@extends('admin.layout.master')
@php
    use App\Models\Product;
@endphp
@section('content')
            <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                        <!-- /.card-header -->
                        @foreach ($sliders as $slider)
                        <div class="card card-default">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="image">تصویر اسلاید شماره {{$slider->id}}:</label><br>
                                        <img src="{{Product::get_image($slider->image)}}" alt="اسلایدر" width="150">
                                    </div>
                                    <div class="col-md-6">
                                        <br><br><br>
                                        <a href="{{route('admin.slider.edit',$slider)}}"
                                        class="btn btn-primary btn-sm">ویرایش</a>
                                        <a href=""
                                        class="btn btn-danger btn-sm">
                                        <form action="{{route('admin.slider.destroy',$slider)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" class="btn-danger" value="حذف" style="border: 0">
                                        </form>
                                    </a>
                                    </div>

                                </div>
                                    <!-- /.row -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        @endforeach

                    <!-- /.card -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
@endsection

