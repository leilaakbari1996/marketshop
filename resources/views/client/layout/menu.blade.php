

 <nav id="menu" class="navbar">
    <div class="navbar-header"> <span class="visible-xs visible-sm"> منو <b></b></span></div>
    <div class="container">
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav">
        <li><a class="home_link" title="خانه" href="{{route('client.index')}}">خانه</a></li>
        @foreach ($categories as $category)
            <li class="dropdown"><a href="category.html">{{$category->name}}</a>
                @if ($category->childrens()->count() > 0)
                    <div class="dropdown-menu">
                        <ul>
                            @foreach ($category->childrens as $childCategory)
                                <li><a href="#">{{$childCategory->name}}
                                    @if ($childCategory->childrens()->count() > 0)
                                        <span>&rsaquo;</span>
                                    @endif
                                    </a>
                                    @if ($childCategory->childrens()->count() > 0)
                                        <div class="dropdown-menu">
                                            <ul>
                                                    @foreach ($childCategory->childrens as $subCategory)
                                                        <li><a href="#">{{$subCategory->name}}</a> </li>
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
        <li class="custom-link-right"><a href="#" target="_blank"> همین حالا بخرید!</a></li>
      </ul>
    </div>
    </div>
  </nav>


