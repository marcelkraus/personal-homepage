/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./templates/**/*.html.twig"],
    theme: {
        extend: {
            colors: {
                brand: '#607E4A', // Mix of all other brand colors (krausgebaut, krausgeborgt, krausgedruckt).

                // Sky colors (Original Tailwind values)
                'sky-2': '#7dd3fc', // Original: sky-300 (2x)
                'sky-3': '#0284c7', // Original: sky-600 (14x)
                'sky-5': '#0c4a6e', // Original: sky-900 (4x)

                // Gray colors (Original Tailwind values)
                'gray-1': '#d1d5db', // Original: gray-300 (11x)
                'gray-3': '#111827', // Original: gray-900 (7x)
            }
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('tailwindcss-hero-patterns'),
        require('@tailwindcss/typography'),
    ],
}
