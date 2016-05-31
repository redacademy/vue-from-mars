<template>
   <header class="site-header">
      <div class="container">
         <div class="site-title">
            <h1><a v-link="{ path: base_path }">{{ site_name }}</a></h1>
         </div>
         <nav class="site-navigation">
            <ul class="main-navigation">
               <li v-for="page in pages">
                  <a v-link="{ path: base_path + page.slug }">{{ page.title.rendered }}</a>
               </li>
            </ul>
         </nav>
      </div>
   </header>
</template>

<script>
   export default {

      ready() {
         this.getPages();
      },

      data() {
         return {
            base_path: wp.base_path,
            site_name: wp.site_name,
            pages: []
         }
      },

      methods: {
         getPages() {
            this.$http.get(wp.root + 'wp/v2/pages').then(function(response) {
               this.pages = response.data;
            }, function(response) {
               console.log(response);
            });
         }
      }

   }
</script>

<style lang="sass">
   @import '../assets/sass/_variables.scss';
   @import '../assets/sass/_mixins.scss';

   .site-header {
      padding: $base__space-unit 0;
   }

   .site-title {
      h1 {
         @include font-size(2.8);
         margin: 0 0 $base__space-unit;
         text-align: center;

         a {
            border-bottom: 0;
            color: white;
            padding-bottom: 0;
            text-decoration: none;
         }

         @include min-tablet {
            @include font-size(3.6);
         }

         @include min-desktop {
            @include font-size(4);
         }
      }
   }

   .main-navigation {
      display: inline;
      font-family: $font__alt;
      @include font-size(1.1);
      list-style-type: none;
      padding: 0;
      text-align: center;
   }

</style>
