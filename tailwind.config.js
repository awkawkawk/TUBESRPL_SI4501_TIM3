/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        fontFamily: {
            sans: [
                '"Inter"',
                "system-ui",
                "-apple-system",
                "BlinkMacSystemFont",
                '"Segoe UI"',
                "Roboto",
                '"Helvetica Neue"',
                "Arial",
                '"Noto Sans"',
                "sans-serif",
                '"Apple Color Emoji"',
                '"Segoe UI Emoji"',
                '"Segoe UI Symbol"',
                '"Noto Color Emoji"',
            ],
        },
        extend: {
            colors: {
                black: "#4D4D4D",
                primary: "#EB5231",
                primarylight: "#FF7051",
            },
        },
    },
    plugins: [
        require("flowbite/plugin"),
        require("tailwind-scrollbar")({ nocompatible: true }),
    ],
};
