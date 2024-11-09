module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#1e1e1e",
                secondary: "#fdb141",
                dark: "#1c2333",
                light: "#f1f4f9",
            },
            fontFamily: {
                poppins: ["Poppins", "sans-serif"],
            },
        },
    },
    plugins: [
        require("flowbite/plugin")({
            charts: true,
        }),
        require("tailwindcss-textshadow"),
        require("@tailwindcss/line-clamp"),
    ],
};
