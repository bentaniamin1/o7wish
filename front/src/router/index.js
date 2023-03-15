import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import AuthenticationView from "@/views/AuthenticationView";
import WebFtpView from "@/views/WebFtpView";
import FtpView from "@/views/FtpView";
import SubDomainsView from "@/views/SubDomainsView";

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/authentification',
    name: 'authentification',
    component: AuthenticationView
  },
  {
    path: '/ftp',
    name: 'ftp',
    component: FtpView
  },
  {
    path: '/webftp',
    name: 'webftp',
    component: WebFtpView
  },
  {
    path: '/sous-domaine',
    name: 'sous-domaine',
    component: SubDomainsView
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
