import { useAlert } from "@/Composables/useAlert.js";
import { h } from "vue";
import TextArea from "@/Components/TextArea.vue";

export function useCopy() {
    return {
        writeToClipboard: (content) => {
            if (document.location.protocol === "https:") {
                navigator.clipboard.writeText(content);
                return;
            }

            useAlert().alert(
                h("div", {}, [
                    h(
                        "p",
                        { class: "text-secondary" },
                        "Your browser doesn't support the Clipboard API, most likely because you are not using https. Instead, manually copy the content show below.",
                    ),
                    h(TextArea, {
                        modelValue: content,
                        readonly: true,
                        class: "w-full mt-4",
                        onVnodeMounted(node) {
                            setTimeout(() => node.el.select(), 250);
                        },
                    }),
                ]),
            );
        },
    };
}
