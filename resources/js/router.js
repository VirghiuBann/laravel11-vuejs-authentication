import { createWebHistory, createRouter } from "vue-router";

import Dashboard from "./pages/Dashboard.vue";
import Login from "./pages/Login.vue";
import Layout from "./pages/Layout.vue";
import Register from "./pages/Register.vue";
import NotFound from "./pages/ErrorPage.vue";

const isAuthenticated = () => {
    return false;
};

const routes = [
    {
        path: "/",
        name: "home",
        component: Dashboard,
        meta: { requiredAuth: true },
        beforeEnter: (to, from) => {
            console.log(to.name);
            if (!isAuthenticated()) {
                return {
                    name: "layout",
                };
            }
        },
    },
    { path: "/login", name: "login", component: Login },
    { path: "/register", name: "register", component: Register },
    { path: "/layout", name: "layout", component: Layout },
    {
        path: "/:pathMatch(.*)*",
        name: "not-found",
        component: NotFound,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach(async (to, from) => {
    console.log(to.name, from.name);
});

export { router };
