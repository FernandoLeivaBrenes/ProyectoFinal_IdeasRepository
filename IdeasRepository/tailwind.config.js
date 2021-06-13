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
            backgroundImage: theme => ({
                'ideaslogo': "url('/assets/img/icons/android-chrome-512x512.png')",
            }),
            fontFamily: {
                sans: ['Lato', ...defaultTheme.fontFamily.sans],
            },
            zIndex: {
                '-10': '-10',
                '-20': '-20',
                '-30': '-30',
                '-40': '-40',
            },
        },
    },

    variants: {
        extend: {
            backgroundColor: ['active'],
            ringWidth:  ['hover', 'active'],
            stroke:  ['hover', 'group-hover', 'group-focus'],
            opacity: ['responsive', 'hover', 'focus', 'disabled'],
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
};
