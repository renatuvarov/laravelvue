import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        successStatus: false
    },
    mutations: {
        setSuccessStatus(state, successStatus) {
            state.successStatus = successStatus;
        }
    },
    getters: {
        getSuccessStatus(state) {
            return state.successStatus;
        }
    }
})
