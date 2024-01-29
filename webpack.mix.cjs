let mix = require("laravel-mix");
mix.js("resources/js/app.js","resources/js/script.js", "public/js").postCss(
    "resources/css/app.css",
    "public/css"
);
