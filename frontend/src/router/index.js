import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue'),
    },
    {
      path: '/iniciar-sesion',
      name: 'iniciar-sesion',
      component: () => import('../views/Login.vue')
    },
    {
      path: '/registrarse',
      name: 'registrarse',
      component: () => import('../views/Register.vue')
    },
    {
      path: '/crear_escuela',
      name: 'crear_escuela',
      component: () => import('../views/CreateSchools.vue')
    },
    {
      path: '/editar_escuela',
      name: 'editar_escuela',
      component: () => import('../views/EditSchools.vue')
    }, 
  ],
})

export default router
