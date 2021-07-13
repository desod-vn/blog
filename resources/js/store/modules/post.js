import CALL from '../../utils/call'

const state = {
    postInfo: {},

}

const getters = {
    getPost: state => { return state.postInfo },
}

const actions = {
    createPost({ commit }, POST) {

        CALL
            .post(`post`, POST)
            .then(response => {
                commit('SET_ERROR', {})
                const result = response.data
                if (result.status){
                    commit('SET_POSTINFO', result.data)
                }
            })
            .catch(error => {
                commit('SET_ERROR', error.response.data.errors)
            })
    },
}

const mutations = {
    SET_POSTINFO(state, post) {
        state.postInfo = post
    },
}

export default {
    state,
    getters,
    actions,
    mutations,
}