import CALL from '../../utils/call'

const state = {
    userInfo: {},
    userList: {},
    userPosts: {},
    userComments: {},
}

const getters = {
    getUserInfo: state => { return state.userInfo },
    getUserPost: state => { return state.userPosts },
    getUserComment: state => { return state.userComments },
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

    allUser({ commit }, PAGE = 1) {
        CALL
            .get(`user?page=${PAGE}`)
            .then(response => {
                const result = response.data
                if (result.status)
                    commit('SET_USERLIST', result.data.data)
            })
    },

    
}

const mutations = {
    SET_USERINFO(state, user) {
        state.userInfo = user
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