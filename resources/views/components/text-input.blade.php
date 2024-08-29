@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-cinza-escuro-forte bg-cinza-escuro-forte text-branco focus:border-dourado-brilhante focus:ring-dourado-brilhante rounded-md shadow-sm']) !!}>
