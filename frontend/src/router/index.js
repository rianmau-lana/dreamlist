import Vue from 'vue'
import Router from 'vue-router'
import Dream from '@/components/Dream'
import DreamForm from '@/components/DreamForm'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Dream',
      component: Dream
    },
    {
      path: '/dream/create',
      name: 'DreamForm',
      component: DreamForm
    },
    {
      path: '/dream/:id',
      name: 'DreamEdit',
      component: DreamForm
    }
  ]
})
