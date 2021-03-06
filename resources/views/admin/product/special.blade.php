@extends('admin.layout.masterspecial')
@section('style')
    <!--<link rel="stylesheet" type="text/css" href="/client/js/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/client/js/bootstrap/css/bootstrap-rtl.min.css" />-->
    <link rel="stylesheet" type="text/css" href="/client/css/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="/client/css/stylesheet.css" />
    <link rel="stylesheet" type="text/css" href="/client/css/owl.transitions.css" />
    <link rel="stylesheet" type="text/css" href="/client/css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="/client/css/stylesheet-rtl.css" />
    <link rel="stylesheet" type="text/css" href="/client/css/responsive-rtl.css" />
    <link rel="stylesheet" type="text/css" href="/client/css/stylesheet-skin2.css" />
    <style>
        .delete{
            background:red;
            color:#fff;
            font-size:15px;
        }
    </style>

@endsection
@section('content')
    <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if (count($products) == 0)
                    <div class="alert alert-info alert-dismissible">
                        <h5> توجه!</h5>
                        هنوز هیچ محصول ثبت نشده است!
                        <a href="{{route('admin.product.create')}}" style="text-decoration: none"
                        class="btn btn-sm btn-dark">ثبت محصول</a>
                    </div>
                @else
                    <!-- SELECT2 EXAMPLE -->
                    <div class="card card-default">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                @foreach ($products as $product)
                                    <div class="col-lg-4">
                                        <div class="tab_content">
                                            <div class="owl-carousel product_carousel_tab">
                                                <div class="product-thumb">
                                                    <div class="image">
                                                        <a href="{{route('admin.product.edit',$product)}}">
                                                            <img src="{{str_replace('public','/storage',$product->image)}}"
                                                            alt="{{$product->name}}" title="{{$product->name}}"
                                                            class="img-responsive" width="100" />
                                                        </a>
                                                    </div>
                                                    <div class="caption">
                                                        <h4><a href="{{route('admin.product.edit',$product)}}"> {{$product->name}} </a></h4>
                                                        <p class="price">
                                                            <span class="price-new">{{$product->cost_with_discount}} تومان   </span>&nbsp;&nbsp;&nbsp;
                                                            @if ($product->offer > 0)
                                                                <span class="price-old" style="font-size: 19px">{{$product->price}} تومان</span>
                                                                <span class="saving">-{{$product->offer}}%</span>
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <div class="button-group">
                                                        @if ($product->is_special == 1)
                                                            <input type="button"  onClick="SpecialProduct({{$product->id}})"
                                                            value="حذف از محصولات ویژه"
                                                            id="special-product-{{$product->id}}" class="btn btn-sm btn-danger">
                                                        @else
                                                            <input type="button" id="special-product-{{$product->id}}"
                                                            class="btn btn-sm btn-success"
                                                            onClick="SpecialProduct({{$product->id}})"
                                                            value="افزودن به محصولات ویژه">
                                                        @endif


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                @endif
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->




@endsection
@section('script')
    <script>
        /*function addToSpecialProduct(productId){
            $.ajax({
                type:'post',
                url:'/adminpanel/product/' + productId + '/special',
                data:{
                    _token:'{{csrf_token()}}'
                },success:function(data){
                    alert('محصول '+ data.productName +' به محصولات ویژه اضاف شد.');
                    $('#btn-add-'+productId).val('حذف از دسته بندی ویژه');
                    $('#btn-add-'+productId).removeClass('btn-success');
                    $('#btn-add-'+productId).addClass('btn-danger');

                }
            })
        }
        function deleteOfSpecialProduct(productId){
            $.ajax({
                type:'delete',
                url:'/adminpanel/product/'+productId+'/special',
                data:{
                    _token:'{{csrf_token()}}'
                },success:function(data){
                    alert('محصول '+data.productName+' از محصولات ویژه حذف شد.');
                    $('#btn-delete-'+productId).val('حذف از دسته بندی ویژه');
                    $('#btn-delete-'+productId).removeClass('btn-danger');
                    $('#btn-delete-'+productId).addClass('btn-success');


                }
            });
        }*/
    function SpecialProduct(productId){
        $.ajax({
            type: "post",
            url:'/adminpanel/product/' + productId + '/special',
            data: {
                _token: "{{csrf_token()}}",

            },
            success : function(data){
                var icon = $('#special-product-'+productId);
                if(icon.hasClass('btn-danger')){
                    alert('محصول '+data.productName+' از محصولات ویژه حذف شد.');
                    icon.removeClass('btn-danger');
                    icon.addClass('btn-success');
                    icon.val('افزودن به محصولات ویژه')
                }else{
                    alert('محصول '+ data.productName +' به محصولات ویژه اضاف شد.');
                    icon.removeClass('btn-success');
                    icon.addClass('btn-danger');
                    icon.val('حذف از محصولات ویزه');
                }
            }

        })
    }
    </script>
@endsection

