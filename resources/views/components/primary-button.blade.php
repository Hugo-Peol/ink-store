<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-cinza-escuro-forte border border-transparent rounded-md font-semibold text-xs text-dourado-brilhante uppercase tracking-widest hover:bg-cinza-escuro focus:bg-cinza-escuro active:bg-cinza-escuro focus:outline-none focus:ring-2 focus:ring-dourado-brilhante focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
