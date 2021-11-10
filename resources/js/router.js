import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)

// Admin Pages
import adminreport from './components/admin/reports'

const routes = [

    // admin paths
    {
        path: '/admin/reports',
        component: adminreport,
        name: 'adminreport'
    },

    // {
    //     path: '/admin/users',
    //     component: adminusers,
    //     name: 'adminusers'
    // },

    // {
    //     path: '/admin/expenses',
    //     component: adminexpenses,
    //     name: 'adminexpenses'
    // },

    // {
    //     path: '/admin/sales',
    //     component: adminsales,
    //     name: 'adminsales'

    // },

    // agent paths
    // {
    //     path: '/agent/products',
    //     component: agentproducts,
    //     name: 'agentproducts'
    // },

    // {
    //     path: '/agent/expenses',
    //     component: agentexpenses,
    //     name: 'agentexpenses'
    // },

    // {
    //     path: '/agent/sales',
    //     component: agentsales,
    //     name: 'agentsales'

    // },

]

export default new Router({
    mode: 'history',
    routes
})