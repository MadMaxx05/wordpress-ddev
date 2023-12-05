/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.php", "./views/**/*.php", "./source/js/**/*.{js,vue}"],
  theme: {
    fontFamily: {
      inter: "Inter, sans-serif",
    },
    extend: {},
  },
  corePlugins: {
    aspectRatio: false,
  },
  plugins: [require("@tailwindcss/aspect-ratio")],
};
