<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center | px-4 py-2 | bg-white hover:opacity-50 | rounded-md | uppercase | focus:outline-none | transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

