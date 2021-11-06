@extends('admin.layout.master')
@section('content')
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default"><br>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{route('admin.user.update',$user)}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    @foreach ($roles as $role)
                                        <div class="col-lg-3">
                                            <input type="radio" name="role" id="role"
                                            value="{{$role->id}}"
                                                @if ($user->role_id == $role->id)
                                                    checked
                                                @endif
                                            >&nbsp; {{$role->title}}
                                        </div>
                                    @endforeach
                                </div>
                                <div class="form-group" style="text-align: left">
                                    <input type="submit" class="btn btn-success btn-sm"
                                    value="ویرایش نقش" >
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














