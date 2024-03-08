import { createRouter, createWebHistory } from "vue-router";
import { 
    Dashboard,
    About
 } from "../pages";

const routes = [
    {
        path: "/",
        name: "admin.dashboard",
        component: Dashboard,
        meta: {title: 'Dashboard'}
    },
    {
        path: "/about",
        name: "admin.about",
        component: About,
        meta: {title: 'About'}
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


export default router;

