import { createRouter, createWebHistory } from "vue-router";
import NProgress from 'nprogress'; 
import { useAuth } from "@/admin/stores";

import { 
    Dashboard,
    Login,
    IndexFile,
    CreateFile
 } from "../pages";

const routes = [
    {
        path: "/admin/login",
        name: "admin.login",
        component: Login,
        meta: {title: 'Admin Login', guest: true}
    },
    {
        path: "/admin/dashboard",
        name: "admin.dashboard",
        component: Dashboard,
        meta: {title: 'Dashboard', requiresAuth: true}
    },
    {
        path: "/admin/manage-files",
        name: "admin.manage.files",
        component: IndexFile,
        meta: {title: 'Manage Files', requiresAuth: true}
    },
    {
        path: "/admin/manage-files/create",
        name: "admin.manage.files.create",
        component: CreateFile,
        meta: {title: 'Create Files', requiresAuth: true}
    },
];



const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes,
    scrollBehavior() {
        return { top: 0, behavior: "smooth" };
    },
});
const DEFAULT_TITLE = "404";

router.beforeEach((to, from, next) => {
    document.title = to.meta.title || DEFAULT_TITLE;
    NProgress.start();

    const auth = useAuth();

    if (to.matched.some((record) => record.meta.requiresAuth)) {
        if (!auth.getAuthStatus) {
            next({ name: "admin.login" });
        } else {
            next();
        }
    } else if (to.matched.some((record) => record.meta.guest)) {
        if (auth.getAuthStatus) {
            next({ name: "admin.home" });
        } else {
            next();
        }
    } else {
        next();
    }
});


router.afterEach(() => {
    NProgress.done();
})
export default router;
