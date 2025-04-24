<ul class="grid grid-cols-2 gap-[60px] pt-[60px]">
    @foreach ($categories as $category)
        <x-card.category :category="$category" />
    @endforeach
</ul>

