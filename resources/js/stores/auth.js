import { defineStore } from "pinia";
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
            console.log(resp);
            const { user, isAuth } = resp.data;
            this.setLogin({ user, isAuth });
        },

        setLogin({ user, isAuth }) {
            this.auth = isAuth;
            this.user = user;
        },
        logout() {
            this.auth = false;
            this.user = null;
        },
    },
});
