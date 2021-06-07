require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

//Routes import
import {routes} from './routes'

//Import User Class
import User from './helpers/User'
window.User = User

//Import Noty Notification Class
import Notification from './helpers/Notification'
window.Notification = Notification

//Sweet Alert start
import Swal from 'sweetalert2'
window.Swal = Swal;

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 4000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});
window.Toast = Toast;

//Sweet Alert end

const router = new VueRouter({
    routes,
    mode: 'history' 
})


const app = new Vue({
    el: '#app',
    router,
});
