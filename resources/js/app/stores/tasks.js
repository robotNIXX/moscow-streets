import Axios from 'axios'

const state = {
    allTasks: [],
};
const getters = {
    allTasks(state) {
        return state.allTasks
    },
};
const mutations = {
    SET_ALL_TASKS: (state, tasks) => {
        state.allTasks = tasks;
    },
};
const actions = {
    GET_ALL_TASKS: async function (context, payload) {
        let {data} = await Axios.get('/auth/tasks');
        context.commit('SET_ALL_TASKS', data.data);
    },
};

export default {
    state,
    getters,
    mutations,
    actions
}
