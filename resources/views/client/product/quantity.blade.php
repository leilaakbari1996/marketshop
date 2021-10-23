@php
    use App\Models\Cart;

@endphp
<div class="qty">
    <a class="qtyBtn plus btn-change" onclick="plus({{$product->id}},{{$product->number}},{{$condition}})"
    >+</a>
    <input type="text" name="quantity"  value="{{Cart::value($product)}}" size="2"
     class="input-quantity-{{$product->id}} btn-input" />
    <a class="qtyBtn mines btn-change" onclick="mines({{$product->id}},{{$condition}})"
     >-</a>
    <div class="clear"></div>
</div>
