
import Router from 'vue-router'
import Vue from 'vue'
Vue.use(Router)

// admin project pages
import adminlogin from './pages/AdminLogin'
import adminusers from './pages/AdminUsers'
import clientdashboard from './pages/ClientDashboard'


import clientusers from './pages/ClientUsers'
import createClient from './pages/createClient'

import staffusers from './pages/StaffUsers'



const routes = [

    //app routes....

    {
        path: '/clientdashboard',
        component: clientdashboard,
        name: 'clientdashboard'

    },
    {
        path: '/adminlogin',
        component: adminlogin,
        name: 'adminlogin'

    },
    {
        path: '/adminusers',
        component: adminusers,
        name: 'adminusers'

    },    

    /* Client CRUD */

    {
        path: '/clientusers',
        component: clientusers,
        name: 'clientusers'

    },  
    
    {
        path: '/createClient',
        component: createClient,
        name: 'createClient'

    },




    {
        path: '/staffusers',
        component: staffusers,
        name: 'staffusers'

    },
]

const router = new Router({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
  })

export default router
