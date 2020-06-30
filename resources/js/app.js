require('./bootstrap');

window.Vue = require('vue');

import router from './routes/routes';
import vuetify from './vuetify'
import store from './store/store';
import axios from 'axios';



Vue.component('App', require('./App.vue').default);


const app = new Vue({
    el: '#app',
    router,
    store,
    created() {
      const userString = localStorage.getItem('user')
        if (userString) {
            const userData = JSON.parse(userString)
            this.$store.commit('User/SET_USER_DATA', userData)
        }

        axios.interceptors.response.use(
            response => response,
            error => {
                if(error.response.status===401){
                    this.$store.dispatch('User/logout')
                }
                return Promise.reject(error)
            }
        )
    },
    vuetify
});
