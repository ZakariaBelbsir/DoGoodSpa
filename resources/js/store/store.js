import Vue from "vue";
import vuex from 'vuex';
import * as Regions from './modules/Regions'
import * as Cities from './modules/Cities'
import * as User from './modules/User'

Vue.use(vuex);

export default new vuex.Store({
    state:{},
    modules:{
        Regions,
        Cities,
        User
    }
})
