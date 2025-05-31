import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import('../views/unlogued/HomeView.vue'),
      children: [
        {
          path: '',
          name: 'Bienvenido',
          component: () => import('../components/TheWelcome.vue')
        },
        {
          path: 'user',
          name: 'bienvenidoUsuario',
          component: () => import('../components/InstitutionComponents/bienvenidoUsuario.vue')
        },
        {
          path: 'user/escuela',
          name: 'escuelaUsuario',
          component: () => import('../components/InstitutionComponents/MainInstitutionSubjects.vue')
        },
        {
          path: 'user/calendario',
          name: 'calendarioUsuario',
          component: () => import('../components/InstitutionComponents/CalendarioUsuario.vue') 
        },
        {
          path: 'user/editar',
          name: 'editarUsuario',
          component: () => import('../components/InstitutionComponents/EditarUsuario.vue')

        }
      ]
    },
    {
      path: '/sobreNosotros',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/unlogued/AboutView.vue'),
    },
    {
      path: '/iniciar-sesion',
      name: 'iniciar-sesion',
      component: () => import('../views/unlogued/Login.vue')
    },
    {
      path: '/registrarse',
      name: 'registrarse',
      component: () => import('../views/unlogued/Register.vue')
    },
    {
      path: '/contacto',
      name: 'contacto',
      component: () => import('../views/unlogued/Contact.vue')
    },
    {
      path: '/crear_escuela',
      name: 'crear_escuela',
      component: () => import('../views/logued/CreateSchools.vue')
    },
    {
      path: '/editar_escuela/:id',
      name: 'editar_escuela',
      component: () => import('../views/logued/EditSchools.vue')
    }, 
    // RUTA PARA EL FORMULARIO DE PAGO
    {
      path: '/pago',
      name: 'pago',
      component: () => import('../views/logued/PaymentView.vue')
    }
  ],
  scrollBehavior() {
    return { top: 0 }; // sube hacia arriba al navegar
  },
})

export default router
