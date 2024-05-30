Holodeck ships with a number of [Vue composables](https://vuejs.org/guide/reusability/composables) that can take a lot of
the work out of common actions you need to set up.

## `{js}useAlert()`

This composable allows you to show a modal that can contain anything you'd like. View it as a more powerful version of the `{js}alert()` function baked into JavaScript.

```js
import { useAlert } from "@/Composables/useAlert.js";

useAlert().alert("It's life Jim, but not as we know it.");
```

If you need a little more power over what is displayed in the alert, you can pass a virtual node to the `{js}alert()` function.

```js
import { useAlert } from "@/Composables/useAlert.js";
import { h } from "vue";
import TextInput from "@/Components/TextInput.vue";

useAlert().alert(h('div', {}, [
    h('p', {}, "Here's a classic quote:"),
    h(TextInput, {modelValue: "It's life Jim, but not as we know it!"}),
]));
```

> Note: Out of the box, alerts only show when using pages that extend the `StandardLayout`.

For more information on the `{js}h()` function, [see the documentation on the vuejs.org](https://vuejs.org/guide/extras/render-function#basic-usage).

## `{js}useCopy()`

This composable makes it trivial to add copy content to the system clipboard.

```js
import { useCopy } from "@/Composables/useCopy.js";

const { writeToClipboard } = useCopy();
writeToClipboard("Hello world!");
```

Note that the [Clipboard API](https://developer.mozilla.org/en-US/docs/Web/API/Clipboard/writeText) is only available in secure (https) environments.
Depending on your environment, you may be able to [enable https locally](https://herd.laravel.com/docs/1/advanced-usage/securing-sites). However, as a fallback,
`useCopy` will show a modal with the content to copy manually in unsecure contexts.

## `{js}useMenu()`

This composable allows you to easily change the primary navigation menu, either globally or on a page by page basis.

```js
import { useMenu } from "@/Composables/useMenu.js";

useMenu([
    // Here's a basic menu item…
    {
        name: "My Little Desktop Demo",
        when: (isResponsive) => ! isResponsive,
        href: route('demo'),
        active: () => route().current('demo'),
    },
    // You can pass attributes to do some cool stuff, like submit single button forms!
    {
        name: "Log Out",
        href: route('logout'),
        attributes: {
            as: "button",
            method: "post",
        },
    },
]);
```

If you wish to show a dropdown under a menu item, you can pass an array of children.

```js
import { useMenu } from "@/Composables/useMenu.js";

useMenu([
    {
        name: "Actions",
        {*children: [
            {
                name: "Activate Warp Drive",
                href: route('actions.warp'),
            },
            {
                name: "Set Phasers to Stun",
                href: route('actions.phasers'),
            }
        ],*}
    }
]);
```

As the "Profile" dropdown is very common, you may pass a closure to `{js}useMenu()`, which receives
the profile item for easy reuse.

```js
import { useMenu } from "@/Composables/useMenu.js";

useMenu(({*profile*}) => [
    {
        name: "My Little Demo",
        href: route('demo'),
        active: () => route().current('demo'),
    },
    {*profile,*}
]);
```

## `{js}useUniqueId()`

This composable allows you to generate a guaranteed numeric unique identifier, for example for HTML IDs.

```js
import { useUniqueId } from "@/Composables/useUniqueId.js";

const { generateUniqueId } = useUniqueId();
const myVeryUniqueId = generateUniqueId();
```

If you would like to apply a custom prefix to the ID, you may pass one as an argument to the `{js}generateUniqueId()` function.

```js
import { useUniqueId } from "@/Composables/useUniqueId.js";

const { generateUniqueId } = useUniqueId();
const idForACheckbox = generateUniqueId('checkbox'); // Will return checkbox-<id>
```
