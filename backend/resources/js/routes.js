
let login = require('./components/auth/login.vue').default;
let register = require('./components/auth/register.vue').default;
let forget = require('./components/auth/forget.vue').default;
let logout = require('./components/auth/logout.vue').default;

let home = require('./components/home.vue').default;
let usercompanycreate = require('./components/user/company/create.vue').default;
let usercompany = require('./components/user/company/index.vue').default;
let usercompanyedit = require('./components/user/company/edit.vue').default;


export const routes = [
    { path: '/', component: login, name: '/'},
    { path: '/register', component: register, name: 'register'},
    { path: '/forget', component: forget, name: 'forget'},
    { path: '/logout', component: logout, name: 'logout'},
    { path: '/home', component: home, name: 'home'},

    //User company
    { path: '/user/company/create', component: usercompanycreate, name: 'usercompanycreate'},
    { path: '/user/company', component: usercompany, name: 'usercompany'},
    { path: '/user/company/edit/:id', component: usercompanyedit, name: 'usercompany-edit'},
  ]