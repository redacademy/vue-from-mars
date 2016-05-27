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

   html {
      box-sizing: border-box;

      @include min-desktop {
         @include font-size(1.2);
      }
   }

   *,
   *:before,
   *:after {
      box-sizing: inherit;
   }

   body {
      background-color: $color__background-body;
   }

   body,
   button,
   input,
   select,
   textarea {
      color: $color__text-main;
      font-family: $font__main;
      @include font-size(1);
      line-height: $font__line-height-body;
   }

   /* Headings */

   h1, h2, h3, h4, h5, h6 {
      font-family: $font__alt;
   	clear: both;
   }

   /* Copy */

   p {
   	margin-bottom: $base__space-unit;
   }

   dfn, cite, em, i {
   	font-style: italic;
   }

   blockquote {
   	margin: 0 $base__space-unit;
   }

   address {
   	margin: 0 0 $base__space-unit;
   }

   pre {
   	background: $color__background-pre;
   	font-family: $font__pre;
   	@include font-size(0.9375);
   	line-height: $font__line-height-pre;
   	margin-bottom: 1.6em;
   	max-width: 100%;
   	overflow: auto;
   	padding: 1.6em;
   }

   code, kbd, tt, var {
   	font-family: $font__code;
   	@include font-size(0.9375);
   }

   abbr, acronym {
   	border-bottom: 1px dotted $color__border-abbr;
   	cursor: help;
   }

   mark, ins {
   	background: $color__background-ins;
   	text-decoration: none;
   }

   big {
   	font-size: 125%;
   }

   a {
      border-bottom: 1px solid $color__link;
      color: $color__link;
      padding-bottom: 3px;
      text-decoration: none;

      &:hover {
         border-bottom-color: $color__link-hover;
         color: $color__link-hover;
         text-decoration: none;
      }
   }

   /* Helpers */

   .container {
      @include center-block;
      max-width: 800px;
      padding: 0 ($base__space-unit / 2);
      width: 100%;
   }

   .clearfix {
      clear: both;
      content: "";
      display: table;
   }

   /* Actual Header... */

   .site {
      background:
         linear-gradient(to top, rgba(0,0,0,.15) 0%, rgba(0,0,0,.15) 100%) no-repeat,
         rgba(67,22,17,1) url('wp-content/themes/vue-from-mars/dist/assets/images/mars-bkgd.jpg') top center no-repeat;
      background-size: cover, auto 100vh;
      min-height: 100vh;

      @include min-tablet {
         background-size: contain;
      }
   }

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
