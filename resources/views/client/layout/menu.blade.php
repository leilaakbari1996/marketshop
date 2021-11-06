
@php
    use App\Models\Product;
@endphp
 <nav id="menu" class="navbar">
    <div class="navbar-header"> <span class="visible-xs visible-sm"> منو <b></b></span></div>
    <div class="container">
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav">
        <li><a class="home_link" title="خانه" href="{{route('client.index')}}">خانه</a></li>
        @foreach ($categories as $category)
            <li class="dropdown"><a href="{{route('client.category.index',$category)}}">{{$category->name}}</a>
                @if ($category->childrens()->count() > 0)
                    <div class="dropdown-menu">
                        <ul>
                            @foreach ($category->childrens as $childCategory)
                                <li><a href="{{route('client.category.index',$childCategory)}}">{{$childCategory->name}}
                                    @if ($childCategory->childrens()->count() > 0)
                                        <span>&rsaquo;</span>
                                    @endif
                                    </a>
                                    @if ($childCategory->childrens()->count() > 0)
                                        <div class="dropdown-menu">
                                            <ul>
                                                @foreach ($childCategory->childrens as $subCategory)
                                                    <li><a href="{{route('client.category.index',$subCategory)}}">{{$subCategory->name}}</a> </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
          </li>
        @endforeach
        <li class="menu_brands dropdown"><a href="#">برند ها</a>
            @if (count($brands) > 0)
                <div class="dropdown-menu">
                    @foreach ($brands as $brand)
                        <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6">
                            <a href="#"><img src="{{Product::get_image($brand->image)}}" title="{{$brand->name}}"
                                alt="{{$brand->name}}" width="70px" /></a><a href="#">{{$brand->name}}
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
          </li>
          <li class="dropdown wrap_custom_block hidden-sm hidden-xs"><a>بلاک سفارشی</a>
            <div class="dropdown-menu custom_block">
              <ul>
                <li>
                  <table>
                    <tbody>
                      <tr>
                        <td><img alt="" src="image/banner/cms-block.jpg"></td>
                        <td><img alt="" src="image/banner/responsive.jpg"></td>
                        <td><img alt="" src="image/banner/cms-block.jpg"></td>
                      </tr>
                      <tr>
                        <td><h4>بلاک های محتوا</h4></td>
                        <td><h4>قالب واکنش گرا</h4></td>
                        <td><h4>پشتیبانی ویژه</h4></td>
                      </tr>
                      <tr>
                        <td>این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html نوشتاری یا تصویری را در آن قرار دهید.</td>
                        <td>این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html نوشتاری یا تصویری را در آن قرار دهید.</td>
                        <td>این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html نوشتاری یا تصویری را در آن قرار دهید.</td>
                      </tr>
                      <tr>
                        <td><strong><a class="btn btn-primary btn-sm" href="#">ادامه مطلب</a></strong></td>
                        <td><strong><a class="btn btn-primary btn-sm" href="#">ادامه مطلب</a></strong></td>
                        <td><strong><a class="btn btn-primary btn-sm" href="#">ادامه مطلب</a></strong></td>
                      </tr>
                    </tbody>
                  </table>
                </li>
              </ul>
            </div>
          </li>
          <li class="dropdown information-link"><a>برگه ها</a>
            <div class="dropdown-menu">
              <ul>
                <li><a href="login.html">ورود</a></li>
                <li><a href="register.html">ثبت نام</a></li>
                <li><a href="category.html">دسته بندی (شبکه/لیست)</a></li>
                <li><a href="product.html">محصولات</a></li>
                <li><a href="cart.html">سبد خرید</a></li>
                <li><a href="checkout.html">تسویه حساب</a></li>
                <li><a href="compare.html">مقایسه</a></li>
                <li><a href="wishlist.html">لیست آرزو</a></li>
                <li><a href="search.html">جستجو</a></li>
              </ul>
              <ul>
                <li><a href="about-us.html">درباره ما</a></li>
                <li><a href="404.html">404</a></li>
                <li><a href="elements.html">عناصر</a></li>
                <li><a href="faq.html">سوالات متداول</a></li>
                <li><a href="sitemap.html">نقشه سایت</a></li>
                <li><a href="contact-us.html">تماس با ما</a></li>
              </ul>
            </div>
          </li>
        <li class="custom-link-right"><a href="#" target="_blank"> همین حالا بخرید!</a></li>
      </ul>
    </div>
    </div>
  </nav>


