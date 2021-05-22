
import Router from 'vue-router'
import Vue from 'vue'
Vue.use(Router)

// admin project pages
import adminlogin from './pages/AdminLogin'
import adminusers from './pages/AdminUsers'
import clientdashboard from './pages/ClientDashboard'
import clientusers from './pages/ClientUsers'



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
    {
        path: '/clientusers',
        component: clientusers,
        name: 'clientusers'

    },
]

const router = new Router({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
  })

export default router
