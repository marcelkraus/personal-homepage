/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./templates/**/*.html.twig"],
    theme: {
        extend: {
            colors: {
                brand: '#607E4A', // Mix of all other brand colors (krausgebaut, krausgeborgt, krausgedruckt).
            }
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('tailwindcss-hero-patterns'),
        require('@tailwindcss/typography'),
    ],
}
