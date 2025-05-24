import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import('../views/HomeView.vue'),
      children: [
        {
          path: '',
          name: 'bienvenidoUsuario',
          component: () => import('../components/InstitutionComponents/bienvenidoUsuario.vue')
        },
        {
          path: 'escuela',
          name: 'escuelaUsuario',
          component: () => import('../components/InstitutionComponents/MainInstitutionSubjects.vue')
        },
        {
          path: 'calendario',
          name: 'calendarioUsuario',
          component: () => import('../components/InstitutionComponents/CalendarioUsuario.vue') 
        },
        {
          path: 'editar',
          name: 'editarUsuario',
          component: () => import('../components/InstitutionComponents/EditarUsuario.vue') 
        }
      ]
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
      path: '/editar_escuela/:id',
      name: 'editar_escuela',
      component: () => import('../views/EditSchools.vue')
    }, 
  ],
})

export default router
