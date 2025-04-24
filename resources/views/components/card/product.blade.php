@props(['product'])
<div class="flex space-between gap-14 justify-center pt-8">
    <li class="flex flex-col gap-4 items-center p-4 max-w-[450px] w-[450px]">
        <div class="relative mb-[16px]">
            <img src="{{ url('storage', $product->image) }}" alt="" class="border-none max-w-[250px] max-h-[250px] h-[250px] w-[250px]
            object-cover bg-center rounded-xl">
        </div>
        <h3 class="text-3xl text-center text-[#424551]">{{ $product->title }}</h3>
        <span class="text-[#1E212C] text-2xl">Цена: {{ $product->price }}₽</span>
    </li>
</div>

