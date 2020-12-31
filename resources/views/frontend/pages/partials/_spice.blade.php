@if ($product->spice_level == 0)
<span class="text-secondary"><i class="fas fa-pepper-hot"></i></span>
<span class="text-secondary"><i class="fas fa-pepper-hot"></i></span>
<span class="text-secondary"><i class="fas fa-pepper-hot"></i></span>
@elseif($product->spice_level == 1)
<span class="text-danger"><i class="fas fa-pepper-hot"></i></span>
<span class="text-secondary"><i class="fas fa-pepper-hot"></i></span>
<span class="text-secondary"><i class="fas fa-pepper-hot"></i></span>
@elseif($product->spice_level == 2)
<span class="text-danger"><i class="fas fa-pepper-hot"></i></span>
<span class="text-danger"><i class="fas fa-pepper-hot"></i></span>
<span class="text-secondary"><i class="fas fa-pepper-hot"></i></span>
@elseif($product->spice_level == 3)
<span class="text-danger"><i class="fas fa-pepper-hot"></i></span>
<span class="text-danger"><i class="fas fa-pepper-hot"></i></span>
<span class="text-danger"><i class="fas fa-pepper-hot"></i></span>
@else
<span class="text-secondary"><i class="fas fa-pepper-hot"></i></span>
<span class="text-secondary"><i class="fas fa-pepper-hot"></i></span>
<span class="text-secondary"><i class="fas fa-pepper-hot"></i></span>
@endif