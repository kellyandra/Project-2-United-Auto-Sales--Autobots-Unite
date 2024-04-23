import { createRouter, createWebHistory } from 'vue-router';
import HomeView from "../Pages/HomeView.vue";
import AboutView from "../Pages/AboutView.vue";
import RegisterView from "../Pages/RegisterView.vue";
import LoginView from "../Pages/LoginView.vue";
import CarView from "../Pages/CarView.vue";
import LogoutView from "../Pages/LogoutView.vue";
import ExploreView from "../Pages/ExploreView.vue";
import NewCarView from "../Pages/NewCarView.vue";
import UserView from "../Pages/UserView.vue";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            component: HomeView
        },
        {
            path: '/about',
            component: AboutView
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
            path: '/users/:user_id',
            name: 'UserView',
            component: UserView,
            props: true
        },
        {
            path: '/cars/new',
            component: NewCarView
        },
        {
            path: '/cars/:car_id',
            name: 'CarView',
            component: CarView,
            props: true
        },
        {
            path: '/logout',
            component: LogoutView
        }
    ]
})

export default router;
