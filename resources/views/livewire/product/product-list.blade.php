<x-container>
    <ul class="grid grid-cols-2 gap-7 h-screen">
        @foreach ($products as $product)
            <x-card.product :product='$product'/>
        @endforeach
    </ul>
</x-container>

