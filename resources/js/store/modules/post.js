import CALL from '../../utils/call'

const state = {
    postInfo: {},
    isUpdate: false,
}

const getters = {
    getPost: state => { return state.postInfo },
    getPostUpdate: state => { return state.isUpdate },

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

    updatePost({ commit }, POST) {
        CALL
            .post(`post/${POST.get(`id`)}`, POST)
            .then(response => {
                commit('SET_ERROR', {})
                const result = response.data
                if (result.status){
                    commit('SET_POSTUPDATE', result.status)
                    commit('SET_POSTINFO', result.data)
                }
            })
            .catch(error => {
                commit('SET_POSTUPDATE', false)
                commit('SET_ERROR', error.response.data.errors)
            })
    },

    onePost({ commit }, ID) {
        CALL
            .get(`post/${ID}`)
            .then(response => {
                const result = response.data
                if (result.status){
                    commit('SET_POSTINFO', result.data)
                }
            })
    },
}

const mutations = {
    SET_POSTINFO(state, post) {
        state.postInfo = post
    },
    SET_POSTUPDATE(state, status) {
        state.isUpdate = status
    },
}

export default {
    state,
    getters,
    actions,
    mutations,
}