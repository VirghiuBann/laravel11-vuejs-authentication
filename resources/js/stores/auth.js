import { defineStore } from "pinia";
import { router } from "../router";
import { customFetch } from "./../utils/axios";

export const useAuthStore = defineStore("auth", {
    state: () => ({
        auth: false,
        user: null,
    }),
    getters: {
        isAuth: (state) => state.auth && !!state.user,
        getUser: (state) => state.user,
    },
    actions: {
        async login(credentials) {
            await customFetch.get("/sanctum/csrf-cokkie");
            const resp = await customFetch.post("/login", credentials);
            const { user, isAuth } = resp.data;
            this.setLogin({ user, isAuth });
        },

        setLogin({ user, isAuth }) {
            this.auth = isAuth;
            this.user = user;
        },

        async register(credentials) {
            await customFetch.get("/sanctum/csrf-cokkie");
            const resp = await customFetch.post("/register", credentials);
            const { user, isAuth } = resp.data;
            this.setLogin({ user, isAuth });
            router.push({ name: "home" });
        },

        async logout() {
            try {
                await customFetch.post("/logout");

                router.push({ name: "layout" });
                this.auth = false;
                this.user = null;
            } catch (error) {
                console.log(error);
            }
        },
    },
});
