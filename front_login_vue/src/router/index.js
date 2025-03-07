import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import UsersView from '@/views/UsersView.vue'
import MascotasView from '@/views/MascotasView.vue'
import FormInsert from '@/components/FormInsert.vue'
import EditarMascota from '@/components/EditarMascota.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue')
    },
    {
      path: '/users',
      name: 'users',
      component: UsersView
    },
    {
      path: '/mascotas',
      name: 'mascotas',
      component: MascotasView
    },
    {
      path: '/forinsert',
      name: 'insertar',
      component: FormInsert
    },
    {
      path: '/mascotas/edit/:id',
      name: 'editar',
      component: EditarMascota
    }
  ]
})

export default router
