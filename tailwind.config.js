const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    darkMode: "class",

    content: [
        './storage/framework/views/*.php',
        './resources/**/*.blade.php'
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans]
            }
        }
    },

    plugins: [require('@tailwindcss/forms')]
};
