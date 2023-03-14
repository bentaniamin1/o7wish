import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import AuthenticationView from "@/views/AuthenticationView";
import WebFtpView from "@/views/WebFtpView";

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/authentication',
    name: 'authentication',
    component: AuthenticationView
  },
  {
    path: '/webftp',
    name: 'webftp',
    component: WebFtpView
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
