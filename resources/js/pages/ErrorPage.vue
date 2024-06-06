<template>
    <div class="hero min-h-screen bg-base-200">
        <div class="hero-content text-center flex-col">
            <div class="max-w-2xl">
                <img :src="imageUrl" alt="not found" />
            </div>
            <RouterLink to="/" class="link-info mt-5">Ge Home</RouterLink>
        </div>
    </div>
</template>

<script setup>
import { RouterLink } from "vue-router";
import imageUrl from "../assets/not_found.svg";
</script>

<style lang="scss" scoped></style>
