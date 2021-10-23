@extends('client.layout.master')
@section('style')
    <link type="text/css" href="/client/css/style.css" rel="stylesheet" />
@endsection
@section('content')
    <div style="width: 90%;margin:10px auto">
        @include('admin.layout.success')
    </div>
	<header id="header_profile">
		<!-- Profile Picture -->
        <img id="profilePic" src="/client/image/img_store.png">
	</header>
<!-- sidebar -->
	<main>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3 col-sm-4 col-xs-12">
					<!-- navigation side bar + tab -->
					<ul class="nav nav-pills nav-pills-success nav-stacked">
						<li class="active"><a data-toggle="pill" href="#about">بیوگرافی</a></li>
						<li><a data-toggle="pill" href="#contact">ارتباط با پشتیبان سایت</a></li>
                        <li> <a href="{{route('client.order.index')}}">لیست سفارشات من</a> </li>
                        <li>
                            <a href="{{route('client.like.index')}}">لیست علاقه مندی های من</a>
                        </li>
                        <li>
                            <a href="{{route('client.comment.index')}}">وضعیت نظرات شما</a>
                        </li>
					</ul>


				</div>
				<!-- start tab content -->
				<div class="col-md-6 col-sm-8 col-xs-12">
					<div class="tab-content">
						<!-- about -->
						<div id="about" class="tab-pane fade in active">
							<h3>بیوگرافی</h3>
                            <form action="{{route('client.user.update',$user)}}" method="post">
                                @csrf
                                @method('patch')
                                <p style="padding-top: 10px"><span><i class="fa fa-user-circle-o"></i><strong>نام کاربری :</strong></span>
                                    <input type="text" placeholder="نام کاربری" name="name" class="input" value="{{$user->name}}">
                                </p>
                                <p><span><i class="fa fa-envelope"></i><strong>پست الکترونیک :</strong></span> {{$user->email}}
                                </p>
                                <input style="float: left;margin-top:10px;" type="submit" value="ویرایش پروفایل" class="btn btn-sm btn-success">
                                <div class="clear"></div>


                            </form>
						</div>
						<!-- contact form -->
						<div id="contact" class="tab-pane fade">
							<h3>ارتباط با پشتیبان سایت</h3>
							<div class="card card-signup">
								<form class="form" method="post" action="{{route('client.suport.store')}}">
                                    @csrf

									<div class="content">
										<div class="input-group">
											 <span class="input-group-addon">
												<i class="fa fa-user-circle"></i>نام
											 </span>
											<input type="text" name="name" class="form-control" value="{{$user->name}}">
										</div>
										<div class="input-group">
											<span class="input-group-addon">
											  <i class="fa fa-envelope"></i>پست الکترونیک
											</span>
											<input type="text" name="email" class="form-control" value="{{$user->email}}">
										</div>
										<div class="input-group">
											<span class="input-group-addon">
											  <i class="fa fa-pencil"></i>متن پیام
											</span>
											<textarea placeholder="متن پیام ..." class="form-control" name="msg"></textarea>
										</div>
									</div>
									<div class="footer text-center" >
										<input type="submit" style="float: left" class="btn btn-simple btn-success btn-lg text-blue" value="ارسال پیام">
									</div>
                                    <div class="clear"></div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
@endsection
@section('script')
    <script src="/client/js/bootstrap.min.js"></script>
@endsection
