
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
        <li class="menu_brands dropdown"><a href="{{route('client.brand.index')}}">برند ها</a>
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
        <li class="custom-link-right"><a href="#" target="_blank"> همین حالا بخرید!</a></li>
      </ul>
    </div>
    </div>
  </nav>


