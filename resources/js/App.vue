<script setup>
import { onMounted, ref } from "vue";
import { useRouter } from "vue-router";
import { customFetch } from "./utils/axios";
import { useAuthStore } from "@/stores/auth";

const isLoading = ref(false);
onMounted(() => {
    getUserAuth();
});

const getUserAuth = async () => {
    isLoading.value = true;
    const store = useAuthStore();
    const router = useRouter();
    try {
        const resp = await customFetch.get("/api/user");

        const { user, isAuth: is_auth } = resp.data;
        store.setLogin({ user, is_auth });
        router.push({ name: "home" });
    } catch (error) {
        console.log(error);
        router.push({ name: "layout" });
    } finally {
        isLoading.value = false;
    }
};
</script>
<template>
    <div v-if="!isLoading">
        <RouterView />
    </div>
</template>

<style lang="scss" scoped></style>
