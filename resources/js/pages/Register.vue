<template>
    <div class="flex justify-center items-center h-screen">
        <div class="w-full max-w-md">
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
                <InputErrors
                    v-if="inputErrors.errors['email']"
                    :errorMessage="inputErrors.errors['email'][0]"
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
                        :disabled="isLoading"
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
import { reactive, ref } from "vue";
import InputRaw from "../components/InputRaw.vue";
import InputErrors from "../components/InputErrors.vue";

import { useAuthStore } from "../stores/auth";

const store = useAuthStore();

const user = reactive({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
});

const isLoading = ref(false);

const inputErrors = reactive({
    errors: [],
});

const register = async () => {
    isLoading.value = true;
    try {
        await store.register(user);
    } catch (error) {
        console.log("Some error occurred ", error.response);
        const errors = error.response?.data?.errors;
        if (errors) {
            inputErrors.errors = errors;
            user.password = "";
            user.password_confirmation = "";
        }
        if (error.status >= 500) {
            console.log(error.statusText);
        }
    } finally {
        isLoading.value = false;
    }
};
</script>

<style scoped>
/* Add any scoped styles here */
</style>
