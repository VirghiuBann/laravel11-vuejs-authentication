<script>
import { ref } from "vue";
import HomeLayout from "./components/HomeLayout.vue";

export default {
    components: { HomeLayout },
    setup() {
        return {
            count: ref(0),
            isLogin: ref(false),
        };
    },
};
</script>
<template>
    <div>
        <RouterView />
    </div>
</template>

<style lang="scss" scoped></style>
