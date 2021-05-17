import Vue from 'vue'
import VueRouter from 'vue-router'
import Dashboard from '../views/Dashboard.vue'
import Clients from '../views/Clients.vue'
import Stats from '../views/Stats.vue'
import Prospects from '../views/Prospects.vue'
import Permissions from '../views/Permissions.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'dashboard',
    component: Dashboard
  },
  {
    path: '/clients',
    name: 'Clients',
    component: Clients
  },
  {
    path: '/Stats',
    name: 'Statistiques',
    component: Stats
  },
  {
    path: '/prospects',
    name: 'Prospects',
    component: Prospects
  },
  {
    path: '/permissions',
    name: 'Permissions',
    component: Permissions
  },
  
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
