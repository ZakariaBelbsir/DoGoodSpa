import axios from 'axios'
export const namespaced = true
export const state = {
    user: null,
    message: ''
}
export const mutations = {
    SET_USER_DATA (state, userData) {
        state.user = userData
        localStorage.setItem('user', JSON.stringify(userData))
        axios.defaults.headers.common['Authorization'] = `Bearer ${userData.token}`
        },
    CLEAR_USER_DATA () {
        localStorage.removeItem('user')
        location.reload()
    },
    UPDATE_USER_DATA(state, userData){
        state.user.user = userData.user
        state.message = userData.message
        localStorage.setItem('user', JSON.stringify(state.user))
    }
}
export const actions = {
    register ({ commit }, credentials) {
        return axios.post('/api/auth/register', credentials).then(
            ({ data }) => {
                commit('SET_USER_DATA', data)
            }
        )
    },
    login ({ commit }, credentials) {
        return axios.post('/api/auth/login', credentials).then(
            ({ data }) => {
                commit('SET_USER_DATA', data)
            }
        )
    },
    logout ({ commit, state }) {
        if (state.user){
            return axios.post('/api/auth/logout', {
                'token': state.user.token
            }).then(() => {
                commit('CLEAR_USER_DATA')
            })
        }
    },
    update({commit}, user){
        return axios.post(`/api/${user.get('user')}/update`, user)
            .then(( {data} ) => {
                // console.log(data)
                commit('UPDATE_USER_DATA', data)
            })
    }
}

export const getters = {
        loggedIn (state) {
            return !!state.user
        },
        getUser (state) {
            return state.user.user
        },
        getMessage(state){
            return state.message
        }
    }
