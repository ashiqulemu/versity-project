


require('./bootstrap');

window.Vue = require('vue');

    // my golbal component

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('header-component', require('./components/global/header.vue'));
Vue.component('sidebar-component', require('./components/global/sidebar.vue'));
Vue.component('footer-component', require('./components/global/footer.vue'));


import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

// my local component

const router = new VueRouter({
    mode: 'history',
    routes: [



        {
            path: '/',
            name: 'dashboard',
            component: require('./components/views/dashboard.vue')
        },

        // PRODUCT ROUTES

        {
            path: 'add-Product',
            name: 'addProduct',
            component: require('./components/views/product/addProduct.vue')
        },
        {
            path: 'view-Product',
            name: 'viewProduct',
            component: require('./components/views/product/viewProduct.vue')
        },
        {
            path: 'edit-Product',
            name: 'editProduct',
            component: require('./components/views/product/editProduct.vue')
        },

        // BRANDS ROUTES

        {
            path: 'add-Brand',
            name: 'addBrand',
            component: require('./components/views/brand/addBrand.vue')
        },
        {
            path: 'view-Brand',
            name: 'viewBrand',
            component: require('./components/views/brand/viewBrand.vue')
        },
        {
            path: 'edit-Brand',
            name: 'editBrand',
            component: require('./components/views/brand/editBrand.vue')
        },


        // ------------------- Category ------------


        {
            path:'add-category',
            name:'addCategory',
            component:require('./components/views/Category/addCategory')

        },
        {
            path:'edit-category',
            name:'editCategory',
            component:require('./components/views/Category/editCategory.vue')
        },
        {
            path:'show-category',
            name:'viewCategory',
            component:require('./components/views/Category/viewCategory.vue')
        },

        //---------------------- Customer ----------------
        {
            path:'add-customer',
            name:'addCustomer',
            component:require('./components/views/Customer/addCustomer.vue')

        },
        {
            path:'edit-customer',
            name:'editCustomer',
            component:require('./components/views/Customer/editCustomer.vue')
        },
        {
            path:'show-customer',
            name:'viewCustomer',
            component:require('./components/views/Customer/viewCustomer.vue')
        },


       // ------------------------- Supplier ------------------------

        {
            path:'add-supplier',
            name:'addSupplier',
            component:require('./components/views/Supplier/addSupplier.vue')
        } ,


        {
            path:'edit-supplier',
            name:'editSupplier',
            component:require('./components/views/Supplier/editSupplier.vue')
        } ,
        {
            path:'show-supplier',
            name:'showSupplier',
            component:require('./components/views/Supplier/viewSupplier.vue')
        } ,

        //----------------------------- PURCHASE --------------------------------
        {
            path:'add-purchase',
            name:'addPurchase',
            component:require('./components/views/purchase/addPurchase.vue')
        } ,


        {
            path:'edit-purchase',
            name:'editPurchase',
            component:require('./components/views/purchase/editPurchase.vue')
        } ,
        {
            path:'show-purchase',
            name:'showPurchase',
            component:require('./components/views/purchase/showPurchase.vue')
        } ,

    ],
});


new Vue({
    el: '#app',
    router,
});
