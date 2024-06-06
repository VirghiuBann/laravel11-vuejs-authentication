<template>
    <div class="flex justify-center items-center h-screen">
        <div class="w-full max-w-xs">
            <form
                @submit.prevent="register"
                class="shadow-md bg-neutral rounded px-8 pt-6 pb-8 mb-4"
            >
                <InputRaw
                    label="name"
                    id="name"
                    type="name"
                    placeholder="name"
                    :required="true"
                    v-model="name"
                />
                <InputRaw
                    label="email"
                    id="email"
                    type="email"
                    placeholder="test@gmail.com"
                    :required="true"
                    v-model="email"
                />

                <InputRaw
                    label="password"
                    id="password"
                    type="password"
                    placeholder="*********"
                    :required="true"
                    v-model="password"
                />

                <div class="flex items-center justify-between">
                    <button
                        class="btn hover:btn-neutral font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit"
                    >
                        Register
                    </button>
                    <RouterLink to="/login" class="link link-info"
                        >Login</RouterLink
                    >
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";
import InputRaw from "../components/InputRaw.vue";

const name = ref("");
const email = ref("");
const password = ref("");

const register = () => {
    console.log("name:", name.value);
    console.log("email:", email.value);
    console.log("password:", password.value);
};
</script>

<style scoped>
/* Add any scoped styles here */
</style>
