<template>
  <div class="selection:bg-primary-lowlight">
    <header class="pt-4">
      <Container class="grid grid-cols-5 items-center gap-4">
        <div class="col-span-2 h-10 justify-self-start">
          <Logo class="h-full w-full"/>
        </div>
        <img
            src="@assets/laracasts-symbol.svg"
            alt=""
            class="hidden size-8 justify-self-center sm:block"
        />
        <nav
            class="col-span-2 hidden items-baseline justify-self-end border-y border-primary-lowlight lg:flex"
        >
          <template v-for="menuItem in desktopMenuItems">
            <NavLink
                v-if="!menuItem.children"
                :href="menuItem.href ?? '#'"
                :active="menuItem.active ? menuItem.active() : false"
                v-bind="menuItem.attributes ?? {}"
            >{{ menuItem.name }}
            </NavLink>
            <Dropdown v-else show-on-hover>
              <template #trigger>
                <NavLink href="#"
                         :active="menuItem.active ? menuItem.active() : false"
                         as="button"
                         type="button">
                  {{ menuItem.name }}
                </NavLink>
              </template>

              <template #content>
                <DropdownLink
                    v-for="child in menuItem.children"
                    :href="child.href ?? '#'"
                    v-bind="child.attributes ?? {}"
                >{{ child.name }}
                </DropdownLink>
              </template>
            </Dropdown>
          </template>
        </nav>
        <button
            @click="showResponsiveMenu = true"
            type="button"
            class="col-start-5 justify-self-end duration-300 hover:text-primary focus:border-0 focus:outline-0 focus:ring-1 focus:ring-alternate lg:hidden"
        >
          <Bars2Icon class="size-8"/>
        </button>
      </Container>
    </header>
    <main>
      <Gradient/>
      <slot></slot>
    </main>
    <footer></footer>
    <section
        class="fixed inset-0 flex flex-col gap-6 bg-gray-900 pt-4 transition-transform lg:hidden"
        :class="{
            'invisible translate-x-full opacity-100': !showResponsiveMenu,
        }"
    >
      <Gradient :with-pattern="false"/>
      <Container class="flex justify-end">
        <button
            ref="closeResponsiveMenuButton"
            @click="showResponsiveMenu = false"
            type="button"
            class="focus:border-0 focus:outline-0 focus:ring-1 focus:ring-alternate"
        >
          <XMarkIcon
              class="size-8 duration-300 hover:text-primary"
          ></XMarkIcon>
        </button>
      </Container>

      <nav class="flex grow flex-col justify-center space-y-8">
        <template v-for="menuItem in mobileMenuItems">
          <ResponsiveNavLink
              @click="!menuItem.children && (showResponsiveMenu = false)"
              :href="menuItem.href ?? '#'"
              :active="menuItem.active ? menuItem.active() : false"
              v-bind="menuItem.attributes ?? {}"
          >{{ menuItem.name }}
          </ResponsiveNavLink>
          <template v-if="menuItem.children">
            <ResponsiveNavLink
                @click="showResponsiveMenu = false"
                v-for="child in menuItem.children"
                :href="child.href ?? '#'"
                :active="child.active ? child.active() : false"
                v-bind="child.attributes ?? {}"
                class="!pl-10"
            >{{ child.name }}
            </ResponsiveNavLink>
          </template>
        </template>
      </nav>
      <img
          src="@assets/laracasts-symbol.svg"
          alt=""
          class="mb-6 size-8 self-center"
      />
    </section>
    <Modal :show="alert.data.show" @close="alert.hide()">
      <div class="p-6">
        <component v-if="isVNode(alert.data.body)" :is="alert.data.body"></component>
        <p v-else>{{ alert.data.body }}</p>
      </div>
    </Modal>
  </div>
</template>

<script setup>
import Logo from "@/Components/Logo.vue";
import Container from "@/Components/Container.vue";
import NavLink from "@/Components/NavLink.vue";
import {Bars2Icon, XMarkIcon} from "@heroicons/vue/16/solid/index.js";
import {computed, isVNode, ref, watch} from "vue";
import Gradient from "@/Components/Holodeck/Gradient.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import {currentMenu} from "@/Composables/useMenu.js";
import Modal from "@/Components/Modal.vue";
import {useAlert} from "@/Composables/useAlert.js";

const showResponsiveMenu = ref(false);
const closeResponsiveMenuButton = ref();

const alert = useAlert();

const desktopMenuItems = computed(() =>
    currentMenu.value.filter((item) =>
        item.when === undefined ? true : item.when(false),
    ),
);

const mobileMenuItems = computed(() =>
    currentMenu.value.filter((item) =>
        item.when === undefined ? true : item.when(true),
    ),
);

watch(
    showResponsiveMenu,
    (value) => {
      value && closeResponsiveMenuButton.value.focus();
    },
    {
      flush: "post",
    },
);
</script>
