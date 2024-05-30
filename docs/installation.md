First, you should have a fresh Laravel project installed and ready to go. To do this using the laravel installer,
run `laravel new my-project`. If you decide to use one of Laravel's scaffolding templates, a Blade or Vue based stack will 
work best.

Next, install Holodeck via composer.

```bash
composer require laracasts/holodeck
```

You should now execute the Holodeck's installation command, which will publish the relevant component files to your project.

```bash
php artisan holodeck:install
```

This command will ask which stack you'd like to install. The Vue stack is a little more full-featured, for
dynamic applications and demos. The blade stack provides a more minimal but straightforward set of styled
components.

Holodeck provides a Tailwind plugin that you should add to your `tailwind.config.js` file.

```js
import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
{+import {tailwind as holodeck} from './vendor/laracasts/holodeck/holodeck.js';+}
import containerQueries from "@tailwindcss/container-queries";
import typography from "@tailwindcss/typography";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    {+plugins: [forms, holodeck, containerQueries, typography],+}
};
```

Note that we also install Tailwind's forms, container queries and typography plugins. These are required
for Holodeck to function properly. You can read the installation steps for these plugins [here](https://tailwindcss.com/docs/plugins).