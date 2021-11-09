@php
use App\Models\Cart;
use App\Models\Product;
@endphp
  <!--Footer Start-->
  <footer id="footer">
    <div class="fpart-first">
      <div class="container">
        <div class="row">
            <div class="column col-lg-4 col-md-2 col-sm-3 col-xs-12">
                <h5>راه های ارتباطی</h5>

                      <ul>
                        <li class="mobile"><i class="fa fa-phone"></i>&nbsp; 09013608442</li>
                        <li class="email"><a href="mailto:info@marketshop.com" class="link" style="text-transform:lowercase">
                            <i class="fa fa-envelope"></i>&nbsp; leila.akbari1996@gmail.com</a>
                        </li>
                        <li>

                            @auth
                                <div class="row">
                                    <a href="{{route('client.user.show',auth()->user())}}">
                                        <div class="col-lg-1"><img src="/client/image/icons/support.png" alt="پشتیبانی"
                                            width="25px" style="margin-right: -7px"></div>
                                        <div class="col-lg-11">
                                               <div style="margin-top: 10px;margin-right:-5px">ارتباط با پشتیبان سایت</div>
                                        </div>
                                    </a>
                                </div>
                                &nbsp;
                            @else
                                <div class="row">
                                    <a href="{{route('client.register.create')}}">
                                        <div class="col-lg-1"><img src="/client/image/icons/support.png" alt="پشتیبانی"
                                         style="margin-right: -7px;width:25px"></div>
                                        <div class="col-lg-11">
                                            <div style="margin-top: 10px;margin-right:-5px">ارتباط با پشتیبان سایت</div>
                                        </div>
                                    </a>
                                </div>
                            @endauth
                        </li>
                      </ul>



          </div>
          <div class="column col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <h5>اطلاعات</h5>
            <ul>
              <li>
                  <a href="{{route('client.bug.create')}}">گزارش خطا</a>
              </li>
            </ul>
          </div>
          <div class="column col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <h5>امکانات جانبی</h5>
            <ul>
              <li><a href="{{route('client.brand.index')}}">برند ها</a></li>
              <li><a href="{{route('client.coupon.index')}}">کد تخفیف</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div id="back-top"><a data-toggle="tooltip" title="بازگشت به بالا" href="javascript:void(0)" class="backtotop"><i class="fa fa-chevron-up"></i></a></div>
  </footer>
  <!--Footer End-->
  <!-- Twitter Side Block Start -->
  <div id="twitter_footer" class="twit-right sort-order-1">
    <div class="twitter_icon"><i class="fa fa-twitter"></i></div>
    <a class="twitter-timeline" href="https://twitter.com/" data-chrome="nofooter noscrollbar transparent" data-theme="light" data-tweet-limit="2" data-related="twitterapi,twitter" data-aria-polite="assertive" data-widget-id="347621595801608192">توییت های @</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
  </div>
  <!-- Twitter Side Block End -->
  <!-- Facebook Side Block Start -->
  <div id="facebook" class="fb-right sort-order-2">
    <div class="facebook_icon"><i class="fa fa-facebook"></i></div>
    <div class="fb-page" data-href="#" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true" data-show-posts="false">
      <div class="fb-xfbml-parse-ignore">
        <blockquote cite="#"><a href="#">سايت شما</a></blockquote>
      </div>
    </div>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
  </div>
  <!-- Facebook Side Block End -->
</div>
<!-- JS Part Start-->
<script type="text/javascript" src="/client/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="/client/js/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/client/js/jquery.easing-1.3.min.js"></script>
<script type="text/javascript" src="/client/js/jquery.dcjqaccordion.min.js"></script>
<script type="text/javascript" src="/client/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="/client/js/custom.js"></script>
<script>
    function addToCart(ProductId,condition){
        var span = document.getElementById("basket-"+ProductId).innerText;
        if(span == 'افزودن به سبد'){
            condition = 0;
        }
        if(condition == 1){
            window.location = '/cart';
        }else{
            var quantity = $('.input-quantity-'+ProductId).val();
            if(quantity == null){
                quantity = 1;
            }
            $.ajax({
                type:"post",
                url:'/cart/' + ProductId,
                data:{
                    _token : '{{csrf_token()}}',
                    quantity : quantity
                },success:function(data){
                    var product = data.cart[ProductId].product;
                    alert('محصول '+product.name+' به سبد خرید اضاف شد.');
                    $('.totalItem').text(data.totalItem);
                    $('.totalPrice').text(data.totalPrice);
                    $('.totalPriceWithDiscount').text(data.totalPriceWithDiscount);
                    $('.gift').text(data.totalPrice - data.totalPriceWithDiscount);
                    $('#basket-'+product.id).text('به روز رسانی سبد');
                    $('.basket-'+product.id).text('به روز رسانی سبد');
                    if(!$('#cart-row-'+product.id).length){
                        var quantity = data.cart[product.id].quantity;
                        $('#cart-table-body').append(
                            '<tr id="cart-row-'+product.id+'">'
                                +'<td class="text-center" > <a href=""> <img class="img-thumbnail" width="50" title="'+ product.name +'" alt="'+product.name+'" src="'+product.image_path+'" </a> </td>'
                                +'<td class="text-left"> <a href="'+product.id+'">'+product.name+'</a></td>'
                                +'<td class="text-right">'
                                    +'<div class="qty">'
                                        +'<a class="qtyBtn plus btn-change" href="javascript:void(0);" onclick="plus('+ProductId+',1)">+</a>'
                                        +'<input type="text" class="input-quantity-'+ProductId+' btn-input" name="quantity" value="'+quantity+'" size="2" />'
                                        +'<a class="qtyBtn mines btn-change" href="javascript:void(0);" onclick="mines('+ProductId+')">-</a>'
                                        +'<div class="clear"></div>'
                                    +'</div>'
                                +'</td>'
                                +'<td class="text-right">'+product.cost_with_discount+' تومان</td>'
                                +'<td class="text-center"><button class="btn btn-danger btn-xs remove" title="حذف" onClick="removeFromCart('+ProductId+')" type="button"><i class="fa fa-times"></i></button></td>'
                            +'</tr>'
                        );
                    }

                }
            });
        }
    }
    function removeFromCart(productId){
        if (confirm('آیا مطمن هستید می خواهید این محصول را از سبد خرید حذف کنید؟')) {
            $.ajax({
                type : 'delete',
                url : '/cart/'+productId,
                data : {
                    _token : '{{csrf_token()}}'
                },success : function(data){
                    if(data.count == 0){
                        $('.empty').remove();
                        $('.basket-empty').append('<div style="text-align: center"><img src="/storage/basket.png" alt="سبد خرید"><h4 class="text-danger">سبد خرید شما خالی است!</h4><a class="btn btn-primary" href="/">خرید از فروشگاه</a></div>');
                    }
                        alert(' محصول '+data.productName+' از سبد خرید حذف شد.');
                        $('.totalItem').text(data.totalItem);
                        $('.input-quantity-'+productId).val(1);
                        $('.totalPrice').text(data.totalPrice);
                        $('#cart-row-'+productId).remove();
                        $('.cart-row-'+productId).remove();
                        $('#basket-'+productId).text('افزودن به سبد');
                        $('.totalPriceWithDiscount').text(data.totalPriceWithDiscount);
                        $('.gift').text(data.totalPrice - data.totalPriceWithDiscount);


                }
            })
        }
    }
    function plus(productId,number,condition){
        var quantity = $('.input-quantity-'+productId).val();
        quantity = Number(quantity);
        if(quantity  >= number){
            alert('موجودی انبار '+number+' عدد می باشد.');
            $('.input-quantity-'+productId).val(number);
        }else{
            $('.input-quantity-'+productId).val(quantity+1);
        }
        if(condition == 1){
            editCart(productId);
        }

    }
    function mines(productId,condition){
        var quantity = $('.input-quantity-'+productId).val();
        if(quantity == 1){
            $('.input-quantity-'+productId).val(1);
        }else{
            $('.input-quantity-'+productId).val(quantity-1);
        }
        if(condition == 1){
            editCart(productId);
        }

    }
    function editCart(productId){
       var quantity = $('.input-quantity-'+productId).val();
       $.ajax({
           type:'post',
           url:'/cart/update/'+productId,
           data : {
              _token : '{{csrf_token()}}',
              quantity : quantity,
           },success : function(data){
                alert('سبد خرید شما با موفقیت بروزرسانی شد.');
                $('.totalPrice').text(data.totalPrice);
                $('.totalPriceWithDiscount').text(data.totalPriceWithDiscount);
                $('.gift').text(data.totalPrice - data.totalPriceWithDiscount);
           }
       });
    }
    function updateCart(productId,number){
        var quantity = $('.quantity-'+productId).val();
        if(number < quantity){
            alert('موجودی این کالا در انبار '+number+ ' می باشد.لطفا مقدار کالای خود را کم کنید.');
        }else{
            $('.input-quantity-'+productId).val(quantity);
            $.ajax({
                type:'post',
                url:'/cart/edit/'+productId,
                data:{
                    _token : '{{csrf_token()}}',
                    quantity : quantity
                },success:function(data){
                    alert('سبد خرید شما با موفقیت بروزرسانی شد.');
                    $('.totalPrice').text(data.totalPrice);
                    $('.totalPriceWithDiscount').text(data.totalPriceWithDiscount);
                    $('.gift').text(data.totalPrice - data.totalPriceWithDiscount);
                }
            });
        }
    }
    function like(productId){
        $.ajax({
            type:'post',
            url:'/like/'+productId,
            data:{
                _token:'{{csrf_token()}}'
            },success:function(data){
                var icon = $('.like-'+productId + '> .fa-heart');
                var button = document.getElementById('like-'+productId);
                if(icon.hasClass('like')){
                    icon.removeClass('like');
                    button.setAttribute('data-original-title','افزودن به علاقه مندی ها');
                    $('#like-span-'+productId).text('افزودن به علاقه مندی ها');

                }else{
                    icon.addClass('like');
                    button.setAttribute('data-original-title','حذف از علاقه مندی ها');
                    $('#like-span-'+productId).text('حذف از علاقه مندی ها');
                }
            }
        });
    }
    function Coupon(){
        var coupon = $('#input-coupon').val();
        $.ajax({
            type:'post',
            url:'/coupon',
            data:{
                _token : '{{csrf_token()}}',
                coupon : coupon
            },success:function(data){
                alert(data.msg);
                $('.totalPriceWithDiscount').text(data.totalPriceWithDiscount);
                $('.gift').text(data.gift);
            }
        });
    }
</script>
@yield('script')
<!-- JS Part End-->

</body>
</html>


