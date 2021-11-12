@if ($count < 3)
    @php
        $shom = 3 - $count;
    @endphp
    <section class="content">
        <div class="container-fluid">
            <p>شما فقط میتوانید {{$shom}} اسلایدر را انتخاب کنید...</p>
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
@endif





