import { createRouter, createWebHistory } from 'vue-router'
import Clients from '../views/Clients'
import Home from '../views/Home'

const routes = [
    {
        path: '/clients',
        name: 'Clients',
        component: Clients
    },
    {
        path: '/',
        name: 'Home',
        component: Home
    }
]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
  })

export default router
