<template>
    <div class="mb-4">
        <label class="block text-sm font-bold mb-2 capitalize" :for="id">
            {{ label }}
        </label>
        <input
            v-model="inputValue"
            class="input shadow-md border rounded w-full py-2 px-3 focus:shadow-outline focus:outline-none"
            :id="id"
            :type="type"
            :placeholder="placeholder"
            :required="required"
        />
    </div>
</template>

<script setup>
const props = defineProps({
    label: {
        type: String,
        required: true,
    },
    id: {
        type: String,
        required: true,
    },
    type: {
        type: String,
        required: true,
    },
    placeholder: {
        type: String,
        default: "",
    },
    required: {
        type: Boolean,
        default: false,
    },
});

const inputValue = defineModel();
</script>

<style lang="scss" scoped></style>
