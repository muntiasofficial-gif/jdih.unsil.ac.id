const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors:{
                'unsil-color' :'#4caf4f'
            },
            gridTemplateColumns: {
                'auto-fit': 'repeat(auto-fit, minmax(0, 1fr))',
                'auto-fill': 'repeat(auto-fill, minmax(0, 1fr))',
            },
            gridTemplateRows: {
                'auto-fit': 'repeat(auto-fit, minmax(0, 1fr))',
                'auto-fill': 'repeat(auto-fill, minmax(0, 1fr))',
            },
        },
    },
    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },
    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
