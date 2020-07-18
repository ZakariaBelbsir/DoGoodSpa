import Vue from "vue";
import VueRouter from "vue-router";
import Home from '../components/Home';
import Login from '../components/Login';
import Register from '../components/Register';
import NotFound from '../components/NotFound.vue';
import Profile from '../components/user/Profile';
import Settings from '../components/user/Settings';
import Posts from '../components/Posts/Posts';
import showPost from '../components/Posts/showPost';
import CityPosts from "../components/Posts/CityPosts";
import UserPosts from "../components/Posts/UserPosts";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    base: process.env.BASE_URL,
    routes:[
        {
            path: '/',
            name: 'Home',
            component: Home
        },
        {
            path: '/login',
            name: 'Login',
            component: Login
        },
        {
            path: '/register',
            name: 'Register',
            component: Register
        },
        {
            path: '/postes',
            name: 'Postes',
            component: Posts
        },
        {
            path: '/postes/:id',
            name: 'showPost',
            component: showPost
        },
        {
            path: '/:user/profile',
            name: 'Profile',
            component: Profile,
            meta: {requiresAuth: true}
        },
        {
            path: '/:user/settings',
            name: 'settings',
            component: Settings,
            meta: {requiresAuth: true}
        },
        {
          path: '/:city/posts',
          name: 'CityPosts',
          component: CityPosts
        },
        {
            path: '/:user/posts',
            name: 'UserPosts',
            component: UserPosts
        },
        {
            path: '/404',
            name: '404',
            component: NotFound,
        },
        { // Here's the new catch all route
            path: '*',
            redirect: { name: '404' }
        }
     ]
});

router.beforeEach((to, from, next) => {
    const loggedIn = localStorage.getItem('user')

    if(to.matched.some(record => record.meta.requiresAuth) && !loggedIn){
        next('/')
    }
    next()
})

export default router;
