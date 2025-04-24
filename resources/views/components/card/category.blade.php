<li class="hover:translate-y-[-15px] duration-300 items-center flex flex-col">
    <img src="{{ url('storage', $category->image) }}" alt="" class="max-w-[390px] max-h-[390px] h-[390px] w-[390px] object-cover bg-center">
    <h3 class="text-2xl my-3 text-center">{{ $category->title }}</h3>
    <a class="p-3 text-base bg-black text-white" href="{{ route('category.showOrCategory', $category->id) }}">
        Перейти
    </a>
</li>

