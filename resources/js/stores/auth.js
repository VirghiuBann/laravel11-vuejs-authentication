import { defineStore } from "pinia";

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
        setLogin({ user, is_auth }) {
            this.auth = is_auth;
            this.user = user;
        },
        logout() {
            this.auth = false;
            this.user = null;
        },
    },
});
