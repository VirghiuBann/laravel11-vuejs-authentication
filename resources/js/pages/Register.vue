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
                    v-model="user.name"
                />
                <InputRaw
                    label="email"
                    id="email"
                    type="email"
                    placeholder="test@gmail.com"
                    :required="true"
                    v-model="user.email"
                />

                <InputRaw
                    label="password"
                    id="password"
                    type="password"
                    placeholder="*********"
                    :required="true"
                    v-model="user.password"
                />
                <InputRaw
                    label="password confirmation"
                    id="password_confirmation"
                    type="password"
                    placeholder="*********"
                    :required="true"
                    v-model="user.password_confirmation"
                />
                <InputErrors
                    v-if="inputErrors.errors['password']"
                    :errorMessage="inputErrors.errors['password'][0]"
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
import { reactive } from "vue";
import InputRaw from "../components/InputRaw.vue";
import InputErrors from "../components/InputErrors.vue";

import { customFetch } from "../utils/axios";

const user = reactive({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
});

const inputErrors = reactive({
    errors: [],
});

const register = async () => {
    console.log("user:", user);

    try {
        await customFetch.get("/sanctum/csrf-cokkie");
        const resp = await customFetch.post("/api/register", user);
        console.log(resp);
    } catch (error) {
        console.log("Some error occurred ", error.response);
        const errors = error.response?.data?.errors;
        if (errors) {
            inputErrors.errors = errors;
            user.password = "";
            user.password_confirmation = "";
        }
    }
};
</script>

<style scoped>
/* Add any scoped styles here */
</style>
