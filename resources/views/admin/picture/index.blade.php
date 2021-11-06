@extends('admin.layout.master')
@php
    use App\Models\Product;
@endphp
@section('content')
            <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if(count($pictures) == 0)
                    <div class="alert alert-info alert-dismissible">
                        <h5><i class="icon fa fa-info"></i> توجه!</h5>
                        هنوز هیچ تصویری برای محصول {{$product->name}} ثبت نشده است.
                    </div>
                @endif
                        <!-- /.card-header -->
                        @php
                            $shom = 0;
                        @endphp
                        @foreach ($pictures as $picture)
                            @php
                                $shom++;
                            @endphp
                            <div class="card card-default">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="image">تصویر گالری شماره {{$shom}}:</label><br>
                                            <img src="{{Product::get_image($picture->image)}}" alt="گالری تصاویر" width="150">
                                        </div>
                                        <div class="col-md-6">
                                            <br><br><br>
                                            <a href=""
                                            class="btn btn-danger btn-sm">
                                                <form action="{{route('admin.picture.destroy',$picture)}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="submit" class="btn-danger" value="حذف"
                                                    style="border: 0" onclick="return confirm('آیا مطمن هستید می خواهید این تصویر را از گالری حذف کنید؟')">
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

