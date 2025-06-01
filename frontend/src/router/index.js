import { isUserLogued } from '@/utils/auth/isUserLogued';
import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'Home',
      component: () => import('../views/unlogued/HomeView.vue'),
      meta: { isAuth: true }
    },
    {
      path: '/user',
      name: 'home',
      component: () => import('../views/logued/UserView.vue'),
      meta: { requiresAuth: true },
      children: [
        {
          path: '',
          name: 'bienvenidoUsuario',
          component: () => import('../components/user/bienvenidoUsuario.vue'),
          meta: { requiresAuth: true }
        },
        {
          path: 'escuela',
          name: 'escuelaUsuario',
          component: () => import('../components/user/MainInstitutionSubjects.vue'),
          meta: { requiresAuth: true }
        },
        {
          path: 'calendario',
          name: 'calendarioUsuario',
          component: () => import('../components/user/CalendarioUsuario.vue'),
          meta: { requiresAuth: true }
        },
        {
          path: 'editar',
          name: 'editarUsuario',
          component: () => import('../components/user/EditarUsuario.vue'),
          meta: { requiresAuth: true }
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
      meta: { isAuth: true }
    },
    {
      path: '/iniciar-sesion',
      name: 'iniciar-sesion',
      component: () => import('../views/unlogued/Login.vue'),
      meta: { isAuth: true }
    },
    {
      path: '/registrarse',
      name: 'registrarse',
      component: () => import('../views/unlogued/Register.vue'),
      meta: { isAuth: true }
    },
    {
      path: '/contacto',
      name: 'contacto',
      component: () => import('../views/unlogued/ContactView.vue'),
      meta: { isAuth: true }
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

router.beforeEach((to, from, next) => {
  if ( to.meta.requiresAuth && !isUserLogued() ) {
    next('/') // redirige al login o página pública
  } if ( to.meta.isAuth && isUserLogued() ){
    next('/user')
  }else {
    next()
  }
})


export default router


