@php
    use App\Models\Product;
@endphp
<h3 class="subtitle">دسته ها</h3>
<div class="box-category">
    <ul id="cat_accordion">
        @foreach ($categories as $category)
            <li><a href="{{route('client.category.index',$category)}}">{{$category->name}}</a>
                @if ($category->childrens()->count() > 0)
                    <span class="down"></span>
                    <ul>
                        @foreach ($category->childrens as $subcategory)
                            <li>
                                    <a href="{{route('client.category.index',$subcategory)}}">
                                        {{$subcategory->name}}
                                    </a>
                                    @if ($subcategory->childrens()->count() > 0)
                                        <span class="down"></span>
                                            <ul>
                                                @foreach ($subcategory->childrens as $child)
                                                    <li>
                                                        <a href="{{route('client.category.index',$child)}}">
                                                            {{$child->name}}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                    @endif
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</div>
<h3 class="subtitle">پرفروش ها</h3>
<div class="side-item">
    @if (count($bestsellers) > 0)
    @foreach ($bestsellers as $id)
        @php
            $product = Product::query()->where('id',$id)->first();
        @endphp
        <div class="clearfix">
            @include('client.product.productMini',[
            'product' => $product
         ])
        </div>
    @endforeach
@else
    <div class="alert alert-info alert-dismissible">
        <h5><i class="icon fa fa-info"></i></h5>
         در این گروه هنوز هیچ محصولی ثبت نشده است لطفا صبور باشید...
    </div>
@endif
</div>
<h3 class="subtitle">ویژه</h3>
<div class="side-item">
    @foreach ($specialProducts as $product)
        @include('client.product.productMini',[
            'product' => $product
        ])
    @endforeach
</div>

