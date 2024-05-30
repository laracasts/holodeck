<template>
  <Section heading="Colors">
    <div class="flex flex-wrap gap-24">
      <div>
        <Subheading level="3" id="subheading-primaries" class="mb-6"
        >Primaries
        </Subheading>
        <ul
            aria-labelledby="subheading-primaries"
            class="flex flex-wrap gap-8"
        >
          <li>
            <ColorSwatch
                :color="theme.colors.primary.lowlight"
                copy-content="bg-primary-lowlight"
            />
          </li>
          <li>
            <ColorSwatch
                :color="theme.colors.primary.DEFAULT"
                copy-content="bg-primary"
            />
          </li>
          <li>
            <ColorSwatch
                :color="theme.colors.primary.highlight"
                copy-content="bg-primary-highlight"
            />
          </li>
          <li>
            <ColorSwatch
                :color="theme.colors.alternate.DEFAULT"
                copy-content="bg-alternate"
            />
          </li>
        </ul>
      </div>
      <div>
        <Subheading level="3" id="subheading-secondaries" class="mb-6"
        >Secondaries
        </Subheading>
        <ul
            aria-labelledby="subheading-secondaries"
            class="flex flex-wrap gap-8"
        >
          <li>
            <ColorSwatch
                :color="theme.colors.secondary.DEFAULT"
                copy-content="bg-secondary"
            />
          </li>
        </ul>
      </div>
      <div>
        <Subheading level="3" id="subheading-errors" class="mb-6"
        >Error States
        </Subheading>
        <ul aria-labelledby="subheading-errors" class="flex flex-wrap gap-8">
          <li>
            <ColorSwatch
                :color="theme.colors.error.DEFAULT"
                copy-content="bg-error"
            />
          </li>
        </ul>
      </div>
      <div>
        <Subheading level="3" id="subheading-errors" class="mb-6"
        >The Grays
        </Subheading>
        <ul aria-labelledby="subheading-errors" class="flex flex-wrap gap-8">
          <li>
            <ColorSwatch
                :color="theme.colors.gray[200]"
                copy-content="bg-gray-200"
            />
          </li>
          <li>
            <ColorSwatch
                :color="theme.colors.gray[500]"
                copy-content="bg-gray-500"
            />
          </li>
          <li>
            <ColorSwatch
                :color="theme.colors.gray[700]"
                copy-content="bg-gray-700"
            />
          </li>
          <li>
            <ColorSwatch
                :color="theme.colors.gray[800]"
                copy-content="bg-gray-800"
            />
          </li>
          <li>
            <ColorSwatch
                :color="theme.colors.gray[900]"
                copy-content="bg-gray-900"
            />
          </li>
        </ul>
      </div>
    </div>
  </Section>
</template>
<script setup>
import Section from "@/Components/Section.vue";
import Subheading from "@/Components/Subheading.vue";
import ColorSwatch from "@/Components/Holodeck/ColorSwatch.vue";
import resolveConfig from "tailwindcss/resolveConfig.js";
import tailwindConfig from "@/../../tailwind.config.js";

const theme = resolveConfig(tailwindConfig).theme;
</script>
