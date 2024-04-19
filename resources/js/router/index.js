import { createRouter, createWebHistory } from 'vue-router';
import HomeView from "../Pages/HomeView.vue";
import RegisterView from "../Pages/RegisterView.vue";
import LoginView from "../Pages/LoginView.vue";
import CarView from "../Pages/CarView.vue";
import LogoutView from "../Pages/LogoutView.vue";
import ExploreView from "../Pages/ExploreView.vue";
import UserView from "../Pages/UserView.vue";
import NewCarView from "../Pages/NewCarView.vue";

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
        {
            path: '/logout',
            component: LogoutView
        },
        {
            path: '/explore',
            component: ExploreView
        },
        {
            path: '/users/{user_id}',
            component: UserView
        },
        {
            path: '/cars/new',
            component: NewCarView
        },
        {
            path: '/cars/{car_id}',
            component: CarView
        }
    ]
})

export default router;
