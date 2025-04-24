<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center rounded-[4px] px-4 py-2 border border-transparent font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 bg-[#17696A] focus:outline-none focus:ring-2 focus:ring-indigo-500 px-[40px] h-[52px] focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
