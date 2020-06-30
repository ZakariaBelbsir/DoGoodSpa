import Vue from "vue";
import VueRouter from "vue-router";
import Home from '../components/Home';
import Login from '../components/Login';
import Register from '../components/Register';
import Posts from '../components/Posts';
import Profile from '../components/Profile';


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
            path: '/profile',
            name: 'Profile',
            component: Profile,
            meta: {requiresAuth: true}
        }
     ]
});

router.beforeEach((to, from, next) => {
    const loggedIn = localStorage.getItem('user')

    if(to.matched.some(record => record.meta.requiresAuth) && !loggedIn){
        next('/')
        location.reload()
    }
    next()
})

export default router;
