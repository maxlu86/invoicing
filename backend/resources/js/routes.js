
let login = require('./components/auth/login.vue').default;
let register = require('./components/auth/register.vue').default;
let forget = require('./components/auth/forget.vue').default;
let logout = require('./components/auth/logout.vue').default;

let home = require('./components/home.vue').default;

let usercompanycreate = require('./components/user/company/create.vue').default;
let usercompany = require('./components/user/company/index.vue').default;
let usercompanyedit = require('./components/user/company/edit.vue').default;

let clientcreate = require('./components/client/create.vue').default;
let client = require('./components/client/index.vue').default;
let clientedit = require('./components/client/edit.vue').default;

let clientcategorycreate = require('./components/client/category/create.vue').default;
let clientcategory = require('./components/client/category/index.vue').default;
let clientcategoryedit = require('./components/client/category/edit.vue').default;

let productcreate = require('./components/product/create.vue').default;
let product = require('./components/product/index.vue').default;
let productedit = require('./components/product/edit.vue').default;

let documentcreate = require('./components/document/create.vue').default;
let document = require('./components/document/index.vue').default;
let documentedit = require('./components/document/edit.vue').default;

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

    //Clients
    { path: '/client/create', component: clientcreate, name: 'clientcreate'},
    { path: '/client', component: client, name: 'client'},
    { path: '/client/edit/:id', component: clientedit, name: 'clientedit'},

    //Clients/Contacts categories(types)
    { path: '/client-category/create', component: clientcategorycreate, name: 'clientcategorycreate'},
    { path: '/client-category', component: clientcategory, name: 'clientcategory'},
    { path: '/client-category/edit/:id', component: clientcategoryedit, name: 'clientcategoryedit'},
    
    //Products
    { path: '/product/create', component: productcreate, name: 'productcreate'},
    { path: '/product', component: product, name: 'product'},
    { path: '/product/edit/:id', component: productedit, name: 'productedit'},

    //Documents
    { path: '/document/create', component: documentcreate, name: 'documentcreate'},
    { path: '/document', component: document, name: 'document'},
    { path: '/document/edit/:id', component: documentedit, name: 'documentedit'},
    
]