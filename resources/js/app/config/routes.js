import VueRouter from 'vue-router'


// Pages
import Home from '../views/pages/Home'
import Login from '../views/pages/Login'
import DashboardDepartment from '../views/pages/DashboardDepartment'

// Routes
const routes = [
    {
        path: '/',
        name: 'home',
        component: Home,
        meta: {
            auth: true,
        },
    },
    {
        path: '/login',
        name: 'login',
        component: Login,
        meta: {
            auth: undefined
        }
    },
    {
        path: '/dd',
        name: 'dashboardDepartment',
        component: DashboardDepartment,
        meta: {
            auth: true,
        }
    },
]

const router = new VueRouter({
    history: true,
    mode: 'history',
    routes,
})

export default router
