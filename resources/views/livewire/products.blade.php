<ul class="grid grid-cols-3 gap-[10px] pt-[60px]">
    @foreach ($products as $product)
        <x-card.product :product="$product" />
    @endforeach
</ul>
