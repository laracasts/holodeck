Holodeck ships with two layouts: `GuestLayout` and `StandardLayout`. Unlike standard Laravel scaffolding, both work regardless of authentication status.

## Layout Files

There are two ways to apply a layout to a page. One is by wrapping the page in the layout component.

```html 
<template>
    <StandardLayout>
        <span>Hello world 👋</span>
    </StandardLayout>
</template>
```

However, doing this will prevent Inertia from supporting persistent elements across pages. An example of a persistent element would be the mini-player
on [Laracasts](https://laracasts.com). Instead, the layout can be defined using Vue's `{js}defineOptions()` [hook](https://vuejs.org/api/sfc-script-setup.html#defineoptions). 

> See `resources/js/Pages/Holodeck/Design.vue` for an example of this approach.

```js
defineOptions({
    layout: StandardLayout,
});
```

### `GuestLayout`

This layout provides a blank screen with an area in the center for content. The [login](/login) and [register](/register) endpoints are both
good examples of this.

Certain features, such as alerts, notifications and custom menus, do not work when using the `GuestLayout`.

### `StandardLayout`

This layout contains common Application UI features, such as a primary menu (desktop and responsive), a notification tray and support for custom
alerts. Most of your pages will likely extend this layout.

## `{html}<Container/>`

The `Container` component simply provides a little horizontal padding, ensuring content looks good on all screen sizes.

```html
<Container>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor facilis neque, nobis perferendis quisquam sapiente. 
        Beatae earum exercitationem molestias officiis provident repellat reprehenderit similique totam. 
        Adipisci inventore ipsam nesciunt odit.
    </p>
</Container>
```

## `{html}<Section/>`

The `Section` component places content in the center, whilst providing space for a subheading on the left hand side.
This is very useful for distinguishing separate areas on a page.

```html
<Section heading="Personal Details">
    <PersonalDetailsForm />
</Section>
<Section heading="Privacy">
    <p>We obviously take your privacy very seriously, and only sell it to people called Dave or Tess.</p>
</Section>
```

## `{html}<Heading/>`

The `Heading` component is essentially a styles `h` tag. The default level is `2`, but you can alter that using the `level` attribute.

```html
<Heading>This is a level 2 heading</Heading>
<Heading level="5">This is a level 5 heading</Heading>
```

## `{html}<SubHeading/>`

The `SubHeading` component is used to display a smaller heading, prefixed with a small white square. As with the `Heading` component, the default level is `2`, but you can alter that using the `level` attribute.

```html
<SubHeading>This is a level 2 subheading</SubHeading>
<SubHeading level="5">This is a level 5 subheading</SubHeading>
```
