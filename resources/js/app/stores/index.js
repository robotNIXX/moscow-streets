import Vuex from 'vuex'
import Vue from 'vue'
import Axios from 'axios'

import tasks from './tasks.js';

Vue.use(Vuex)
const store = new Vuex.Store({
    modules: {
        tasks: tasks
    }
});

export default store;
