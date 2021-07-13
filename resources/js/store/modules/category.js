import CALL from '../../utils/call'

const state = {
    categories: []
}

const getters = {
   getAllCat: state => { return state.categories }
}

const actions = {
    allCat({ commit }, NAME = '') {
        CALL
            .get(`category?search=${NAME}`)
            .then(response => {
                const result = response.data
                if (result.status)
                    commit('SET_ALLCAT', result.data)
            })
    },
}

const mutations = {
    SET_ALLCAT(state, categories) {
        state.categories = categories
    }
}

export default {
    state,
    getters,
    actions,
    mutations,
}