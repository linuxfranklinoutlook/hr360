const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

module.exports = {
	darkMode: 'media',
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Source Sans Pro', ...defaultTheme.fontFamily.sans],
            },
        },
		colors: {
			...colors,
		}
    },

    variants: {
        extend: {
            opacity: ['disabled'],
			backgroundColor: ['active'],
			boxShadow: ['active'],
			dropShadow: ['active'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
