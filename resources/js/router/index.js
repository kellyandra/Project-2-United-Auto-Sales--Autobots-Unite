import { createRouter, createWebHistory } from 'vue-router';
import AboutView from "../Pages/AboutView.vue";
import HomeView from "../Pages/HomeView.vue";
import RegisterView from "../Pages/RegisterView.vue";
import LoginView from "../Pages/LoginView.vue";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            component: HomeView
        },
        {
            path: '/register',
            component: RegisterView
        },
        {
            path: '/login',
            component: LoginView
        },
        // {
        //     path: '/logout',
        //     component: LogoutView
        // },
        // {
        //     path: '/explore',
        //     component: ExploreView
        // },
        // {
        //     path: '/users/{user_id}',
        //     component: UserView
        // },
        // {
        //     path: '/cars/new',
        //     component: NewView
        // },
        // {
        //     path: '/cars/{car_id}',
        //     component: CarView
        // }
    ]
})

export default router;
