/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",       // Look for classes in all PHP files in the root directory
    "./*.html",      // Look for classes in all HTML files in the root directory (if applicable)
    "./**/*.php",    // Look for classes in all PHP files in subdirectories
    "./**/*.html",   // Look for classes in all HTML files in subdirectories (if applicable)
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}