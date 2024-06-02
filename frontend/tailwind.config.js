/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js,php}"],
  theme: {
    extend: {
      colors :{
        "primary" : "#F3EBFF",
        "secondary" : "#9A77D6"
      },
      fontFamily :{
        poppins: ["Poppins", "sans-serif"],
      }
    },
  },
  plugins: [],
}

