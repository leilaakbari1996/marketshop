
 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">

      <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
      <div style="direction: rtl">
        <!-- Sidebar user panel (optional) -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->

                 <li class="nav-item has-treeview">
                    <a href="{{route('client.index')}}" class="nav-link">
                        <img src="/admin/dist/img/icons/store.png" alt="فروشگاه"
                        width="40px" style="width:25px">
                      <p>
                        فروشگاه

                      </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                      <i class="fa fa-user"></i>&nbsp;&nbsp;
                      <p>
                        کاربران
                        <i class="fa fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.user.index')}}" class="nav-link">
                              <i class="nav-icon fa fa-list"></i>
                              <p>لیست</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                      <i class="fa fa-sliders"></i>&nbsp;&nbsp;
                      <p>
                        اسلایدر
                        <i class="fa fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.slider.index')}}" class="nav-link">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>اسلایدر</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <img src="/admin/dist/img/icons/role.png" alt="نقش ها"
                        width="40px" style="width:25px">
                      <p>
                        نقش ها
                        <i class="fa fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.role.create')}}" class="nav-link">&nbsp;
                              <i class="fa fa-plus"></i>&nbsp;&nbsp;
                              <p>ایجاد</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.role.index')}}" class="nav-link">
                              <i class="nav-icon fa fa-list"></i>
                              <p>لیست</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <img src="/admin/dist/img/icons/support.png" alt="پشتیبانی"
                        width="40px" style="width:25px">
                      <p>
                        ارتباط پشتیبانی با مردم
                        @if ($suports->count() > 0)
                            <span class="badge badge-warning navbar-badge">{{$suports->count()}}</span>
                        @endif
                        <i class="fa fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.suport.index')}}" class="nav-link">
                              <i class="nav-icon fa fa-list"></i>
                              <p>لیست</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fa fa-exclamation-circle"></i>
                      <p>
                        خطا دریافتی از طرف کاربر
                        @if ($bugs->count() > 0)
                            <span class="badge badge-danger navbar-badge">{{$bugs->count()}}</span>
                        @endif
                        <i class="fa fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{route('admin.bug.index')}}" class="nav-link">
                          <i class="nav-icon fa fa-list"></i>
                          <p>لیست</p>
                        </a>
                      </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                      <i class="fa fa-comments"></i>&nbsp;&nbsp;
                      <p>

                        نظرات
                        @if ($comments->count() > 0)
                            <span class="badge badge-warning navbar-badge">{{$comments->count()}}</span>
                        @endif
                        <i class="fa fa-angle-left right"></i>
                      </p>

                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.comment.index')}}" class="nav-link">
                              <i class="nav-icon fa fa-list"></i>
                              <p>لیست</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <img src="/admin/dist/img/icons/category.png" alt="دسته بندی"
                        width="20px">
                      <p>
                        دسته بندی ها
                        <i class="fa fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.category.create')}}" class="nav-link">
                              &nbsp;
                              <i class="fa fa-plus"></i>&nbsp;&nbsp;
                              <p>ایجاد</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.category.index')}}" class="nav-link">
                              <i class="nav-icon fa fa-list"></i>
                              <p>لیست</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.category.special.create')}}" class="nav-link">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>دسته بندی ویژه</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <img src="/admin/dist/img/icons/brand.png" alt="برند"
                        width="40px" style="width:25px">
                      <p>
                        برند ها
                        <i class="fa fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{route('admin.brand.create')}}" class="nav-link">&nbsp;
                          <i class="fa fa-plus"></i>&nbsp;&nbsp;
                          <p>ایجاد</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{route('admin.brand.index')}}" class="nav-link">
                          <i class="nav-icon fa fa-list"></i>
                          <p>لیست</p>
                        </a>
                      </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fa fa-table"></i>
                      <p>
                        گروه ویژگی ها
                        <i class="fa fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{route('admin.propertyGroup.create')}}" class="nav-link">&nbsp;
                          <i class="fa fa-plus"></i>&nbsp;&nbsp;
                          <p>ایجاد</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{route('admin.propertyGroup.index')}}" class="nav-link">
                          <i class="nav-icon fa fa-list"></i>
                          <p>لیست</p>
                        </a>
                      </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fa fa-table"></i>
                      <p>
                         ویژگی ها
                        <i class="fa fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{route('admin.property.create')}}" class="nav-link">&nbsp;
                          <i class="fa fa-plus"></i>&nbsp;&nbsp;
                          <p>ایجاد</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{route('admin.property.index')}}" class="nav-link">
                          <i class="nav-icon fa fa-list"></i>
                          <p>لیست</p>
                        </a>
                      </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                      <i class="fa fa-gift"></i>&nbsp;&nbsp;
                      <p>
                          کد تخفیف
                        <i class="fa fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{route('admin.coupon.create')}}" class="nav-link">&nbsp;
                          <i class="fa fa-plus"></i>&nbsp;&nbsp;
                          <p>ایجاد</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{route('admin.coupon.index')}}" class="nav-link">
                          <i class="nav-icon fa fa-list"></i>
                          <p>لیست</p>
                        </a>
                      </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                      <i class="fa fa-product-hunt"></i>&nbsp;&nbsp;
                      <p>
                        محصولات
                        <i class="fa fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{route('admin.product.create')}}" class="nav-link">&nbsp;
                          <i class="fa fa-plus"></i>&nbsp;&nbsp;
                          <p>ایجاد</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{route('admin.product.index')}}" class="nav-link">
                          <i class="nav-icon fa fa-list"></i>
                          <p>لیست</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{route('admin.product.special.index')}}" class="nav-link">
                          <i class="fa fa-circle-o nav-icon"></i>
                          <p>محصولات ویژه</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{route('admin.propesal.index')}}" class="nav-link">
                          <i class="fa fa-circle-o nav-icon"></i>
                          <p>محصولات پیشنهادی</p>
                        </a>
                      </li>
                    </ul>
                </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
    </div>
    <!-- /.sidebar -->
  </aside>

