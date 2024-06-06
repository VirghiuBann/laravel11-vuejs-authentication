<script setup>
import { ref } from "vue";

const imageUrl = ref(
    import.meta.url.replace(/\/[^/]+$/, "/../assets/f_layout.jpg")
);
</script>

<template>
    <div
        class="hero min-h-screen"
        :style="{ backgroundImage: `url(${imageUrl})` }"
    >
        <div class="hero-overlay bg-opacity-60"></div>
        <div class="hero-content text-center text-neutral-content">
            <div class="max-w-md">
                <h1 class="mb-5 text-5xl font-bold">Hello there</h1>
                <p class="mb-5">
                    Provident cupiditate voluptatem et in. Quaerat fugiat ut
                    assumenda excepturi exercitationem quasi. In deleniti eaque
                    aut repudiandae et a id nisi.
                </p>
                <RouterLink to="/login" class="link link-info"
                    >Login</RouterLink
                >
                /
                <RouterLink to="/register" class="link link-info"
                    >Register</RouterLink
                >
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped></style>
