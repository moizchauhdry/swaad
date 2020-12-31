@if (Cart::get($product->id))
<div class="btn-group" role="group" aria-label="Basic example" id="success_{{$product->id}}">
    <button type="button" class="btn btn-primary btn-sm" id="btn-decrement"
        onclick="cartDecrement('{{$product->id}}')">-</button>
    <button type="button" class="btn btn-primary btn-sm" id="qty_{{$product->id}}">
        {{Cart::get($product->id)->quantity}}
    </button>
    <button type="button" class="btn btn-primary btn-sm" id="btn-increment"
        onclick="cartIncrement('{{$product->id}}')">+</button>
</div>
@else
<button onclick="addToCart('{{$product->id}}')" id="add_to_cart_{{$product->id}}" class="btn btn-primary btn-sm">
    Add to cart</button>
<div class="btn-group hidden" role="group" aria-label="Basic example" id="success_{{$product->id}}">
    <button type="button" class="btn btn-primary btn-sm" onclick="cartDecrement('{{$product->id}}')">-</button>
    <button type="button" class="btn btn-primary btn-sm" id="qty_{{$product->id}}">
    </button>
    <button type="button" class="btn btn-primary btn-sm" onclick="cartIncrement('{{$product->id}}')">+</button>
</div>
@endif