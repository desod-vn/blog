import CALL from '../../utils/call'

const state = {
    isAuthenticated: false,
    user: {},
    error: {},
}

const getters = {
    getUser: state => { return state.user },
    getError: state => { return state.error },
    getToken: state => { return state.user.token },
    getStatus: state => { return state.isAuthenticated },
}

const actions = {
    login({ commit }, DATA) {
        CALL
            .post(`login`, DATA)
            .then(response => {
                const result = response.data
                commit('SET_ERROR', {})
                if (result.status)
                    commit('SET_USER', result.user)
            })
            .catch(error => {
                commit('SET_ERROR', error.response.data.errors)
            })
    },

    register({ commit }, DATA) {
        CALL
            .post(`register`, DATA)
            .then(response => {
                const result = response.data
                commit('SET_ERROR', {})
                if (result.status)
                    commit('SET_USER', result.user)
            })
            .catch(error => {
                commit('SET_ERROR', error.response.data.errors)
            })
    },

    user({ commit }) {
        CALL
            .post(`user`)
            .then(response => {
                const result = response.data
                commit('SET_ERROR', {})
                if (result.status)
                    commit('SET_USER', result.user)
            })
    },

    logout({ commit }) {
        CALL
            .post(`logout`)
            .then(response => {
                const result = response.data
                if (result.status)
                    commit('REMOVE_USER')
            })
    }
}

const mutations = {
    SET_USER(state, user) {
        state.user = user
        state.isAuthenticated = true
    },

    REMOVE_USER(state) {
        state.user = {}
        state.isAuthenticated = false
    },

    SET_ERROR(state, error) {
        state.error = error
    }
}

export default {
    state,
    getters,
    actions,
    mutations,
}