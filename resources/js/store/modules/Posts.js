import axios from 'axios'
export const namespaced = true
export const state = {
    posts: null,
    authPosts: null,
    cityPosts: null
}
export const mutations = {
    SET_POSTS(state, posts){
        state.posts = posts;
    },
    SET_AUTH_POSTS(state, authPosts){
        state.authPosts = authPosts;
    },
    SET_CITY_POSTS(state, cityPosts){
        state.cityPosts = cityPosts;
    }
}
export const actions = {
    fetchAllPosts({commit}){
        return axios.get('/api/posts').then(({data}) => {
            commit('SET_POSTS', data);
        });
    },
    fetchUserPosts({commit}, user){
        return axios.get(`/posts/${user}/posts`).then(({data}) => {
            commit('SET_AUTH_POSTS', data)
        });
    },
    fetchCityPosts({commit}, city){
        return axios.get(`/api/posts/city/${city}`).then(({data}) => {
            commit('SET_CITY_POSTS', data)
        });
    }
}

export const getters = {
    getPosts(state){
        return state.posts;
    },
    getAuthPosts(state){
        return state.authPosts;
    },
    getCityPosts(state){
        return state.cityPosts;
    }
}

