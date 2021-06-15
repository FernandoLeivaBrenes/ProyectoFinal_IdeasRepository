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
            animation: {
                'ping-once' : 'ping 100ms ease-in 1 normal backwards'
            },
            backgroundImage: theme => ({
                'ideaslogo': "url('/assets/img/icons/android-chrome-512x512.png')",
            }),
            fontFamily: {
                sans: ['Lato', ...defaultTheme.fontFamily.sans],
            },
            minHeight:{
                '70': '70%',
                '80': '80%',
                '90': '90%',
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
