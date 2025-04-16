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
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    50: '#FDFBD4',
                    100: '#FCF9C4',
                    200: '#F9F3A3',
                    300: '#F6EC82',
                    400: '#F3E561',
                    500: '#F0DE40',
                    600: '#E6D433',
                    700: '#DCCA26',
                    800: '#D2C019',
                    900: '#C8B60C'
                },
                secondary: {
                    50: '#FFF8E6',
                    100: '#FFF1CC',
                    200: '#FFE499',
                    300: '#FFD766',
                    400: '#FFCA33',
                    500: '#FFBD00',
                    600: '#E6AA00',
                    700: '#FDFBD4',
                    800: '#B38400',
                    900: '#997100'
                },
                neutral: {
                    50: '#F9FAFB',
                    100: '#F3F4F6',
                    200: '#E5E7EB',
                    300: '#D1D5DB',
                    400: '#9CA3AF',
                    500: '#6B7280',
                    600: '#4B5563',
                    700: '#374151',
                    800: '#1F2937',
                    900: '#111827'
                },
                beige: {
                    50:  '#FAF5EF',
                    100: '#F2E8DA',
                    200: '#E6D3B8',
                    300: '#D9BE96',
                    400: '#CDA974',
                    500: '#C09452',
                    600: '#A87F43',
                    700: '#906A39',
                    800: '#78552E',
                    900: '#604024'
                }
            }
        },
    },

    plugins: [forms],
};
