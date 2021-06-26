import axios from '../../utils/axios'

const state = {
    isAuthenticated: false,
    user: {},
}

const getters = {
    getUserName: state => { return state.user.name },
    getUserId: state => { return state.user.id },
    getUserSlug: state => { return state.user.slug },
    getUserAvatar: state => { return state.user.avatar },
    getUserRole: state => { return state.user.role === 'admin' },
    getLogStatus: state => { return state.isAuthenticated }
}

const actions = {
    getUser ({ commit }) {
        axios
            .get('user')
            .then(response => { if(response.data.status) commit('GET_USER', response.data.user) })
    }
}

const mutations = {
    GET_USER(state, user) {
        state.user = user
        state.isAuthenticated = true
    }
}

export default {
    state,
    getters,
    actions,
    mutations,
}