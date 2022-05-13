<button {{ $attributes->merge(['type' => 'submit', 'class' => 'px-4 py-2 bg-green-800 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-green-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
