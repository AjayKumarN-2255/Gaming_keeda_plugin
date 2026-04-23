/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./index.html",
    "./src/**/*.{js,ts,jsx,tsx}",
  ],
  prefix: "igk-", // IMPORTANT for WordPress
  corePlugins: {
    preflight: false, // avoid breaking WP admin styles
  },
  theme: {
    extend: {},
  },
  plugins: [],
};