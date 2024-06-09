<template>
    <div class="flex justify-center items-center h-screen">
        <div class="w-full max-w-xs">
            <form
                @submit.prevent="login"
                class="shadow-md bg-neutral rounded px-8 pt-6 pb-8 mb-4"
            >
                <InputRaw
                    label="email"
                    id="email"
                    type="email"
                    placeholder="test@gmail.com"
                    :required="true"
                    v-model="credentials.email"
                />

                <InputRaw
                    label="password"
                    id="password"
                    type="password"
                    placeholder="*********"
                    :required="true"
                    v-model="credentials.password"
                />
                <InputErrors
                    v-if="inputErrors.errors['email']"
                    :errorMessage="inputErrors.errors['email'][0]"
                />

                <div class="flex items-center justify-between">
                    <button
                        class="btn hover:btn-neutral font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit"
                        :disabled="isLoading"
                    >
                        Login
                    </button>
                    <RouterLink to="/register" class="link link-info"
                        >Register</RouterLink
                    >
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { ref, reactive } from "vue";
import { customFetch } from "../utils/axios";
import { useRouter } from "vue-router";
import { useAuthStore } from "@/stores/auth";

import InputRaw from "../components/InputRaw.vue";
import InputErrors from "../components/InputErrors.vue";

const store = useAuthStore();
const router = useRouter();

const isLoading = ref(false);
const credentials = reactive({
    email: "",
    password: "",
});

const inputErrors = reactive({
    errors: [],
});

const login = async () => {
    isLoading.value = true;

    try {
        await customFetch.get("/sanctum/csrf-cokkie");
        const resp = await customFetch.post("/login", credentials);
        console.log(resp);
        const { user, isAuth: is_auth } = resp.data;
        store.setLogin({ user, is_auth });
        router.push({ name: "home" });
    } catch (error) {
        console.log(error);
        console.log("Some error occurred ", error.response);
        const errors = error.response?.data?.errors;
        if (errors) {
            inputErrors.errors = errors;
            credentials.email = "";
            credentials.password = "";
        }
    } finally {
        isLoading.value = false;
    }
};
</script>

<style scoped>
/* Add any scoped styles here */
</style>
