@extends('admin.layout.master')
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
                                <form action="{{route('admin.product.offer.update',$product)}}" method="POST">
                                    @csrf
                                    @method('patch')
                                    <div class="form-group">
                                        <label for="offer">مقدار تخفیف</label>
                                        <input type="number" name="offer" id="offer" class="form-control select2"
                                        style="width: 100%;" value="{{$product->offer}}">
                                    </div>
                                    <div class="form-group" style="text-align: left">
                                        <input type="submit" class="btn btn-success btn-sm"
                                        value="ویرایش تخفیف">
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

