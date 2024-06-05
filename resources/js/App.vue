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
        <h2>Hello world</h2>
        <button @click="count++" class="btn">Count is : {{ count }}</button>
    </div>
</template>

<style lang="scss" scoped></style>
