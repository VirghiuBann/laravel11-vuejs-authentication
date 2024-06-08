import { defineStore } from "pinia";

export const useAuthStore = defineStore("auth", {
    state: () => ({
        auth: false,
        user: null,
    }),
    getters: {
        isAuth: (state) => state.auth && state.user,
        getUser: (state) => state.user,
    },
    actions: {
        setLogin({ auth, user }) {
            this.auth = auth;
            this.user = user;
        },
        logout() {
            this.auth = false;
            this.user = null;
        },
    },
});
