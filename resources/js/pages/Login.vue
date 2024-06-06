<template>
    <div class="flex justify-center items-center h-screen">
        <div class="w-full max-w-xs">
            <form
                @submit.prevent="login"
                class="shadow-md bg-neutral rounded px-8 pt-6 pb-8 mb-4"
            >
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2" for="username">
                        Username
                    </label>
                    <input
                        v-model="username"
                        class="shadow appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline"
                        id="username"
                        type="text"
                        placeholder="Username"
                        required
                    />
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input
                        v-model="password"
                        class="shadow appearance-none border rounded w-full py-2 px-3 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        id="password"
                        type="password"
                        placeholder="******************"
                        required
                    />
                </div>
                <div class="flex items-center justify-between">
                    <button
                        class="btn hover:btn-neutral font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit"
                    >
                        Sign In
                    </button>
                    <RouterLink to="/login" class="link link-info"
                        >Register</RouterLink
                    >
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import { ref } from "vue";

export default {
    setup() {
        const username = ref("");
        const password = ref("");

        const login = () => {
            // Implement your login logic here
            console.log("Username:", username.value);
            console.log("Password:", password.value);
        };

        return {
            username,
            password,
            login,
        };
    },
};
</script>

<style scoped>
/* Add any scoped styles here */
</style>
