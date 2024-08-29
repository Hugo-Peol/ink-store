import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                'preto-fosco': '#2C2C2C',
                'preto-profundo': '#000000',
                'dourado-brilhante': '#FFD700',
                'dourado-escuro': '#C9B037',
                'cinza-escuro': '#4A4A4A',
                'branco': '#FFFFFF',
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
