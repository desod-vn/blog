import CALL from '../../utils/call'

const state = {
    categories: [],
    category: []
}

const getters = {
   getAllCat: state => { return state.categories },
   getOneCat: state => { return state.category }

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

    oneCat({ commit }, ID) {
        CALL
            .get(`category/${ID}`)
            .then(response => {
                const result = response.data
                if (result.status)
                    commit('SET_ONECAT', result.data)
            })
    },
}

const mutations = {
    SET_ALLCAT(state, categories) {
        state.categories = categories
    },
    SET_ONECAT(state, category) {
        state.category = category
    }
}

export default {
    state,
    getters,
    actions,
    mutations,
}