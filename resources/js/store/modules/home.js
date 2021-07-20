import CALL from '../../utils/call'

const state = {
    hotPost: {},
    newPost: {},
}

const getters = {
    getHotPost: state => { return state.hotPost },
    getNewPost: state => { return state.newPost },
}

const actions = {
    getHottestPost({ commit }) {
        CALL
            .get(`post?sort=hottest`)
            .then(response => {
                const result = response.data
                if (result.status){
                    commit('SET_HOTPOST', result.data.data)
                }
            })
    },

    getLatestPost({ commit }, PAGE = 1) {
        CALL
            .get(`post?page=${PAGE}`)
            .then(response => {
                const result = response.data
                if (result.status){
                    commit('SET_NEWPOST', result.data.data)
                }
            })
    },
}

const mutations = {
    SET_NEWPOST(state, post) {
        state.newPost = post
    },
    SET_HOTPOST(state, post) {
        state.hotPost = post
    },
}

export default {
    state,
    getters,
    actions,
    mutations,
}