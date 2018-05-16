
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('large-card', require('./components/large-card.vue'));
Vue.component('medium-card', require('./components/medium-card.vue'));
Vue.component('small-card', require('./components/small-card.vue'));
Vue.component("video-card",require('./components/video-card.vue'));
Vue.component("league-rank",require('./components/league-rank.vue'));
Vue.component("carousel",require('./components/carousel.vue'));
Vue.component("headlines",require('./components/headlines.vue'));
Vue.component("article-modal",require('./components/article-modal.vue'));
Vue.component("menu-hamburger",require('./components/menu-hamburger.vue'));
Vue.component("videos",require('./components/videos.vue'));
Vue.component("sub-alert",require('./components/sub-alert.vue'));
Vue.component("preloader",require('./components/preloader.vue'));



const app = new Vue({
    el: '#app',
    data : {
        league : 'pl',
        activeTab : 1,
        modal : false,
        anchor : '',
    },

    methods : {
        switchLeague : function(league, activeTab){
            this.activeTab=activeTab;
            this.league=league;
        },
        getContent(anchor){
            this.modal=true;
            this.anchor=anchor;
        },
    }
});
