export const namespaced = true;
export const state= {
    cities: []
};
export const mutations = {
    SET_CITIES(state, cities){
        state.cities = cities
    }
};
export const actions = {
    fetchCities({commit}, region_id){
        return axios.get(`/api/cities/${region_id}`)
            .then(response => {
                commit('SET_CITIES', response.data)
            })
            .catch(() => console.log('there was an error fetching cities'))
    }
};
