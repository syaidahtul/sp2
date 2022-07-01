const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
    safelist: [
        {
          pattern: /.*/ 
        },
    ],

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/**/*.blade.php',
        './resources/views/**/*.blade.php',
    ],
    screens: {
        xs: { max: '575px' }, // Mobile (iPhone 3 - iPhone XS Max).
        sm: { min: '576px', max: '897px' }, // Mobile (matches max: iPhone 11 Pro Max landscape @ 896px).
        md: { min: '898px', max: '1199px' }, // Tablet (matches max: iPad Pro @ 1112px).
        lg: { min: '1200px' }, // Desktop smallest.
        xl: { min: '1159px' }, // Desktop wide.
        xxl: { min: '1359px' } // Desktop widescreen.
    },
    theme: {
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            white: colors.white,
            sky: colors.sky,
            yellow: colors.yellow,
            red: colors.red,
            gray: colors.gray,
            green: colors.green,
            orange: colors.orange,
          },
        extend: {
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
