import Vue from 'vue'
import VueRouter from 'vue-router'

/**
 * Plugins
 */
Vue.use(require('vue-resource'))
Vue.use(VueRouter);

/**
 * Dev tools
 */
Vue.config.debug = true
Vue.config.devtools = true

/**
 * Components
 */
import ThemeHeader from './components/Header.vue'
import Posts from './components/Posts.vue'
import Post from './components/Post.vue'
import Page from './components/Page.vue'
import ThemeFooter from './components/Footer.vue'

Vue.component('Post', Post)
Vue.component('Page', Page)

/**
 * Bootstrap this app
 */
let App = Vue.extend({
   components: { ThemeHeader, ThemeFooter },

   template:
      `<div>
         <theme-header></theme-header>
         <div class="container">
            <router-view></router-view>
         </div>
         <theme-footer></theme-footer>
      </div>`,

   ready() {
      this.updateTitle('');
   },

   methods: {
      updateTitle(pageTitle) {
         document.title = (pageTitle ? pageTitle + ' - ' : '') + wp.site_name;
      }
   },

   events: {
      'page-title': function(pageTitle) {
         this.updateTitle(pageTitle);
      }
   }
})

/**
 * Routing
 */
let router = new VueRouter({
   hashbang: false,
   history: true
})

router.on(wp.base_path, {
   component: Posts
})

for (let key in wp.routes) {
   let route = wp.routes[key];
   router.on(wp.base_path + route.slug, {
      component: Vue.component(capitalize(route.type)),
      postId: route.id
   })
}

router.start(App, '#app')

function capitalize(string) {
   return string.charAt(0).toUpperCase() + string.slice(1)
}
