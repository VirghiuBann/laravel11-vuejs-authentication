<script>
import { ref } from "vue";
export default {
    setup() {
        return {
            count: ref(0),
        };
    },
};
</script>
<template>
    <div>
        <button @click="count++">Count is : {{ count }}</button>
    </div>
</template>

<style lang="scss" scoped></style>
