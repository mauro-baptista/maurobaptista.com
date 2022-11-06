/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/views/vendor/pagination/simple-tailwind.blade.php",
  ],
  theme: {
    extend: {},
  },
  plugins: [
      require('@tailwindcss/typography'),
  ],
}
