import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
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
            spacing: {
                fixcarousel: "14.9rem",
                fixcarouselitem5: "18.5rem",
            },
        },
    },

    plugins: [require("@tailwindcss/forms"), require("flowbite/plugin")],
};
