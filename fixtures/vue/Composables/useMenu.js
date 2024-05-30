import {onBeforeUnmount, onMounted, ref} from "vue";
import {usePage} from "@inertiajs/vue3";

const page = usePage();

const profile = {
    name: "Profile",
    when: () => page.props.auth?.user,
    href: null,
    active: () => false,
    children: [
        {
            name: "Edit Profile",
            href: route('profile.edit'),
            active: () => route().current('profile.edit'),
        },
        {
            name: "Log Out",
            href: route('logout'),
            attributes: {
                as: "button",
                method: "post",
            }
        }
    ],
};

const defaultMenu = [
    {
        name: "Dashboard",
        href: route('dashboard'),
        active: () => route().current('dashboard'),
    },
    {
        name: "Design System",
        href: route('holodeck.design'),
        active: () => route().current('holodeck.design'),
    },
    {
        name: "Docs",
        active: () => page.url.includes("/holodeck/docs/"),
        when: (responsive) => ! responsive,
        children: [
            {
                name: "Installation",
                href: route('holodeck.docs.show', 'installation'),
            },
            {
                name: "Basics",
                href: route('holodeck.docs.show', 'basics'),
            },
            {
                name: "Composables",
                href: route('holodeck.docs.show', 'composables'),
            }
        ],
    },
    {
        name: "Log In",
        when: () => ! page.props.auth?.user,
        href: route('login'),
    },
    profile,
];

export const currentMenu = ref(defaultMenu);

/**
 * @typedef MenuItem
 * @type {Object}
 * @property {!string} name - The name of the item to display in the UI.
 * @property {function(): boolean=} when - A predicate for showing the menu item.
 * @property {?string} href - The URL that the item links to.
 * @property {function(boolean): boolean} [active=false] - Whether the item relates to the current page. The provided parameter indicates if the menu is responsive.
 * @property {MenuItem[]} [children] - Any child menu items that should be rendered in a dropdown.
 * @property {Object} [attributes] - Any additional attributes that should be rendered on the node.
 */

/**
 * @param {(MenuItem[]|function(Object): MenuItem[])} menu
 */
export function useMenu(menu) {
    onMounted(() => {
        if (menu instanceof Function) {
            menu = menu(profile);
        }

        currentMenu.value = menu;
    });

    onBeforeUnmount(() => {
        currentMenu.value = defaultMenu;
    });
}
