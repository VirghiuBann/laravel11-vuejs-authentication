<template>
    <div role="alert" class="text-red-400 text-sm pb-4">
        <span>{{ errorMessage }}</span>
    </div>
</template>

<script setup>
const props = defineProps({
    errorMessage: null,
});
</script>

<style lang="scss" scoped></style>
