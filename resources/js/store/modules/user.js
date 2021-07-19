import CALL from '../../utils/call'

const state = {
    userInfo: {},
    userList: {},
    userPosts: {},
    userComments: {},
    isUpdate: false,
}

const getters = {
    getUserInfo: state => { return state.userInfo },
    getUserPost: state => { return state.userPosts },
    getUserComment: state => { return state.userComments },
    getUserUpdate: state => { return state.isUpdate },
}

const actions = {
    oneUser({ commit }, ID) {
        CALL
            .get(`user/${ID}`)
            .then(response => {
                const result = response.data
                if (result.status){
                    commit('SET_USERINFO', result.data)
                    commit('SET_USERPOST', result.data.posts)
                    commit('SET_USERCOMMENT', result.data.comments)
                }
            })
    },

    updateUser({ commit }, USER) {
        CALL
            .put(`user/${ USER.id }`, USER)
            .then(response => {
                commit('SET_ERROR', {})
                const result = response.data
                if (result.status){
                    commit('SET_USER', result.data)
                    commit('SET_USERUPDATE', result.status)
                }
            })
            .catch(error => {
                commit('SET_USERUPDATE', false)
                commit('SET_ERROR', error.response.data.errors)
            })
    },

    avatarUser({ commit }, USER) {
        const config = {
            headers: {
                "content-type": "multipart/form-data",
            },
        }

        CALL
            .post(`user/avatar/${ USER.get(`id`) }`, USER, config)
            .then(response => {
                commit('SET_ERROR', {})
                const result = response.data
                if (result.status){
                    commit('SET_USER', result.data)
                    commit('SET_USERUPDATE', result.status)
                }
            })
            .catch(error => {
                commit('SET_USERUPDATE', false)
                commit('SET_ERROR', error.response.data.errors)
            })
    },

    passwordUser({ commit }, USER) {
        CALL
            .post(`user/password/${ USER.id }`, USER)
            .then(response => {
                commit('SET_ERROR', {})
                const result = response.data
                if (result.status){
                    commit('SET_USERUPDATE', result.status)
                }
            })
            .catch(error => {
                commit('SET_USERUPDATE', false)
                commit('SET_ERROR', error.response.data.errors)
            })
    },

    
}

const mutations = {
    SET_USERINFO(state, user) {
        state.userInfo = user
    },

    SET_USERUPDATE(state, status) {
        state.isUpdate = status
    },

    SET_USERPOST(state, posts) {
        state.userPosts = posts
    },

    SET_USERCOMMENT(state, comments) {
        state.userComments = comments
    },

    SET_USERLIST(state, users) {
        state.userList = users
    },
}

export default {
    state,
    getters,
    actions,
    mutations,
}