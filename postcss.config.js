let tailwindCss = require("tailwindcss")

module.exports = {
  plugins: [
      tailwindCss('./tailwind.config.js'),
      require('postcss-import'),
      require('autoprefixer'),
  ],
}
