import axios from 'axios'
export const namespaced = true
export const state = {
    user: null,
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
        let user = localStorage.getItem('user')
        const data = JSON.parse(user)
        state.user.user = userData
        data['user'] = userData
        localStorage.setItem('user', JSON.stringify(data))
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
        return axios.post(`/api/${user.name}/update`, user)
            .then(( {data} ) => {
                commit('UPDATE_USER_DATA', data)
            })
    }
}

export const getters = {
        loggedIn (state) {
            return !!state.user
        },
        getUser (state) {
            return state.user
        }
    }
