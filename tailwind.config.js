/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./templates/**/*.html.twig"],
    theme: {
        extend: {
            colors: {
                'brand-default': '#607E4A', // Mix of all other brand colors (krausgebaut, krausgeborgt, krausgedruckt)
                'brand-highlight': '#879E77', // Brand + 25 %
                'secondary-light': '#e5e7eb', // Original: gray-200
                'secondary-dark': '#1f2937', // Original: gray-800
            }
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('tailwindcss-hero-patterns'),
        require('@tailwindcss/typography'),
    ],
}
