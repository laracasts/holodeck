import {computed, reactive, readonly, ref} from "vue";

const alert = reactive({
    show: false,
    body: '',
});

export function useAlert() {
    return {
        data: readonly(alert),
        alert: (content) => {
            alert.show = true;
            alert.body = content;
        },
        hide: () => {
            alert.show = false;
            alert.body = '';
        },
    };
}
