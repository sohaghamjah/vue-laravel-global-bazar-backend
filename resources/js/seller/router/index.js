import { createRouter, createWebHistory } from "vue-router";
import NProgress from 'nprogress'; 
import { useAuth } from "@/seller/stores";

import { 
    Dashboard,
    Login,
 } from "../pages";

const routes = [
    {
        path: "/",
        name: "seller.login",
        component: Login,
        meta: {title: 'Seller Login', guest: true}
    },
    {
        path: "/seller/dashboard",
        name: "seller.dashboard",
        component: Dashboard,
        meta: {title: 'Seller Dashboard', requiresAuth: true}
    },
];



const router = createRouter({
    history: createWebHistory(import.meta.env.APP_URL),
    routes,
    scrollBehavior(){
        return {  top: 0, behavior: "smooth" };
    }
})

const DEFAULT_TITLE = '404';

router.beforeEach((to, from, next) => {
    document.title = to.meta.title || DEFAULT_TITLE;
    NProgress.start(); 
    const loggedIn = useAuth();
    if (to.matched.some((record) => record.meta.requiresAuth)) {
        if (!loggedIn.getAuthStatus) {
          next({ name: "seller.login" });
        } else {
          next();
        }
    }else if(to.matched.some((record) => record.meta.guest)){
        if (loggedIn.getAuthStatus) {
            next({ name: "seller.dashboard" });
        } else {
            next();
        }
    }else{
        next();   
    }
})

router.afterEach(() => {
    NProgress.done();
})


export default router;

