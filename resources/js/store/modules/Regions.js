export const namespaced = true;
export const state= {
    regions: []
};
export const mutations = {
    SET_REGION(state, regions){
        state.regions = regions
    }
};
export const actions = {
    fetchRegions({commit}){
        return axios.get('/api/regions')
            .then(response => {
                commit('SET_REGION', response.data)
            })
            .catch(() => console.log('there was an error fetching regions'))
    }
};
