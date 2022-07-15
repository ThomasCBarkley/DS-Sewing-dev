<template>
    <input @keypress="onlyNumber" :size="size" :type="type" :value="value" @input="$emit('input', $event.target.value)" />
</template>

<script>
    export default {
        emits: ['update:modelValue'],
        props: {
            size: {
                type: String,
                default: '5',
            },
            type: {
                type: String,
                default: 'text',
            },
            value: String,
        },
        methods: {
            onlyNumber ($event) {
                let keyCode = ($event.keyCode ? $event.keyCode : $event.which);
                if ((keyCode < 48 || keyCode > 57) && keyCode !== 46) { // 46 is dot
                    $event.preventDefault();
                }
            }
        },
        computed: {
            filled() {
                return (this.value != null && this.value.toString().length > 0)
            }
        }
    }
</script>